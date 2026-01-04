<h1>User List</h1>

    <?php if (!empty($users)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mail</th>
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
                            <a class="btn" href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('supress this user ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>0 user found.</p>
    <?php endif; ?>
