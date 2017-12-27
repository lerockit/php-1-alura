<?php include('header.php'); ?>

    <?php if (usuarioEstaLogado()) { ?>

      <div class="main">
        <h2>Bem Vindo a Loja a<span>Lura</span></h2>
      </div>

      <?php 
      } alerta();

      if(!usuarioEstaLogado()) { 
        
      ?>

      <div class="login-container">
        <form action="login.php" method="post">
          <div class="form-wrapper">
            
            <div class="form-field">
              <label>E-mail:</label>
              <input type="text" name="email">
            </div>
            
            <div class="form-field">
              <label>Senha:</label>
              <input type="password" name="senha">
            </div>
            
            <div class="form-field">
              <input type="submit">
            </div>

          </div>
        </form>
      </div>
    <?php } ?>  

<?php include('footer.php') ?>


  