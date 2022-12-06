<?php 
session_start();
include 'conexao.php';
if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){
$mensvetor = "";

    echo"<script type='text/javascript'>
alert('Para acessar essa pagina você deve realizar o login!');
window.location.href='condor.php';</script>";
}

else{
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
}

include 'trocarsenha.php';
include 'trocarnome.php';
include 'trocarsobrenome.php';
include 'trocaremail.php';
include 'trocardata.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="indexcss.css">
    <link rel="stylesheet" href="configuração.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
   <title>Comfiguração</title>
<style>
   body
    {
      background-image: url("img/fundo2.png");
    }


    #f
    {
      
      width:200px;
      height:512px;
    }

    #f2
    {
      display:block;
      margin-left:auto;
      margin-right:auto;
      background:red;
      width:500px;
      height:450px;
      background-image:linear-gradient(to left,#CDE7BE,#97D2FB);
      border-style:solid;
      border-width:1px;
      border-color:thistle;
    }

    label{
      display:block;
      margin-left:auto;
      margin-right:auto;
      margin-top:5px;
      text-align:center;
      font-size:20px;
}

#nome
{
  margin-top:15px;
}

.inputt
{ 
  border-radius:5px;
  border-color:thistle;
  border-style:double;
  margin-right:auto;
  margin-left:auto;
  display:block;
  text-align:center;
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

#a
{
  font-size:12px;
  margin-left:163px;
}

#g
{
  margin-top:28px;
  border-style:solid;
  display:block;
  margin-left:auto;
  margin-right:auto;
  background:#FAF9F9;
  border-color:thistle;
  border-width:1px;
  height:45px;
  width:500px;
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

<form action="" methot="post">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div id="g">
                    <h3>Configuração da conta</h3>
                </div>
            </div>
        </div>
          <div class="row">
              <div class="col-sm" id="f">
                  <div id="f2">   
                  <label for="" id="nome">Nome:</label>
                    <input type="text" class="inputt" value="<?php echo $logvetor; ?>" disabled>
                    <a id="a" href="" data-toggle="modal" 
                    data-target="#nomemodal">Alterar nome</a>
                    <br>

                    <label for="">Sobrenome:</label>
                    <input type="text" class="inputt" value="<?php echo $sobrevetor; ?>" disabled>
                    <a id="a" href="" data-toggle="modal" 
                    data-target="#sobremodal">Alterar sobrenome</a>
                    <br>

                    <label for="">Email:</label>
                    <input type="text" class="inputt" value="<?php echo $emailvetor; ?>" disabled>
                    <a id="a" href="" data-toggle="modal" 
                    data-target="#emailmodal">Alterar email</a>
                    <br>

                    <label for="">Data Nascimento:</label>
                    <input type="text" class="inputt" value="<?php echo $datavetor; ?>" disabled>
                    <a id="a" href="" data-toggle="modal" 
                    data-target="#datamodal">Alterar data</a>
                  </div>
              </div>
          </div>
    </div>  
</form>


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

<form action="" method="post">
    <div class="modal" tabindex="-1" role="dialog" id="nomemodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header">Alterar Nome</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" name="nantigo" class="input" placeholder="Antigo nome" required><br>
            <input type="text" name="nnovo" class="input" placeholder="Novo nome" required><br>
            <input type="text" name="nconfirmacao" class="input" placeholder="Corfirme o nome" required>
      </div>
      <div class="modal-footer">
        <input type="submit" value="salvar" name="nentrar" id="entrar">
      </div>
    </div>
  </div>
</div>
</form>

<form action="" method="post">
    <div class="modal" tabindex="-1" role="dialog" id="sobremodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header">Alterar Sobrenome</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" name="santigo" class="input" placeholder="Antigo sobrenome" required><br>
            <input type="text" name="snovo" class="input" placeholder="Novo sobrenome" required><br>
            <input type="text" name="sconfirmacao" class="input" placeholder="Corfirme o sobrenome" required>
      </div>
      <div class="modal-footer">
        <input type="submit" value="salvar" name="sentrar" id="entrar">
      </div>
    </div>
  </div>
</div>
</form>

<form action="" method="post">
    <div class="modal" tabindex="-1" role="dialog" id="emailmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header">Alterar Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" name="eantigo" class="input" placeholder="Antigo email" required><br>
            <input type="text" name="enovo" class="input" placeholder="Novo email" required><br>
            <input type="text" name="econfirmacao" class="input" placeholder="Corfirme o email" required>
      </div>
      <div class="modal-footer">
        <input type="submit" value="salvar" name="eentrar" id="entrar">
      </div>
    </div>
  </div>
</div>
</form>

<form action="" method="post">
    <div class="modal" tabindex="-1" role="dialog" id="datamodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header">Alterar Data de nascimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="date" name="dantigo" class="input" placeholder="Antiga data de nascimento" required><br>
            <input type="date" name="dnovo" class="input" placeholder="Nova data de nascimento" required><br>
            <input type="date" name="dconfirmacao" class="input" placeholder="Corfirme a data de nascimento" required>
      </div>
      <div class="modal-footer">
        <input type="submit" value="salvar" name="dentrar" id="entrar">
      </div>
    </div>
  </div>
</div>
</form>

</body>
</html>