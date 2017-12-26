<?php include('conecta.php'); 
      include('banco-produto.php');
      include 'logica-usuario.php'; 

  verificaUsuario();

  $id = $_POST['id'];
  $nome = $_POST['produto'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $categoria_id = $_POST['categoria_id'];

  if (array_key_exists('usado', $_POST)) {
    $usado = "true";
  } else {
    $usado = "false";
  };

  if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {
    header("Location: altera-form.php?id={$id}&alterado=true");
  } else {
    header("Location: altera-form.php?id={$id}&alterado=false");
  }

  die();    
