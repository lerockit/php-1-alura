<?php include('header.php'); 
      include('conecta.php'); 
      include('banco-produto.php');

  $id = $_POST['id'];

  removeProduto($conexao, $id);

  header("Location: lista.php?removed=true");

  die();
?>