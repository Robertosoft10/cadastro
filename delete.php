<?php
session_start();
include_once 'Classes/user.classDao.php';

if(isset($_GET['idUser'])){
$userDAO = new UserDAO();
$userDAO->delete($_REQUEST['idUser']);

    $_SESSION['detetado'] = "Usuário deletado";
      header('location: index.php');
}else{
    $_SESSION['detetadoErro'] = "Falha! Usuário não deletado";
    header('location: index.php');
}

?>
