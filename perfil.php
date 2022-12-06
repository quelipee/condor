<?php 
    session_start();
    include 'conexao.php';
    include 'trocarsenha.php';
    if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){

        echo"<script type='text/javascript'>
		alert('Para acessar essa pagina você deve realizar o login!');
		window.location.href='cadastro.php';</script>";
    }


    else//mostrar nome do usuarios na tela de perfil
    {
        $email = $_SESSION["email"];
        $id = $_SESSION["id"];

        $sqlnome = "SELECT nome FROM usuarios WHERE id = '$id'";
			  $resultado = mysqli_query($conn, $sqlnome);
    		//Guardar o valor em vetor
    		$vetor = mysqli_fetch_array($resultado);
        $logvetor = $vetor['nome'];

        $sqlsobrenome = "SELECT sobrenome FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn,$sqlsobrenome);
        $vetor = mysqli_fetch_array($resultado);
        $sobrevetor = $vetor['sobrenome'];
            
        $sqlsenha = "SELECT senha FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sqlsenha);
        $vetor = mysqli_fetch_array($resultado);
        $senhavetor = $vetor['senha'];   
        
        $sqldata = "SELECT datanasc FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sqldata);
        $vetor = mysqli_fetch_array($resultado);
        $datavetor = $vetor['datanasc'];

        $sqldata = "SELECT email FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sqldata);
        $vetor = mysqli_fetch_array($resultado);
        $emailvetor = $vetor['email'];
       
    }//fim do mostrar nome do usuarios na tela de perfil

    if($_POST && $_POST['enviar'] == 'enviar')
    {
      $mensagem = $_POST['mensagem'];

      $data = date("Y-m-d");
      $sql = "UPDATE usuarios SET recado = '$mensagem' WHERE id = '$id'";
        mysqli_query($conn, $sql);
    }

    $sqlid =  "SELECT recado from usuarios WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sqlid);
    //Guardar o valor em vetor
    $vetor = mysqli_fetch_array($resultado);
    $recado = $vetor['recado'];

    

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="indexcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <title>Perfilt</title>
    <style>

body
    {
      background-image: url("img/fundo2.png");
    }
#texto
{
  height:120px;
  display:block;
  padding: 2px 20px;
  border-radius:15px;
  box-sizing: border-box;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
  margin-left:auto;
  margin-right:auto;
}

    #mensagem
{
    font-size:20px;
    font-weight:bolder;
    margin-left:165px;
}

#formulario
{
    margin-bottom:30px;
    padding:20px;
    margin-top:15px;
    background:white;
    width:500px;
    border-style:solid;
    border-collapse:collapse;
    border-width:1px;
    border-color:thistle;
    
}

#indexperfil
{
    margin-top:15px;
    margin-bottom:30px;
    margin-left:137px;
    background:#1abc9c;
}

h2{
    margin-left:auto;
    margin-right:auto;
    display:block;
    width:840px;
    border-color:thistle;
    background:white;
    border-style:solid;
    border-width:1px;
    border-radius:5px;
    text-align:center;
    margin-top:20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 
    'Lucida Sans', Arial, sans-serif;
}

#label
{
    font-weight:bolder;
    margin-left:105px;
}

#enviar
{   
    margin-top:20px;
    margin-left:270px;
    -moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0));
	background:-moz-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-webkit-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-o-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-ms-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0',GradientType=0);
	background-color:#3d94f6;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #337fed;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
}

.input{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 15px;
    padding:5px;
    border-style:solid;
    border-width:1px;
    border-color:thistle;
}

#img{
    margin-left:137px;
    font-size:13px;
}

#btn
{
    margin-top:15px;
    margin-left:330px;
    -moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0));
	background:-moz-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-webkit-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-o-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:-ms-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
	background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0',GradientType=0);
	background-color:#3d94f6;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #337fed;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
}

h4
{
  color:white;
  font-size:20px;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1abc9c;">
  <a class="navbar-brand" href="index.php">Condor</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="q" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="q" href="perfil.php">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="q" href="configuracao.php">Configuração</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="img/perfil.jpg" alt="..." class="img-thumbnail" id="perfil">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"
          data-toggle="modal" data-target="#sitemodal" >Mudar senha</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background:white;">Pesquisar</button>
    </form>
  </div>
</nav>

    <div class="container" style="background:#E6E6E6; border-style:solid;
    border-width:1px; border-color:thistle;">
        <div class="row">
            <div class="col-sm">
                <h2>Perfil</h2>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-5">
                        <div class="card" style="width: 18rem;" id="indexperfil">
                    <img src="img/perfil.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                    <h5 class="card-title">
                    <?php echo "<h4>$logvetor</h4>"; ?>
                    </h5>
                    <p class="card-text">
                    <?php echo $recado;?>
                    </p>
                        </div>
                        
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                        
                        <input type="file" name="imagem" id="img"/><br>
                        <input type="submit" value="Enviar" id="btn"/>
                    </form>
            </div><!--fim do div row-->

                <div class="col-sm-4">

                    <div id="formulario">

                    <label id="label">Nome:</label>
                    <?php echo $logvetor; ?>
                    <br>
                    <label id="label">Sobrenome:</label>
                    <?php echo $sobrevetor; ?>
                    <br>
                    <label id="label">Email:</label>
                    <?php echo $emailvetor; ?>
                    <br>
                    <label id="label">Senha</label>
                    <input type="password" value='<?php echo $senhavetor; ?>' disabled>
                    <br>
                    <label id="label">Data de Nascimento:</label>
                    <?php echo $datavetor; ?>
                    <br>

                    <form action="" method="post">
                    <label id="mensagem">Mensagem</label><br>

                    <textarea name="mensagem" id="texto" cols="30" rows="10"
                    placeholder="Digite algo. . ."></textarea>

                    <input type="submit" name="enviar" id="enviar" value="enviar">
                    </form>
                        </div><!--fim do div formulario-->
                </div><!--fim do div col-sm-4-->

            </div><!--fim do row-->
            
            <div class="row">
                <div class="col-sm">
                        
                </div>
            </div>
        </div>


<form action="" method="post">
    <div class="modal" tabindex="-1" role="dialog" id="sitemodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header">Trocar senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="password" name="antiga" class="input" placeholder="Antiga senha" required><br>
            <input type="password" name="nova" class="input" placeholder="Nova senha" required><br>
            <input type="password" name="confirmacao" class="input" placeholder="Corfirme a senha" required>
      </div>
      <div class="modal-footer">
        <input type="submit" value="salvar" name="entrar" id="entrar">
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>
