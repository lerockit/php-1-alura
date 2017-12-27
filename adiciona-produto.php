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
    $_SESSION['sucess'] = 'O produto foi inserido com sucesso';
    header("Location: formulario.php");
  } else {
    $_SESSION['error'] = 'O produo não foi inserido';
    header("Location: formulario.php");
  }

  die();    
