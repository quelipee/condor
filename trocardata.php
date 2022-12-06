<?php
if ($_POST && isset($_POST["dentrar"])){//trocar a senha do usuarios
    $dentrar = $_POST["dentrar"];

    if($dentrar)//if do input entrar
    {        
      $dataantiga = $_POST["dantigo"];//senha antiga digitada pelo form
      $datanovo = $_POST["dnovo"];//nova senha
      $dataconfirme = $_POST["dconfirmacao"];//confirmar a senha nova
      $email = $_SESSION["email"];//email da sessao
      $id = $_SESSION["id"];
      
  
      $sql = "SELECT datanasc FROM usuarios WHERE id = '$id'";
      $resultado = mysqli_query($conn,$sql);
      $vetor = mysqli_fetch_array($resultado);
      $antigaDB = $vetor["datanasc"];
  
    

      if ($dataantiga != $antigaDB) {//if onde a senha antiga está incorreta
          echo"<script type='text/javascript'>
        alert('A data antiga não está correta!');
        window.location.href='index.php';</script>";
      }//fim do if onde senha antiga está incorreta

      elseif ($dataantiga == $datanovo) {//else if onde as senhas precisam ser diferentes
          echo"<script type='text/javascript'>
        alert('Não pode ser a mesma data!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else if($datanovo != $dataconfirme)//inicio do else if onde a senha nova tem q ser diferente
      {
          echo"<script type='text/javascript'>
        alert('A Confirmação está incorreta!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else {
          $sql = "UPDATE usuarios SET datanasc = '$datanovo' WHERE id = '$id'";
          if (mysqli_query($conn,$sql)) {
              echo"<script type='text/javascript'>
        alert('Data alterada com sucesso!');
        window.location.href='index.php';</script>";
          }//if onde mostra a mensagem que trocou com sucesso
      }//fim do else que muda a senha
    }//fim do input entrar
  }//fim do if trocar a senha do usuarios
?>