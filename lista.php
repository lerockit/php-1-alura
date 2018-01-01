<?php require_once('header.php'); 
      require_once('conecta.php'); 
      require_once('banco-produto.php');
      require_once('class/produto.php');
      require_once('class/categoria.php');

  verificaUsuario();

  $produtos = listaProdutos($conexao);

  alerta();

?>


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
        <td><?=$produto->id?></td>
        <td><?=$produto->nome?></td>
        <td>R$ <?=$produto->preco?></td>
        <td><?=substr($produto->descricao, 0, 40)?></td>
        <td><?=$produto->categoria->nome?></td>
        <td><a href="altera-form.php?id=<?=$produto->id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
        <td>
          <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?= $produto->id ?>">
            <button class="remove-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </form>
        </td>
      </tr>

      <?php endforeach; ?>

    </tbody>

  </table>

</div>

<?php include('footer.php') ?>