<<<<<<< HEAD
<!-- Welcome paragraph displayed on the homepage -->
<p>Welcome to the mini MVC. Everything is working ✅</p>

<h1>Our Products</h1>

<div class="product-list" style="display: flex; flex-wrap: wrap; gap: 20px;">
    <?php foreach ($products as $p): ?>
        <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: 220px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <img src="/assets/img/<?= htmlspecialchars($p['image']) ?>" 
                 alt="<?= htmlspecialchars($p['nom']) ?>" 
                 style="width:100%; border-radius: 5px;">

            <h3><?= htmlspecialchars($p['nom']) ?></h3>
            <p style="font-weight: bold; color: #e67e22;"><?= htmlspecialchars($p['prix']) ?> $</p>

            <a href="product?id=<?= $p['id_produit'] ?>" style="color: #2980b9; text-decoration: none;">View Details</a>

            <form action="<?= BASE_URL ?>/panier/add" method="POST" style="margin-top: 10px;">
                <input type="hidden" name="id_produit" value="<?= $p['id_produit'] ?>">
                <button type="submit" 
                        style="background-color: #16a085; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer;">
                    Add to Cart
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
=======
<!-- Paragraphe d'accueil affiché sur la page d'accueil -->
<p>Bienvenue sur le mini MVC. Tout fonctionne ✅</p>


<h1>Mon prénom est <?= $prenom ?></h1>

<h2>Le titre est <?= $title ?></h2>

<h2>Le 2eme prénom est <?= $prenom2 ?></h2>


>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
