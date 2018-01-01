<?php require_once('conecta.php'); 
      require_once('banco-produto.php');
      require_once('logica-usuario.php'); 
      require_once('class/produto.php');
      require_once('class/categoria.php');      

  verificaUsuario();

  $produto = new produto();
  $categoria = new categoria();

  $produto->nome = $_POST['produto'];
  $produto->preco = $_POST['preco'];
  $produto->descricao = $_POST['descricao'];
  $produto->categoria->id = $_POST['categoria_id'];
  if (array_key_exists('usado', $_POST)) {
    $produto->usado = "true";
  } else {
    $produto->usado = "false";
  }

  if(insereProduto($conexao, $produto)) {
    $_SESSION['sucess'] = 'O produto '.$produto->nome.' foi inserido com sucesso';
    header("Location: formulario.php");
  } else {
    $_SESSION['error'] = 'O produo '.$produto->nome.' não foi inserido';
    header("Location: formulario.php");
  }

  die();    
