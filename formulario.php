<?php include('header.php');
  
  if(array_key_exists("add", $_GET) && $_GET['add'] == 'true'){

?>

    <div class="main">
        <p class="sucess">Produto adicionado com sucesso!</p>
    </div>

<?php } 

  if(array_key_exists("add", $_GET) && $_GET['add'] == 'false') { ?>

    <div class="main">
        <p class="error">O produto não foi adicionado!</p>
    </div>

<?php  } ?>

    <div class="form">
      <div class="container">
        
      <form action="adiciona-produto.php">
        <div class="form-wrapper">

          <div class="form-field">
            <label for="produto">Produto:</label>
            <input type="text" name="produto">
          </div>

          <div class="form-field">
            <label for="preco">Preço:</label>
            <input type="number" name="preco">
          </div>

          <div class="form-field">
            <input type="submit" value="Enviar">
          </div>

        </div>          
      </form>

      </div>
    </div>

<?php include('footer.php') ?>