<?php include('conecta.php'); 
      include('banco-produto.php');
      include 'logica-usuario.php'; 

  verificaUsuario();

  $id = $_POST['id'];

  removeProduto($conexao, $id);

  header("Location: lista.php?removed=true");

  die();
?>