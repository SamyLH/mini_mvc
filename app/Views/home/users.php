<<<<<<< HEAD
<h1>User List</h1>
=======
<h1>Liste des utilisateurs</h1>
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b

    <?php if (!empty($users)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
<<<<<<< HEAD
                    <th>Name</th>
                    <th>Mail</th>
=======
                    <th>Nom</th>
                    <th>Email</th>
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['nom']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <a class="btn" href="edit.php?id=<?= $user['id'] ?>">Modifier</a>
<<<<<<< HEAD
                            <a class="btn" href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('supress this user ?');">Supprimer</a>
=======
                            <a class="btn" href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Supprimer cet utilisateur ?');">Supprimer</a>
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
<<<<<<< HEAD
        <p>0 user found.</p>
=======
        <p>Aucun utilisateur trouvé.</p>
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
    <?php endif; ?>
