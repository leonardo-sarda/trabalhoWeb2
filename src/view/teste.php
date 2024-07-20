
<?php


require_once  '../controllers/HomeController.php';

$controller = new HomeController();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    $controller->deleteUser($_GET['delete_id']);
}

$users = $controller->listUsers();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDE</title>
</head>
<body>
    <div>
        <h1>Listar Usuarios</h1>
    </div>
    <div>
    <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['nome']) ?></td>
                            <td><a href="?delete_id=<?= $user['id'] ?>" onclick="return confirm('Você tem certeza que deseja deletar este usuário?');">Deletar</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="2">Nenhum usuário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>