<?php

// Active le mode strict pour la vérification des types
declare(strict_types=1);
// Déclare l'espace de noms pour ce contrôleur
namespace Mini\Controllers;
// Importe la classe de base Controller du noyau
use Mini\Core\Controller;
use Mini\Models\User;
<<<<<<< HEAD
use Mini\Models\Produit;
=======
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b

// Déclare la classe finale HomeController qui hérite de Controller
final class HomeController extends Controller
{
    // Déclare la méthode d'action par défaut qui ne retourne rien
    public function index(): void
    {
<<<<<<< HEAD
        $products = Produit::getAll();

=======
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/index', params: [
            // Définit le titre transmis à la vue
            'title' => 'Mini MVC',
            'prenom' => 'Toto',
            'prenom2' => 'Tata',
<<<<<<< HEAD
            'products' => $products
=======
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
        ]);
    }

    public function users(): void
    {
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/users', params: [
            // Définit le titre transmis à la vue
            'users' => $users = User::getAll(),
        ]);
    }
<<<<<<< HEAD

    public function show(): void
    {
        // Récupération de l'ID depuis l'URL
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            header('Location: /');
            exit;
        }

        $product = Produit::findById($id);

        $this->render('home/produit', [
            'product' => $product
        ]);
    }
=======
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
}