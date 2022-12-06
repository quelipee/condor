<?php 
    include 'conexao.php'; 
    include 'cadastrousuarios.php';//cadastro de usuarios
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="condor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Condor</title>
<style>
    body{
        background:white;
        /*background-image:linear-gradient(#F0F7F4, #FCFFF7);*/
        background-image: url("img/fundo2.png");
        background-repeat: no-repeat;
    }
</style>
</head>
<body>
 <?php include 'header.php';//login ?>
    <br>
    <form action="" method="post">
    <div class="container" id="registro">
        <div class="row">
            <div class="col-sm">
                <h3>Crie uma Conta gratuita!!</h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <input type="text" id="einput" placeholder="Nome" name="nome">
            </div>
            <div class="col-sm">
                <input type="text" id="dinput" placeholder="Sobrenome" name="sobrenome">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
            <input type="text" id="inputt" placeholder="Email" name="email">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <input type="password" id="inputt" placeholder="Senha" name="senha">
            </div>
        </div>
        <div class="row">
            <div class="col-sm" id="linhadata">
                <label>Data de Nascimento</label>
                <input type="date" id="data" name="datanasc">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
            </div>
        </div>
    </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>