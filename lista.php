<?php 
  require_once('header.php'); 

  verificaUsuario();

  $produtoDao = new ProdutoDao($conexao);

  $produtos = $produtoDao->listaProdutos();
  $desconto = 0.2;

  alerta();

?>


<div class="table-container">
  
  <table class="table table-striped table-bordered">
    
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Preço com Desconto de <?= $desconto*100?>%</th>
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
        <td><?=$produto->getId()?></td>
        <td><?=$produto->getNome()?></td>
        <td>R$ <?=$produto->getPreco()?></td>
        <td>R$ <?=$produto->precoComDesconto($desconto)?></td>
        <td><?=substr($produto->getDescricao(), 0, 40)?></td>
        <td><?=$produto->getCategoria()->getNome()?></td>
        <td><a href="altera-form.php?id=<?=$produto->getId()?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
        <td>
          <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?= $produto->getId() ?>">
            <button class="remove-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </form>
        </td>
      </tr>

      <?php endforeach; ?>

    </tbody>

  </table>

</div>

<?php require_once('footer.php') ?>