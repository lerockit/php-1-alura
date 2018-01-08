<?php 

    require_once('header.php');   

    verificaUsuario();

    $produtoDao = new ProdutoDao($conexao);
    $categoriaDao = new CategoriaDao($conexao);

    $categoria = new Categoria();
    $categoria->setId($_POST['categoria_id']);

    $nome = $_POST['produto'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    if (array_key_exists('usado', $_POST)) {
        $usado = 1;
    } else {
        $usado = 0;
    };

    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produto->setId($_POST['id']);

    if($produtoDao->alteraProduto($produto)) {
        $_SESSION['sucess'] = 'O Produto '.$produto->getId().' foi alterado com sucesso';
        header("Location: altera-form.php?id={$produto->getId()}");
    } else {
        $_SESSION['error'] = 'O produto '.$produto->getId().' não foi alterado';
        header("Location: altera-form.php?id={$produto->getId()}");
    }

    die();    
