<?php
namespace Mini\Models;
use Mini\Core\Database;
use PDO;

class Client
{
    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($nom, $prenom, $adresse, $email, $mdp)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("INSERT INTO clients (nom, prenom, adresse, email, mdp) VALUES (?, ?, ?, ?, ?)");
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
        return $stmt->execute([$nom, $prenom, $adresse, $email, $hashedMdp]);
    }
}