<?php
class User{
  private $idUser;
  private $nome;
  private $sobrenome;
  private $email;

  public function __construct($idUser=0, $nome="", $sobrenome="", $email=""){
    $this->idUser = $idUser;
    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    $this->email = $email;
  }
  public function setIdUser($idUser){
    $this->idUser = $idUser;
  }
  public function getIdUser(){
    return $this->idUser;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function getNome(){
    return $this->nome;
  }
  public function setSobreNome($sobrenome){
    $this->sobrenome = $sobrenome;
  }
  public function getSobreNome(){
    return $this->sobrenome;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getEmail(){
    return $this->email;
  }
}
 ?>
