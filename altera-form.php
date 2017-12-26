<?php include('header.php');
      include('conecta.php');
      include('banco-categoria.php');
      include('banco-produto.php');

  $id = $_GET['id'];
  $produto = buscaProduto($conexao, $id);
  $categorias = listaCategorias($conexao);
  if($produto['usado'] == 'true') {
    $checked = 'checked';
  } else {
    $checked = '';
  }
  
  if(array_key_exists("alterado", $_GET) && $_GET['alterado'] == 'true'){

?>

    <div class="main">
        <p class="sucess">Produto alterado com sucesso!</p>
    </div>

<?php } 

  if(array_key_exists("alterado", $_GET) && $_GET['alterado'] == 'false') { ?>

    <div class="main">
        <p class="error">O produto não foi alterado!</p>
    </div>

<?php  } ?>

    <div class="form">
      <div class="container">
        
      <form action="altera-produto.php" method="post">
        <div class="form-wrapper">

          <input type="hidden" name="id" value="<?=$produto['id']?>">

          <div class="form-field">
            <label for="produto">Produto:</label>
            <input type="text" name="produto" value="<?=$produto['nome']?>">
          </div>

          <div class="form-field">
            <label for="preco">Preço:</label>
            <input type="number" name="preco" value="<?=$produto['preco']?>">
          </div>

          <div class="form-field">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao"><?=$produto['descricao']?></textarea>
          </div>

          <div class="form-field">
            <label for="categoria_id">Categoria: </label>
            <select name="categoria_id">
              <?php foreach($categorias as $categoria):?>
                <?php 
                  if ($categoria['id'] == $produto['categoria_id']){
                    $isCat = 'selected';
                  } else {
                    $isCat = '';
                  } 
                ?>
                <option value="<?=$categoria['id']?>" <?=$isCat?> ><?=$categoria['nome']?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-field">
            <label for="categoria_id">Usado: </label>
            <input type="checkbox" name="usado" value="true" <?=$checked?>>
          </div>

          <div class="form-field">
            <input type="submit" value="Enviar">
          </div>

        </div>          
      </form>

      </div>
    </div>

<?php include('footer.php') ?>