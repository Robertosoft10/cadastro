<?php
session_start();
require_once 'Classes/user.classDao.php';
$userDAO = new UserDAO();
$listUser = $userDAO->list();
if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
    $objetoUser = $userDAO->consult($idUser);
}
?>
<!DOCTYPE html>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Cadastro - PHP-OO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="layout" content="main"/>
    <link href="css/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
	<link rel=StyleSheet TYPE="text/css" href="../css/estiloExterno.css">
	<link rel="shortcut icon"  href="imagens/ico_escola.png">
	<link rel="stylesheet" href="css/bower_components/font-awesome/css/font-awesome.min.css">
</head>
    <style>
    </style>
</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div id="app-nav-top-bar" class="nav-collapse">
                        <ul class="nav">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="body-container">
            <div id="body-content">
                    <div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul>
                                <li>
                                    <a href="index.php">
                                        <i class="icon-home icon-large"></i> Página Inicial
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
        <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Sistema de  Cadastro<br/>
                            <small>Cadastro de Usuários</small>
                        </h3>
                    </header>
                </div>
                <div class="page-nav-options">
                    <div class="span9">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="index.php"><i class="icon-home icon-large"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page container">
      <!-- cadastro form -->
        <div class="row">
          <?php if(isset($_SESSION['salvo'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION['salvo'];?>
        </div>
        <?php unset($_SESSION['salvo']); } ?>

        <?php if(isset($_SESSION['salvoErro'])){?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['salvoErro'];?>
        </div>
        <?php unset($_SESSION['salvoErro']); } ?>

        <?php if(isset($_SESSION['atualizado'])){?>
        <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['atualizado'];?>
      </div>
      <?php unset($_SESSION['atualizado']); } ?>

        <?php if(isset($_SESSION['atualizadoErro'])){?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['atualizadoErro'];?>
        </div>
        <?php unset($_SESSION['atualizadoErro']); } ?>

        <?php if(isset($_SESSION['detetado'])){?>
        <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['detetado'];?>
      </div>
      <?php unset($_SESSION['detetado']); } ?>

        <?php if(isset($_SESSION['detetadoErro'])){?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['detetadoErro'];?>
        </div>
        <?php unset($_SESSION['detetadoErro']); } ?>
        <?php if(!isset($_GET['idUser'])){?>
            <div class="span12">

                <div class="box">
                    <div class="box-header">
                        <i class="icon-book"></i>
                        <h5>Formulário para Cadastro</h5>
                    </div>
                    <div class="box-content">
                        <form class="form-group" action="salvar.php" method="post">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input class="span5" name="nome" type="text" placeholder="Nome">
                            </div>
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input class="span5" name="sobrenome" type="text" placeholder="Sobrenome">
                            </div>
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input class="span5" name="email" type="text" placeholder="E-mail">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-ok"></i>
                                    Cadastrar
                                </button>
                        </form>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- atualiz form -->
          <?php }else{ ?>
                    <div class="span12">
                        <div class="box">
                            <div class="box-header">
                                <i class="icon-book"></i>
                                <h5>Formulário para Alterar dados</h5>
                            </div>
                            <div class="box-content">
                                <form class="form-group" action="atualizar.php?idUser=<?= $objetoUser->getIdUser();?>" method="post">
                                    <div class="input-prepend">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input class="span5" name="nome" type="text" value="<?php echo $objetoUser->getNome();?>">
                                    </div>
                                    <div class="input-prepend">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input class="span5" name="sobrenome" type="text" value="<?php echo $objetoUser->getSobreNome();?>">
                                    </div>
                                    <div class="input-prepend">
                                        <span class="add-on"><i class="icon-envelope"></i></span>
                                        <input class="span5" name="email" type="text" value="<?php echo $objetoUser->getEmail();?>">
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-ok"></i>
                                            Salvar Alterações
                                        </button>
                                </form>
                                </div>
                            </div>
                          </div>
                      </div>
                    <?php } ?>
                    <div class="span12">
                        <div class="box pattern pattern-sandstone">
                            <div class="box-header">
                                <i class="icon-table"></i>
                                <h5>
                                    Lista de usuários cadastrados
                                </h5>
                            </div>
                            <div class="box-content box-table">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>E-mail</th>
                                            <th class="td-actions"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php while($row = array_shift($listUser)){?>
                                        <tr>
                                          <td><?php echo $row->getIdUser();?></td>
                                          <td><?php echo $row->getNome();?></td>
                                          <td><?php echo $row->getSobrenome();?></td>
                                          <td><?php echo $row->getEmail();?></td>
                                          <td class="td-actions">
                                                <a href="index.php?idUser=<?= $row->getIdUser();?>" class="btn btn-small btn-info">
                                                    <i class="btn-icon-only icon-pencil"></i>
                                                </a>
                                                <a href="delete.php?idUser=<?= $row->getIdUser();?>" class="btn btn-small btn-danger">
                                                    <i class="btn-icon-only icon-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        <footer class="application-footer">
            <div class="container">
                <p>Application PHP - OO</p>
                </div>
            </div>
        </footer>

        <script src="../js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="../js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="../js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="../js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="../js/jquery/virtual-tour.js" type="text/javascript" ></script>
        <script type="text/javascript">
        $(function() {
            $('#sample-table').tablesorter();
            $('#datepicker').datepicker();
            $(".chosen").chosen();
        });
    </script>

	</body>
</html>
