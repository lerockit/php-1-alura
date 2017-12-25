<?php include('conecta.php'); 
      include('banco-produto.php');

  $nome = $_POST['produto'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $categoria_id = $_POST['categoria_id'];

  if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id)) {
    header("Location: formulario.php?add=true");
  } else {
    header("Location: formulario.php?add=false");
  }

?>
    
