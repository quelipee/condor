<?php 
    session_start();
    include 'conexao.php';
    include 'trocarsenha.php';

    if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){
    $mensvetor = "";

        echo"<script type='text/javascript'>
		    alert('Para acessar essa pagina você deve realizar o login!');
		    window.location.href='condor.php';</script>";
    }

    else//mostrar nome do usuarios na tela de perfil
    {
      $email = $_SESSION["email"];
      $id = $_SESSION["id"];

      $sqlnome = "SELECT * FROM usuarios WHERE id = '$id'";
			$resultado = mysqli_query($conn, $sqlnome);
    		//Guardar o valor em vetor
    	$vetor = mysqli_fetch_array($resultado);
      $logvetor = $vetor['nome'];

      $sqlid =  "SELECT recado from usuarios WHERE id = '$id'";
      $resultado = mysqli_query($conn, $sqlid);
      //Guardar o valor em vetor
      $vetor = mysqli_fetch_array($resultado);
      $recado = $vetor['recado'];
    }//fim do mostrar nome do usuarios na tela de perfil

    if($_POST && $_POST['enviar'] == 'Enviar')
    {
      $mensagem = $_POST['mensagem'];

      $data = date("Y-m-d");
      $sql = "INSERT INTO mensagens (mensagem,idusuarios,datapost)
        VALUES ('$mensagem','$id','$data')";
        mysqli_query($conn, $sql);
    }

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
    <title>Pagina Inicial</title>

    <style>

    body
    {
      background-image: url("img/fundo2.png");
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
#texto
{
  height:120px;
  margin-top: 48px;
  display:block;
  margin-left:auto;
  margin-right:auto;
  padding: 12px 20px;
  border-radius:15px;
  box-sizing: border-box;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
  box-shadow:0px 0px 1px;
}

#indexperfil
{
  margin-left:30px;
  background:#1abc9c;
}

#cardm
{
  margin-top:50px;
  width:700px;
}

#mensagem
{
  font-size:20px;
}

#data
{
  font-size:12px;
  text-align:right;
}

h6
{
  margin-left:15px;
  margin-top:5px;
  background: #1abc9c;
}

#caixa
{
    background:#1abc9c;
    border-style:solid; border-width:1px;
    margin-left:29px;
    margin-right:29px;
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
            <div class="col-sm-4">
          <br>
                  <div class="card" style="width: 18rem;" id="indexperfil">
              <img src="img/perfil.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
              <h5 class="card-title">
              <?php echo "<h4>$logvetor</h4>" ?>
              </h5>
              <p class="card-text"><?php echo $recado; ?></p>
                  </div>
                </div>
            </div>
            
              <div class="col-sm">

            <div class="card mb-3" id="cardm" style="border-color:black;
              border-width:1px; background:#1abc9c;">

              <form action="" method="post">
              <textarea name="mensagem" id="texto" cols="70" rows="2"
                placeholder="Oque está pensando?" required></textarea>

                <input type="submit" id="entrar" value="Enviar" name="enviar"
                style="width:100px; margin-left:524px;
                display:block; margin-top:10px; margin-bottom:10px;">
                 
              </form>

            </div>   
              </div>
        </div>
        <br>
          <div class="row">
              <div class="col-sm">
    <?php 
    
  $sqlid =  "SELECT idusuarios from mensagens WHERE idusuarios = '$id'";
  $resultado = mysqli_query($conn, $sqlid);
  //Guardar o valor em vetor
  $vetor = mysqli_fetch_array($resultado);
  $idmensagem = $vetor['idusuarios'];

  if($idmensagem == $id)
  {
    $data = date("d-m-Y"); 

$sql = "SELECT * FROM mensagens WHERE idusuarios = '$id' ORDER BY idmensagem DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<div id='caixa' class='card-body' style=''>";
    echo "<h5 id='mensagem' class='card-title'><h4>$logvetor  </h4>" . $row["mensagem"] . "</h5>";
    echo "<p id='data' class='card-text'>$data</p>";
    echo "<hr>";
    echo "</div>";
    echo "<br>";
  }
} 
  }
  else 
    {
      echo "<h6 id='caixa' class='card-body'> Sem Poste</h6>";
    }
              
?> 
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