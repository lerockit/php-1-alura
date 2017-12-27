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
    $usado = 1;
  } else {
    $usado = 0;
  };

  if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {
    $_SESSION['sucess'] = 'Produto '.$id.' alterado com sucesso';
    header("Location: altera-form.php?id={$id}");
  } else {
    $_SESSION['error'] = 'O produto '.$id.' não foi alterado';
    header("Location: altera-form.php?id={$id}");
  }

  die();    
