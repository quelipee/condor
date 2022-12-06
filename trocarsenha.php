<?php
if ($_POST && isset($_POST["entrar"])){//trocar a senha do usuarios
    $entrar = $_POST["entrar"];

    if($entrar)//if do input entrar
    {        
      $antiga = md5($_POST["antiga"]);//senha antiga digitada pelo form
      $nova = md5($_POST["nova"]);//nova senha
      $confirme = md5($_POST["confirmacao"]);//confirmar a senha nova
      $email = $_SESSION["email"];//email da sessao
      $id = $_SESSION["id"];
  
      $sql = "SELECT senha FROM usuarios WHERE id = '$id'";
      $resultado = mysqli_query($conn,$sql);
      $vetor = mysqli_fetch_array($resultado);
      $antigaDB = $vetor["senha"];
  
    

      if ($antiga != $antigaDB) {//if onde a senha antiga está incorreta
          echo"<script type='text/javascript'>
        alert('A senha antiga não está correta!');
        window.location.href='index.php';</script>";
      }//fim do if onde senha antiga está incorreta

      elseif ($antiga == $nova) {//else if onde as senhas precisam ser diferentes
          echo"<script type='text/javascript'>
        alert('As senha precisam ser diferentes!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else if($nova != $confirme)//inicio do else if onde a senha nova tem q ser diferente
      {
          echo"<script type='text/javascript'>
        alert('A senha nova são diferentes!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else {
          $sql = "UPDATE usuarios SET senha = '$nova' WHERE id = '$id'";
          if (mysqli_query($conn,$sql)) {
              echo"<script type='text/javascript'>
        alert('Senha alterada com sucesso!');
        window.location.href='index.php';</script>";
          }//if onde mostra a mensagem que trocou com sucesso
      }//fim do else que muda a senha
    }//fim do input entrar
  }//fim do if trocar a senha do usuarios
?>