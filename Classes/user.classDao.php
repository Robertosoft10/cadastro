<?php
  require_once 'config.php';
	include_once 'user.class.php';

	class UserDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}
        public function insert($user){
            $nome = $user->getNome();
            $sobrenome = $user->getSobreNome();
            $email = $user->getEmail();
            $sql = "INSERT INTO usuarios (nome, sobrenome, email)VALUES('$nome', '$sobrenome', '$email')";
            $this->conexao->query($sql);
        }

        public function list(){
        $sconsulta = $this->conexao->query("SELECT * FROM usuarios");
  			$arrayUsers = array();
  			while ($linha = mysqli_fetch_array($sconsulta)) {
              $user = new User($linha['idUser'], $linha['nome'], $linha['sobrenome'], $linha['email']);
				array_push($arrayUsers, $user);
			}
			return $arrayUsers;
        }

        public function consult($idUser){
            $linha = $this->conexao->buscarRegistro("SELECT * FROM usuarios WHERE idUser = '$idUser'");
            $user = new User($linha['idUser'], $linha['nome'], $linha['sobrenome'], $linha['email']);
            return $user;
        }
        public function update($user){
          $idUser = $user->getIdUser();
          $nome = $user->getNome();
          $sobrenome = $user->getSobreNome();
          $email = $user->getEmail();

            $sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', email='$email' WHERE idUser='$idUser'";
            $this->conexao->query($sql);
        }
        public function delete($idUser){
            $sql = "DELETE FROM usuarios WHERE idUser = '$idUser'";
            $this->conexao->query($sql);
        }
    }
?>
