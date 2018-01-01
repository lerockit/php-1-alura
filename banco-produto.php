<?php

  function insereProduto($conexao, produto $produto) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria_id}, {$produto->usado})";
    $result = mysqli_query($conexao, $query);
    return $result;
  };

  function listaProdutos($conexao) {
    $produtos = array();
    $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id";
    $resultado = mysqli_query($conexao, $query);
    while ( $produto = mysqli_fetch_assoc($resultado) ) {
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
    return mysqli_fetch_assoc($result);
  }

  function alteraProduto($conexao, produto $produto) {
    $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', categoria_id = {$produto->categoria_id}, usado = '{$produto->usado}' where id = '{$produto->id}' ";
    return mysqli_query($conexao, $query);
  }