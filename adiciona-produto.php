<?php include('conecta.php'); 
      include('banco-produto.php');

  $nome = $_GET['produto'];
  $preco = $_GET['preco'];

  if(insereProduto($conexao, $nome, $preco)) {
    header("Location: formulario.php?add=true");
  } else {
    header("Location: formulario.php?add=false");
  }

?>
    
