<?php 

    require_once('header.php');
       
    verificaUsuario();

    $categoria = new Categoria();

    $nome = $_POST['produto'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $categoria->setId($_POST['categoria_id']);

    if (array_key_exists('usado', $_POST)) {
        $usado = "true";
    } else {
        $usado = "false";
    }

    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produtoDao = new ProdutoDao($conexao);

    if($produtoDao->insereProduto($produto)) {
        $_SESSION['sucess'] = 'O produto '.$produto->getNome().' foi inserido com sucesso';
        header("Location: adiciona-form.php");
    } else {
        $_SESSION['error'] = 'O produo '.$produto->getNome().' não foi inserido';
        header("Location: adiciona-form.php");
    }

    die();    
