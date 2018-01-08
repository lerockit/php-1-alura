<?php 
  
  require_once('header.php');

  verificaUsuario();

  $categoria = new Categoria();
  $categoriaDao = new CategoriaDao($conexao);
  $produto = new Produto('', '', '', $categoria, 0);
  
  $categorias = $categoriaDao->listaCategorias();
  $produto->setCategoria($categoria);
  $checked = '';
  
  alerta(); 
  
?>

  <div class="form">
    <div class="container">
      
    <form action="adiciona-produto.php" method="post">
      <div class="form-wrapper">

        <?php require_once('base-form.php') ?>

      </div>          
    </form>

    </div>
  </div>

<?php require_once('footer.php') ?>