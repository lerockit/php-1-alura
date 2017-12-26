<?php include('header.php'); 
      include('conecta.php'); 
      include('banco-produto.php');

  verificaUsuario();

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
        <th>Descricao</th>
        <th>Categoria</th>
        <th>Remover</th>
      </tr>
    </thead>

    <tbody>

      <?php
        foreach ($produtos as $produto):
      ?>

      <tr>
        <td><?=$produto['id']?></td>
        <td><?=$produto['nome']?></td>
        <td>R$ <?=$produto['preco']?></td>
        <td><?=substr($produto['descricao'], 0, 40)?></td>
        <td><?=$produto['categoria_nome']?></td>
        <td><a href="altera-form.php?id=<?=$produto['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
        <td>
          <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <button class="remove-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </form>
        </td>
      </tr>

      <?php endforeach; ?>

    </tbody>

  </table>

</div>

<?php include('footer.php') ?>