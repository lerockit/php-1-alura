<?php require_once('header.php');
      require_once('conecta.php');
      require_once('banco-categoria.php');
      require_once('banco-produto.php');
      require_once('class/produto.php');
      require_once('class/categoria.php');

  verificaUsuario();

  $id = $_GET['id'];
  $produto = buscaProduto($conexao, $id);
  $categorias = listaCategorias($conexao);
  if($produto->usado == 1 ) {
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

          <input type="hidden" name="id" value="<?=$produto->id?>">

          <?php require_once('base-form.php') ?>

        </div>          
      </form>

      </div>
    </div>

<?php include('footer.php') ?>