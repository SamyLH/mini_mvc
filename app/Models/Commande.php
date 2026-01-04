<?php
namespace Mini\Models;

use Mini\Core\Database;
use PDO;
use Exception;

class Commande
{
    public static function creer(int $clientId, float $total, string $adresse, array $articles): bool
    {
        $pdo = Database::getPDO();

        try {
            $pdo->beginTransaction(); 

            // 1. Création de la commande
            $stmt = $pdo->prepare("INSERT INTO commandes (id_client, status, montant_total, adresse_livraison) VALUES (?, 'payee', ?, ?)");
            $stmt->execute([$clientId, $total, $adresse]);
            
            $idCommande = $pdo->lastInsertId();

            // 2. Ajout des produits (table inclure)
            $stmtDetail = $pdo->prepare("INSERT INTO inclure (id_commande, id_produit, produit_comm, quantite, prix_unite, prix_sous_tot) VALUES (?, ?, ?, ?, ?, ?)");

            foreach ($articles as $item) {
                $stmtDetail->execute([
                    $idCommande,
                    $item['product']['id_produit'],
                    $item['product']['nom'],
                    $item['qty'],
                    $item['product']['prix'],
                    $item['subtotal']
                ]);
            }

            $pdo->commit(); 
            return true;

        } catch (Exception $e) {
            $pdo->rollBack(); 
            return false;
        }
    }
}