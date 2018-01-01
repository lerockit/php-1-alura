<?php  

  function listaCategorias($conexao) {
    $categorias = array();
    $query = "select * from categorias";
    $result = mysqli_query($conexao, $query);
    while ($categoria_array = mysqli_fetch_assoc($result)) {
      $categoria = new categoria();
      $categoria->id = $categoria_array['id'];
      $categoria->nome = $categoria_array['nome'];
      array_push($categorias, $categoria);
    }
    return $categorias;
  }