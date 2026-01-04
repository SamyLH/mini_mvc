<h1>Login</h1>

<?php if (isset($error)): ?>
    <p style="color: #e74c3c;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="<?= BASE_URL ?>/login" method="POST" style="max-width: 320px; margin-top: 20px;">
    <div style="margin-bottom: 15px;">
        <label>Email:</label><br>
        <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label>Password:</label><br>
        <input type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <button type="submit" 
            style="background-color: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        Login
    </button>
</form>

<p style="margin-top: 15px;">Don't have an account? <a href="<?= BASE_URL ?>/register" style="color: #16a085; text-decoration: none;">Register here</a></p>
