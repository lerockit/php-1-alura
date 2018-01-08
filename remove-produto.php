<?php 
    require_once('header.php');

    $produtoDao = new ProdutoDao($conexao);

    verificaUsuario();
    $id = $_POST['id'];
    $produtoDao->removeProduto($id);
    $_SESSION['sucess'] = "Produto Removido com Sucesso";
    header("Location: lista.php");
    die();
?>