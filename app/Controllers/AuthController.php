<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Client;

class AuthController extends Controller
{


    public function loginForm(): void
    {
        // Si déjà connecté, on redirige vers l'accueil
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/');
            exit;
        }
        $this->render('auth/login');
    }

    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($email && $password) {
            // 1. On cherche l'utilisateur
            $client = Client::findByEmail($email);

            // 2. On vérifie le mot de passe hashé
            if ($client && password_verify($password, $client['mdp'])) {
                // 3. Connexion réussie : on stocke les infos en session
                // On retire le mot de passe de la session par sécurité
                unset($client['mdp']);
                $_SESSION['user'] = $client;

                header('Location: ' . BASE_URL . '/');
                exit;
            }
        }

        // Si échec, on réaffiche le formulaire avec une erreur
        $this->render('auth/login', ['error' => 'Email ou mot de passe incorrect.']);
    }

    // --- INSCRIPTION (REGISTER) ---

    public function registerForm(): void
    {
        $this->render('auth/register');
    }

    public function register(): void
    {
        // Récupération des données du formulaire
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $adresse = $_POST['adresse'] ?? '';

        if ($nom && $prenom && $email && $password && $adresse) {
            // Vérifier si l'email existe déjà
            if (Client::findByEmail($email)) {
                $this->render('auth/register', ['error' => 'Cet email est déjà utilisé.']);
                return;
            }

            // Création du client
            Client::create($nom, $prenom, $adresse, $email, $password);
            
            // Redirection vers le login
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $this->render('auth/register', ['error' => 'Veuillez remplir tous les champs.']);
    }

    // --- DÉCONNEXION ---

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy(); // Détruit complètement la session
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}