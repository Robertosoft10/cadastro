<?php
session_start();
include_once 'Classes/user.classDao.php';

if(isset($_GET['idUser'])){

$objetoUser = new User();
$objetoUser->setIdUser($_GET['idUser']);
$objetoUser->setNome($_POST['nome']);
$objetoUser->setSobreNome($_POST['sobrenome']);
$objetoUser->setEmail($_POST['email']);

$dao = new UserDAO();
$dao->update($objetoUser);

$_SESSION['atualizado'] = "Registo atualizado";
    header('location: index.php');

}else{
   $_SESSION ['atualizadoErro'] = "Falha na atualização ";
    header('location: index.php');
}
?>
