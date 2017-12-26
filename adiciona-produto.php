<?php include('conecta.php'); 
      include('banco-produto.php');
      include 'logica-usuario.php'; 

  verificaUsuario();

  $nome = $_POST['produto'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $categoria_id = $_POST['categoria_id'];
  if (array_key_exists('usado', $_POST)) {
    $usado = "true";
  } else {
    $usado = "false";
  }

  if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
    header("Location: formulario.php?add=true");
  } else {
    header("Location: formulario.php?add=false");
  }

  die();    
