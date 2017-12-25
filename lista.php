<?php include('header.php'); 
      include('conecta.php'); 
      include('banco-produto.php');

  $produtos = listaProdutos($conexao);

  if(array_key_exists("removed", $_GET) && $_GET['removed'] == 'true') {

?>

<div class="removed-container main">
  
  <p class="sucess">O produto foi removido com sucesso</p>

</div>

<?php } ?>


<div class="table-container">
  
  <table class="table table-striped table-bordered">
    
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Remover</th>
      </tr>
    </thead>

    <tbody>

      <?php
        foreach ($produtos as $produto):
      ?>

      <tr>
        <td><?php echo $produto['id']?></td>
        <td><?php echo $produto['nome']?></td>
        <td>R$ <?php echo $produto['preco']?></td>
        <td><a href="remove-produto.php?id=<?= $produto['id'] ?>" class="remove-button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>

      <?php endforeach ?>

    </tbody>

  </table>

</div>

<?php include('footer.php') ?>