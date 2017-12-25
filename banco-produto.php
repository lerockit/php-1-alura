<?php

  function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id})";
    $result = mysqli_query($conexao, $query);

    return $result;
  };

  function listaProdutos($conexao) {
    $produtos = array();
    $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id";
    $resultado = mysqli_query($conexao, $query);
    while ( $produto = mysqli_fetch_assoc($resultado) ) {
      array_push($produtos, $produto);
    }
    return $produtos;
  };

  function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
  };