<?php
if ($_POST && isset($_POST["sentrar"])){//trocar a senha do usuarios
    $sentrar = $_POST["sentrar"];

    if($sentrar)//if do input entrar
    {        
      $sobreantigo = $_POST["santigo"];//senha antiga digitada pelo form
      $sobrenovo = $_POST["snovo"];//nova senha
      $sobreconfirme = $_POST["sconfirmacao"];//confirmar a senha nova
      $email = $_SESSION["email"];//email da sessao
      $id = $_SESSION["id"];
  
      $sql = "SELECT sobrenome FROM usuarios WHERE id = '$id'";
      $resultado = mysqli_query($conn,$sql);
      $vetor = mysqli_fetch_array($resultado);
      $antigaDB = $vetor["sobrenome"];
  
    

      if ($sobreantigo != $antigaDB) {//if onde a senha antiga está incorreta
          echo"<script type='text/javascript'>
        alert('O sobrenome antigo não está correto!');
        window.location.href='index.php';</script>";
      }//fim do if onde senha antiga está incorreta

      elseif ($sobreantigo == $sobrenovo) {//else if onde as senhas precisam ser diferentes
          echo"<script type='text/javascript'>
        alert('Não pode ser o mesmo sobrenome!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else if($sobrenovo != $sobreconfirme)//inicio do else if onde a senha nova tem q ser diferente
      {
          echo"<script type='text/javascript'>
        alert('A Confirmação está incorreta!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else {
          $sql = "UPDATE usuarios SET sobrenome = '$sobrenovo' WHERE id = '$id'";
          if (mysqli_query($conn,$sql)) {
              echo"<script type='text/javascript'>
        alert('Sobrenome alterado com sucesso!');
        window.location.href='index.php';</script>";
          }//if onde mostra a mensagem que trocou com sucesso
      }//fim do else que muda a senha
    }//fim do input entrar
  }//fim do if trocar a senha do usuarios
?>