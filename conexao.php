<?php
$servidor = "localhost:3307";
$usuario = "root";
$senha = "1234";
$database = "condor";

// Create connection
$conn = mysqli_connect($servidor, $usuario, $senha,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully<br>";

    /*$sql = "CREATE DATABASE condor";

    if(mysqli_query($conn,$sql))
    {
        echo"database criado";
    }

        else
        {
           echo "deu erro ae: ".mysqli_error($conn);
        }

        mysqli_close($conn);*/

           /*$sql = "CREATE TABLE mensagens(
           idmensagem INT PRIMARY KEY AUTO_INCREMENT,
           mensagem BLOB,
           idusuarios INT(6),
           datapost date,
           FOREIGN KEY(idusuarios) REFERENCES usuarios(id))";*/
           
           
           /*$sql = "CREATE TABLE usuarios(
           id INT PRIMARY KEY AUTO_INCREMENT,
           nome VARCHAR(50) NOT NULL,
           sobrenome VARCHAR(50) NOT NULL,
           email VARCHAR(50) NOT NULL,
           senha VARCHAR(50) NOT NULL,
           datanasc DATE,
           recado VARCHAR(244))";
           
        if(mysqli_query($conn,$sql))
        {
           echo"tabela mensagens criado";
        }
        else{
           echo "deu erro ae: ".mysqli_error($conn);
        }

        mysqli_close($conn);*/
?>

