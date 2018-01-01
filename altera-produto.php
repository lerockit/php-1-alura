<?php require_once('conecta.php'); 
      require_once('banco-produto.php');
      require_once('logica-usuario.php');
      require_once('class/produto.php');       

  verificaUsuario();

  $produto = new produto();

  $produto->id = $_POST['id'];
  $produto->nome = $_POST['produto'];
  $produto->preco = $_POST['preco'];
  $produto->descricao = $_POST['descricao'];
  $produto->categoria_id = $_POST['categoria_id'];

  if (array_key_exists('usado', $_POST)) {
    $produto->usado = 1;
  } else {
    $produto->usado = 0;
  };

  if(alteraProduto($conexao, $produto)) {
    $_SESSION['sucess'] = 'O Produto '.$produto->id.' foi alterado com sucesso';
    header("Location: altera-form.php?id={$produto->id}");
  } else {
    $_SESSION['error'] = 'O produto '.$produto->id.' não foi alterado';
    header("Location: altera-form.php?id={$produto->id}");
  }

  die();    
