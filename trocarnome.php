<?php
if ($_POST && isset($_POST["nentrar"])){//trocar a senha do usuarios
    $nentrar = $_POST["nentrar"];

    if($nentrar)//if do input entrar
    {        
      $nomeantigo = $_POST["nantigo"];//senha antiga digitada pelo form
      $nomenovo = $_POST["nnovo"];//nova senha
      $nomeconfirme = $_POST["nconfirmacao"];//confirmar a senha nova
      $email = $_SESSION["email"];//email da sessao
      $id = $_SESSION["id"];
  
      $sql = "SELECT nome FROM usuarios WHERE id = '$id'";
      $resultado = mysqli_query($conn,$sql);
      $vetor = mysqli_fetch_array($resultado);
      $antigaDB = $vetor["nome"];
  
    

      if ($nomeantigo != $antigaDB) {//if onde a senha antiga está incorreta
          echo"<script type='text/javascript'>
        alert('O nome antigo não está correto!');
        window.location.href='index.php';</script>";
      }//fim do if onde senha antiga está incorreta

      elseif ($nomeantigo == $nomenovo) {//else if onde as senhas precisam ser diferentes
          echo"<script type='text/javascript'>
        alert('Não pode ser o mesmo nome!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else if($nomenovo != $nomeconfirme)//inicio do else if onde a senha nova tem q ser diferente
      {
          echo"<script type='text/javascript'>
        alert('A Confirmação está incorreta!');
        window.location.href='index.php';</script>";
      }//fim do else if
  
      else {
          $sql = "UPDATE usuarios SET nome = '$nomenovo' WHERE id = '$id'";
          if (mysqli_query($conn,$sql)) {
              echo"<script type='text/javascript'>
        alert('Nome alterado com sucesso!');
        window.location.href='index.php';</script>";
          }//if onde mostra a mensagem que trocou com sucesso
      }//fim do else que muda a senha
    }//fim do input entrar
  }//fim do if trocar a senha do usuarios
?>