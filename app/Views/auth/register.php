<h1>Create an Account</h1>

<?php if (isset($error)): ?>
    <p style="color: #e74c3c;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="<?= BASE_URL ?>/register" method="POST" style="max-width: 400px; margin-top: 20px;">
    <div style="margin-bottom: 15px;">
        <label>Last Name:</label><br>
        <input type="text" name="nom" required 
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label>First Name:</label><br>
        <input type="text" name="prenom" required 
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label>Email:</label><br>
        <input type="email" name="email" required 
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label>Address:</label><br>
        <textarea name="adresse" required 
                  style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
    </div>

    <div style="margin-bottom: 15px;">
        <label>Password:</label><br>
        <input type="password" name="password" required 
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <button type="submit" 
            style="background-color: #16a085; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        Register
    </button>
</form>
