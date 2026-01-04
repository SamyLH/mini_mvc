<?php if (isset($success) && $success === true): ?>

    <div style="text-align: center; padding: 50px;">
        <h1 style="color: #27ae60; font-size: 3em;">Thank you! 🎉</h1>
        <h2>Your order has been confirmed.</h2>
        <p>It has been successfully saved in our database.</p>
        <br>
        <a href="<?= BASE_URL ?>/" 
           style="background: #333; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Back to Store
        </a>
    </div>

<?php else: ?>

    <h1>📦 Order Summary</h1>
    <div style="display: flex; gap: 30px; flex-wrap: wrap;">
        
        <div style="flex: 2; min-width: 250px;">
            <table style="width: 100%; border-collapse: collapse;">
                <?php foreach ($cartItems as $item): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><?= htmlspecialchars($item['product']['nom']) ?></td>
                        <td style="padding: 10px;">x<?= $item['qty'] ?></td>
                        <td style="padding: 10px; font-weight: bold; color: #e67e22;"><?= $item['subtotal'] ?> $</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" style="text-align: right; padding: 10px;"><strong>TOTAL:</strong></td>
                    <td style="padding: 10px; color: #27ae60; font-weight: bold;"><?= $total ?> $</td>
                </tr>
            </table>
        </div>

        <div style="flex: 1; min-width: 220px; background: #f1f2f6; padding: 20px; border-radius: 10px;">
            <form action="<?= BASE_URL ?>/commande/valider" method="POST">
                <label>Shipping Address:</label>
                <textarea name="adresse" 
                          style="width: 100%; height: 80px; margin-top: 5px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"><?= htmlspecialchars($user['adresse']) ?></textarea>
                
                <button type="submit" 
                        style="width: 100%; margin-top: 15px; padding: 15px; background: #16a085; color: white; border: none; font-size: 1.1em; cursor: pointer; border-radius: 5px;">
                    ✅ Pay & Order
                </button>
            </form>
        </div>
    </div>

<?php endif; ?>
