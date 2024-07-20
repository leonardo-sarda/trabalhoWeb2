
<?php
include '../view/home.php';
?>





<?php
require_once '../controllers/HomeController.php';

$controller = new HomeController();
$users = $controller->listUsers();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    $controller->deleteUser($_GET['delete_id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nome'];
    $id = $_POST['id'];
    $email = $_POST['email'];

    //$controller->updateUser($id, $username, $email);
    if (!empty($id) && (!empty($username) || !empty($email))) {
        $controller->updateUser($id, $username, $email);
    }



    // Redirecionar para a mesma página para ver as alterações
    header("Location: updateUser.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <!-- Inclua o CSS do Bootstrap (ou outro framework CSS) para o modal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div>
        <h1>Listar Usuários</h1>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) {
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['id'] . "</td>";
                        echo "<td>" . $user['nome'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal' data-id='" . $user['id'] . "' data-nome='" . $user['nome'] . "' data-email= '". $user['email']."'>Editar</button></td>";
                        echo "</tr>";
                    }
                } else {
                echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
                    } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="updateUser.php" method="post">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label for="edit-nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="edit-nome">
                        </div>
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="email" class="form-control" name="email" id="edit-email">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua o JavaScript do Bootstrap (ou outro framework) e jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nome = button.data('nome');
            var email = button.data('email');

            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-nome').val(nome);
            modal.find('#edit-email').val(email);
        });
    </script>
</body>
</html>
