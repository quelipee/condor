<?php
		//login
		session_start();

		if(isset($_POST["entrar"])){

			$entrar = $_POST["entrar"];
			$email = $_POST["email"];
			$senha = md5($_POST["senha"]);

			$sqlnome = "SELECT * FROM usuarios WHERE email = '$email'";
			$resultado = mysqli_query($conn, $sqlnome);
    		//Guardar o valor em vetor
    		$vetor = mysqli_fetch_array($resultado);
      		$logvetor = $vetor['nome'];
    		$id = $vetor['id'];

			if($entrar){

		if(isset($entrar))
		{
			$sql = "SELECT * FROM usuarios WHERE email = '$email'
			AND senha = '$senha'";
			$verifica = mysqli_query($conn,$sql) 
			or die ("erro ao selecionar");
	
			if(mysqli_num_rows($verifica)<=0)
			{
				echo"<script type='text/javascript'>
				alert('Login e/ou senha incorretos');
				window.location.href='condor.php';</script>";
				die();
			}
	
			else
			{	
				$_SESSION["id"] = $id;
				$_SESSION["email"] = $email;
				header("location:index.php");
			}
		}
	}
}
?>
<header>
<form action="" method="post">
<div class="container-fluid">
<div class="row">
	<div class="col-sm">
		<h5>Condor</h5>
	</div>
	<div class="col-8">
	<label class="labellogin">Login:</label>
		<input type="text" id="inputlogin" name="email">	

	<label class="label">Senha:</label>
		<input type="password" id="input" name="senha">
		<input type="submit" value="entrar" id="entrar" name="entrar">
		<br>
		<a href=""><p>Esqueceu a senha?</p></a>
	</div>
	</div>
	</div>
	</form>
</header>
<style>

	#entrar{
		height:30px;
		width:70px;
		text-align:center;
		font-size:15px;
		border-color:#1abc9c;
		background:#66BEFF;
		border-radius:5px;
		color:white;
		margin-top:35px;
		margin-right:150px;
		position:fixed;

	}

	p{
		font-size:13px;
		margin-left:507px;
		color:white;
		position:fixed;
	}

	.labellogin{
		margin-top:35px;
		position:relative;
		
	}

	.label{
		margin-top:35px;
	}

	header{
		height:130px;
		padding: 0px;
 	 	text-align: center;
  		background: #1abc9c;
  		color: white;
		font-size: 30px;
	  }

	  h5{
		  margin-top:25px;
		  text-align:left;
		  font-size: 55px;
		  display:block;
		  margin-left:30px;
	  }

	  #input{
		  height:25px;
		  width:150px;
		  margin:0%;
		  border-radius:15px;
		  margin-right:auto;
		  border-color: thistle;
		  border-width: 1px;
   	 	  border-style: solid;
		  border-color: thistle;
		  font-size:12px;
		  padding:1px;
	  }

	  #inputlogin{
		  height:25px;
		  width:150px;
		  margin:0%;
		  border-radius:15px;
		  border-color: thistle;
		  border-width: 1px;
   	 	  border-style: solid;
		  border-color: thistle;
		  font-size:12px;
		  padding:1px;
	  }
</style>