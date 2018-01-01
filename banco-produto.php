<?php

  function insereProduto($conexao, produto $produto) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado})";
    $result = mysqli_query($conexao, $query);
    return $result;
  };

  function listaProdutos($conexao) {
    $produtos = array();
    $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id";
    $resultado = mysqli_query($conexao, $query);
    while ( $produto_array = mysqli_fetch_assoc($resultado) ) {
      $categoria = new categoria();
      $categoria->nome = $produto_array['categoria_nome'];
      $categoria->id = $produto_array['categoria_id'];

      $produto = new produto();
      $produto->id = $produto_array['id'];
      $produto->nome = $produto_array['nome'];
      $produto->preco = $produto_array['preco'];
      $produto->descricao = $produto_array['descricao'];
      $produto->categoria = $categoria;
      $produto->usado = $produto_array['usado'];

      array_push($produtos, $produto);
    };
    return $produtos;
  };

  function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
  };

  function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $result = mysqli_query($conexao, $query);

    $produto_array = mysqli_fetch_assoc($result);

    $produto = new produto();
    $categoria = new categoria();

    $produto->id=$produto_array['id'];
    $produto->nome=$produto_array['nome'];
    $produto->preco=$produto_array['preco'];
    $produto->descricao=$produto_array['descricao'];
    $produto->usado=$produto_array['usado'];
    $produto->categoria=$categoria;

    $categoria->id=$produto_array['categoria_id'];
    return($produto);
  }

  function alteraProduto($conexao, produto $produto) {
    $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', categoria_id = {$produto->categoria->id}, usado = '{$produto->usado}' where id = '{$produto->id}' ";
    return mysqli_query($conexao, $query);
  }