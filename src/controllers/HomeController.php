<?php
require_once '../models/UserModel.php';
class HomeController {
    public function listUsers(){
        // Lógica para carregar dados e preparar para a view
        //require_once '../models/UserModel.php';
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        return $users;
        
    }

    public  function createUser($username, $email){
        //require_once '../models/UserModel.php';
        $userModel = new UserModel();

        $result = $userModel->createUsers($username, $email);

        if ($result) {
            echo "sucesso";
    
        } else {
            echo "Erro ao criar usuário.";
        }
    }

    public function deleteUser($id){
        
        $userModel = new UserModel();
        $result = $userModel->deleteUser($id);

        if($result){
            echo "sucesso";
    
        } else {
            echo "Erro ao criar usuário.";
        }
    }

    public function updateUser($id, $username, $email){
        
        $userModel = new UserModel();
        $result = $userModel->updateUser($id, $username, $email);
        
        if($result){
            echo "sucesso";
        }else {
            echo "Erro ao criar usuário.";
        }
    }

}