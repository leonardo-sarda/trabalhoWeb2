<?php
 include '../view/home.php'
?>

<?php 

require_once '../controllers/HomeController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $email = $_POST['email'];


     // Cria uma instância do HomeController
     $controller = new HomeController();

     // Chama o método para criar usuário no HomeController
     $controller->createUser($username, $email);

     header("Location: users.php");
     exit;
 


}
?>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<title>Criar Usuários</title>
</head>
<html>
    <H1>Create User</H1>
    <form action="createUser.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>nome</th>
                    <th>email</th>
                    <th>Criar</th>
                </tr>

            </thead>
            <tbody>
                <td><input type="text" name="username" placeholder="name" style="width:100%"></td>
                <td><input type="text" name="email" placeholder="email" style="width:100%"></td>
                <td><button type="submit"  class='btn btn-confirm'>Enviar</button></td>
            </tbody>

        </table>
</html>
