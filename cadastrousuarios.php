<?php
//cadastro de usuarios
if(isset($_POST["email"]) || isset($_POST["senha"]) || isset($_POST["nome"]) || 
isset($_POST["sobrenome"])|| isset($_POST["datanasc"])){
             
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);//Criptografia para senha MD5
    $datanasc = $_POST["datanasc"];
    $cadastrar = $_POST["cadastrar"];

    $sql = "SELECT email FROM usuarios WHERE 
        email = '$email'";//Verifica o login

    //executar o SQL através Query
    $resultado = mysqli_query($conn, $sql);
    //Guardar o valor em vetor
    $vetor = mysqli_fetch_array($resultado);
    $logvetor = $vetor['email'];

    if($cadastrar){

    if($logvetor == $email)
    {
        echo "<script type='text/javascript'>
        	alert('Esse login já existe!');
        	window.location.href='condor.php';
        	</script>";
            die();
    }

    else{
        $sql = "INSERT INTO usuarios (nome, sobrenome ,email, senha, datanasc) 
        VALUES ('$nome','$sobrenome','$email','$senha','$datanasc')";
        $inserir = mysqli_query($conn, $sql);
        if($inserir)//verifica se deu certo
        {
            echo"<script type='text/javascript'>
        		alert('Usuário cadastrado com sucesso!');
        		window.location.href='condor.php';
                </script>";
        }
    }

    mysqli_close($conn);
    }
}

?>