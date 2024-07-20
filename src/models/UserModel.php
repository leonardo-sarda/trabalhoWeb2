<?php 


class UserModel{
   public function getAllUsers(){
    require_once '../database/db_config.php';
    $db = new dataBase();
    $conn = $db->getConnection();

    
    
    // Query para obter todos os usuários
    $sql = "SELECT * FROM tabela_teste";
    $result = $conn->query($sql);

    // Retorna os resultados como um array
    $users = [];
    while ($row = $result->fetch_assoc()){
        $users[] = $row;
    }
    
    return $users;
   }

   public function createUsers($username, $email){

    require_once '../database/db_config.php';
    $db = new dataBase();
    $conn = $db->getConnection();

    $username = $conn->real_escape_string($username);
    //$password = $conn->real_escape_string($password);
    $email = $conn->real_escape_string($email);


    $sql = "INSERT INTO tabela_teste (nome, email, id_setor) 
            VALUES ('$username', '$email', 1)";

        if ($conn->query($sql)=== true){
            return true;
        } else {    
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false; // Erro na inserção

        }
    }

    public function deleteUser($id){
        require_once '../database/db_config.php';
        $db = new dataBase();
        $conn = $db->getConnection();

        $id = $conn->real_escape_string($id);

        $sql = "DELETE FROM tabela_teste WHERE id = $id";

        if ($conn->query($sql)===true){

        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    public function updateUser($id, $username, $email){
        require_once '../database/db_config.php';
        $db = new dataBase();
        $conn = $db->getConnection();


        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);

        $sql = "UPDATE tabela_teste SET ";
        if (!empty($username)) {
            $sql .= "nome = '$username'";
        }
        if (!empty($email)) {
            if (!empty($username)) {
                $sql .= ", ";
            }
            $sql .= "email = '$email'";
        }
        $sql .= " WHERE id = $id";

        if ($conn->query($sql) === true) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
   
}

?>