<a href="<?= BASE_URL ?>/">← Back to Products</a>

<?php if (empty($product)): ?>
    <h1>Product Not Found</h1>
    <p>Sorry, this product does not exist or has been removed.</p>
<?php else: ?>
    <div class="product-detail" style="display: flex; gap: 40px; flex-wrap: wrap;">
        
        <div class="product-image">
            <img src="/assets/img/<?= htmlspecialchars($product['image']) ?>" 
                 alt="<?= htmlspecialchars($product['nom']) ?>" 
                 style="max-width: 400px; border: 1px solid #ccc; padding: 10px; border-radius: 8px;">
        </div>

        <div class="product-info" style="flex: 1; min-width: 250px;">
            <h1><?= htmlspecialchars($product['nom']) ?></h1>
            
            <h2><?= htmlspecialchars($product['prix']) ?> $</h2>
            
            <p><strong>Stock:</strong> 
                <?php if ($product['stock'] > 0): ?>
                    <span style="color: green;">In stock (<?= $product['stock'] ?>)</span>
                <?php else: ?>
                    <span style="color: red;">Out of stock</span>
                <?php endif; ?>
            </p>

            <p>
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </p>

            <?php if ($product['stock'] > 0 && $product['disponible']): ?>
                <form action="<?= BASE_URL ?>/panier/add" method="POST" style="margin-top: 15px;">
                    <input type="hidden" name="id_produit" value="<?= $product['id_produit'] ?>">
                    <button type="submit" 
                            style="background-color: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        Add to Cart
                    </button>
                </form>
            <?php else: ?>
                <button disabled 
                        style="background-color: #95a5a6; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
                    Unavailable
                </button>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
