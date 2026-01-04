<?php

// Ici je définit le namespace ou il y aura ma class
namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class User
{
    private $id;
    private $nom;
    private $email;

    // =====================
    // Getters / Setters
    // =====================

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // =====================
    // Méthodes CRUD
    // =====================

    /**
     * Récupère tous les utilisateurs
     * @return array
     */
    public static function getAll()
    {
        $pdo = Database::getPDO();
<<<<<<< HEAD
        $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
=======
        $stmt = $pdo->query("SELECT * FROM user ORDER BY id DESC");
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un utilisateur par son ID
     * @param int $id
     * @return array|null
     */
    public static function findById($id)
    {
        $pdo = Database::getPDO();
<<<<<<< HEAD
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
=======
        $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un utilisateur par son email
     * @param string $email
     * @return array|null
     */
    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
<<<<<<< HEAD
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
=======
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crée un nouvel utilisateur
     * @return bool
     */
    public function save()
    {
        $pdo = Database::getPDO();
<<<<<<< HEAD
        $stmt = $pdo->prepare("INSERT INTO users (nom, email) VALUES (?, ?)");
=======
        $stmt = $pdo->prepare("INSERT INTO user (nom, email) VALUES (?, ?)");
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        return $stmt->execute([$this->nom, $this->email]);
    }

    /**
     * Met à jour les informations d’un utilisateur existant
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
<<<<<<< HEAD
        $stmt = $pdo->prepare("UPDATE users SET nom = ?, email = ? WHERE id = ?");
=======
        $stmt = $pdo->prepare("UPDATE user SET nom = ?, email = ? WHERE id = ?");
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        return $stmt->execute([$this->nom, $this->email, $this->id]);
    }

    /**
     * Supprime un utilisateur
     * @return bool
     */
    public function delete()
    {
        $pdo = Database::getPDO();
<<<<<<< HEAD
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
=======
        $stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        return $stmt->execute([$this->id]);
    }
}
