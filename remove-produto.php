<?php include('conecta.php'); 
      include('banco-produto.php');
      include 'logica-usuario.php'; 

  verificaUsuario();
  $id = $_POST['id'];
  removeProduto($conexao, $id);
  $_SESSION['sucess'] = "Produto Removido com Sucesso";
  header("Location: lista.php");
  die();
?>