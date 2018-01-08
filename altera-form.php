<?php 
 
  require_once('header.php');

  verificaUsuario();

  $id = $_GET['id'];

  $produtoDao = new ProdutoDao($conexao);
  $categoriaDao = new CategoriaDao($conexao);

  $produto = $produtoDao->buscaProduto($id);
  $categorias = $categoriaDao->listaCategorias();
  
  if($produto->getUsado() == 1 ) {
    $checked = 'checked';
  } else {
    $checked = '';
  }
  
  alerta(); 
  
?>

<div class="form">
  <div class="container">
    
  <form action="altera-produto.php" method="post">
    <div class="form-wrapper">

      <input type="hidden" name="id" value="<?=$produto->getId()?>">

      <?php require_once('base-form.php') ?>

    </div>          
  </form>

  </div>
</div>

<?php require_once('footer.php') ?>