<?php
if ($_POST && isset($_POST["eentrar"])){//trocar a senha do usuarios
    $eentrar = $_POST["eentrar"];

    if($eentrar)//if do input entrar
    {        
      $emailantigo = $_POST["eantigo"];//senha antiga digitada pelo form
      $emailnovo = $_POST["enovo"];//nova senha
      $emailconfirme = $_POST["econfirmacao"];//confirmar a senha nova
      $email = $_SESSION["email"];//email da sessao
      $id = $_SESSION["id"];
      
  
      $sql = "SELECT email FROM usuarios WHERE id = '$id'";
      $resultado = mysqli_query($conn,$sql);
      $vetor = mysqli_fetch_array($resultado);
      $antigaDB = $vetor["email"];
  
    

      if ($emailantigo != $antigaDB) {//if onde a senha antiga está incorreta
          echo"<script type='text/javascript'>
        alert('O email antigo não está correto!');
        window.location.href='index.php';</script>";
      }//fim do if onde senha antiga está incorreta

      elseif ($emailantigo == $emailnovo) {//else if onde as senhas precisam ser diferentes
          echo"<script type='text/javascript'>
        alert('Não pode ser o mesmo email!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else if($emailnovo != $emailconfirme)//inicio do else if onde a senha nova tem q ser diferente
      {
          echo"<script type='text/javascript'>
        alert('A Confirmação está incorreta!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else {
          $sql = "UPDATE usuarios SET email = '$emailnovo' WHERE id = '$id'";
          if (mysqli_query($conn,$sql)) {
              echo"<script type='text/javascript'>
        alert('Email alterado com sucesso!');
        window.location.href='index.php';</script>";
          }//if onde mostra a mensagem que trocou com sucesso
      }//fim do else que muda a senha
    }//fim do input entrar
  }//fim do if trocar a senha do usuarios
?>