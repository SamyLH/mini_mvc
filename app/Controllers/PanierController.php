<?php
declare(strict_types=1);
namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Produit;

final class PanierController extends Controller
{
    // Affiche le panier
    public function index(): void
    {
        // Récupère le panier de la session (tableau vide si inexistant)
        // Format : [id_produit => quantite, id_produit => quantite]
        $panier = $_SESSION['panier'] ?? [];
        
        $panierDetails = [];
        $total = 0;

        foreach ($panier as $id => $qty) {
            $product = Produit::findById((int)$id);
            if ($product) {
                $subtotal = $product['prix'] * $qty;
                $total += $subtotal;
                
                // On ajoute les infos complètes pour la vue
                // Note : on change le dossier de vue vers 'panier'
                $panierDetails[] = [
                    'product' => $product,
                    'qty' => $qty,
                    'subtotal' => $subtotal
                ];
            }
        }

        $this->render('panier', [
            'cartItems' => $panierDetails,
            'total' => $total
        ]);
    }

    // Ajoute un produit au panier
    public function add(): void
    {
        // On vérifie qu'on a bien reçu un ID
        if (isset($_POST['id_produit'])) {
            $id = (int)$_POST['id_produit'];
            
            // Initialise le panier si nécessaire
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
            }

            // Si le produit est déjà dedans, on augmente la quantité
            if (isset($_SESSION['panier'][$id])) {
                $_SESSION['panier'][$id]++;
            } else {
                $_SESSION['panier'][$id] = 1;
            }
        }
        
        // Redirection vers la page du panier
        header('Location: ' . BASE_URL . '/panier');
        exit;
    }

    // Vide le panier
    public function clear(): void
    {
        unset($_SESSION['panier']);
        header('Location: ' . BASE_URL . '/panier');
        exit;
    }


    //récapitulatif de la commande
    public function recap(): void
    {
        if (empty($_SESSION['user'])) { header('Location: '.BASE_URL.'/login'); exit; }
        if (empty($_SESSION['cart'])) { header('Location: '.BASE_URL.'/panier'); exit; }

        // On recalcule le total pour l'affichage
        $panier = $_SESSION['cart'];
        $details = [];
        $total = 0;
        foreach ($panier as $id => $qte) {
            $produit = Product::findById((int)$id);
            if ($produit) {
                $st = $produit['prix'] * $qte;
                $total += $st;
                $details[] = ['product' => $produit, 'qty' => $qte, 'subtotal' => $st];
            }
        }

        // On affiche la vue unique 'commande' en mode résumé (success = false)
        $this->render('commande', [
            'cartItems' => $details,
            'total' => $total,
            'user' => $_SESSION['user'],
            'success' => false
        ]);
    }

    //valider la commande
    public function valider(): void
    {
        if (empty($_SESSION['user']) || empty($_SESSION['cart'])) { header('Location: '.BASE_URL.'/'); exit; }

        $panier = $_SESSION['cart'];
        $details = [];
        $total = 0;
        foreach ($panier as $id => $qte) {
            $p = Product::findById((int)$id);
            if ($p) {
                $st = $p['prix'] * $qte;
                $total += $st;
                $details[] = ['product' => $p, 'qty' => $qte, 'subtotal' => $st];
            }
        }

        $adresse = $_POST['adresse'] ?? $_SESSION['user']['adresse'];

        // Enregistrement
        $ok = Commande::creer((int)$_SESSION['user']['id_client'], $total, $adresse, $details);

        if ($ok) {
            unset($_SESSION['cart']);
            $this->render('commande', ['success' => true]);
        } else {
            echo "Technical Error.";
        }
    }

}

