<h1>🛒 Shopping Cart</h1>

<p><a href="<?= BASE_URL ?>/" style="text-decoration: none; color: #2c3e50;">&larr; Continue Shopping</a></p>

<?php if (empty($cartItems)): ?>
    <div style="text-align: center; padding: 50px; background: #eef2f3; border-radius: 10px;">
        <p>Your cart is empty.</p>
        <a href="<?= BASE_URL ?>/" style="background-color: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">View Products</a>
    </div>
<?php else: ?>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-family: Arial, sans-serif;">
        <thead style="background-color: #dfe6e9; text-align: left;">
            <tr>
                <th style="padding: 10px; border-bottom: 2px solid #b2bec3;">Product</th>
                <th style="padding: 10px; border-bottom: 2px solid #b2bec3;">Price</th>
                <th style="padding: 10px; border-bottom: 2px solid #b2bec3;">Qty</th>
                <th style="padding: 10px; border-bottom: 2px solid #b2bec3;">Total</th>
                <th style="padding: 10px; border-bottom: 2px solid #b2bec3;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #b2bec3;">
                        <?= htmlspecialchars($item['product']['nom']) ?>
                    </td>
                    <td style="padding: 10px; border-bottom: 1px solid #b2bec3;">
                        <?= number_format((float)$item['product']['prix'], 2, '.', ',') ?> $
                    </td>
                    <td style="padding: 10px; border-bottom: 1px solid #b2bec3;">
                        <?= $item['qty'] ?>
                    </td>
                    <td style="padding: 10px; border-bottom: 1px solid #b2bec3; font-weight: bold; color: #e67e22;">
                        <?= number_format($item['subtotal'], 2, '.', ',') ?> $
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot style="background-color: #f1f2f6;">
            <tr>
                <td colspan="3" style="padding: 15px; text-align: right;"><strong>Total:</strong></td>
                <td colspan="2" style="padding: 15px; font-size: 1.2em; color: #e74c3c; font-weight: bold;">
                    <?= number_format($total, 2, '.', ',') ?> $
                </td>
            </tr>
        </tfoot>
    </table>

    <div style="margin-top: 20px; display: flex; justify-content: space-between;">
        <a href="<?= BASE_URL ?>/panier/clear" 
           style="background-color: #c0392b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;"
           onclick="return confirm('Clear the entire cart?');">
           Clear Cart
        </a>

        <a href="<?= BASE_URL ?>/commande" 
            style="background-color: #16a085; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Checkout &rarr;
        </a>
    </div>
<?php endif; ?>
