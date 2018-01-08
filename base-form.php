<div class="form-field">
  <label for="produto">Produto:</label>
  <input type="text" name="produto" value="<?=$produto->getNome()?>">
</div>

<div class="form-field">
  <label for="preco">Preço:</label>
  <input type="number" name="preco" value="<?=$produto->getPreco()?>">
</div>

<div class="form-field">
  <label for="descricao">Descrição:</label>
  <textarea name="descricao"><?=$produto->getDescricao()?></textarea>
</div>

<div class="form-field">
  <label for="categoria_id">Categoria: </label>
  <select name="categoria_id">
    <?php foreach($categorias as $categoria):?>
      <?php 
        if ($categoria->getId() == $produto->getCategoria()->getId()){
          $isCat = 'selected';
        } else {
          $isCat = '';
        } 
      ?>
      <option value="<?=$categoria->getId()?>" <?=$isCat?> ><?=$categoria->getNome()?></option>
    <?php endforeach ?>
  </select>
</div>

<div class="form-field">
  <label for="categoria_id">Usado: </label>
  <input type="checkbox" name="usado" value="true" <?=$checked?>>
</div>

<div class="form-field">
  <input type="submit" value="Enviar!">
</div>

