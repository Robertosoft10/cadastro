<?php
session_start();
include_once 'Classes/user.classDao.php';

if(!empty($_POST['nome']) && !empty($_POST['email'])){

$objetoUser = new User();
$objetoUser->setNome($_POST['nome']);
$objetoUser->setSobreNome($_POST['sobrenome']);
$objetoUser->setEmail($_POST['email']);

$dao = new UserDAO();
$dao->insert($objetoUser);

$_SESSION['salvo'] = "Cadastro efetuado";
    header('location: index.php');

}else{
   $_SESSION ['salvoErro'] = "Falha no cadastro! Nome e email obrigatório ";
    header('location: index.php');
}
?>
