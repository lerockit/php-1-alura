<?php require_once('header.php');
      require_once('conecta.php');
      require_once('banco-categoria.php');
      require_once('class/produto.php');
      require_once('class/categoria.php');

  verificaUsuario();

  $categorias = listaCategorias($conexao);
  $produto = new produto();
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