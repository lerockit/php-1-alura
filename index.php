<?php include('header.php'); ?>

    <?php if (usuarioEstaLogado()) { ?>

      <div class="main">
        <h2>Bem Vindo a Loja a<span>Lura</span></h2>
      </div>

      <?php if (isset($_GET['login']) && $_GET['login'] == true) { ?>
        <div class="main">
          <p class="sucess">Login Efetuado com sucesso!</p>
        </div>
      <?php } ?>
      
    <?php } else { ?>

      <?php if (isset($_GET['falhaDeSeguranca'])): ?>
        <div class="main">
          <p class="error">Você não tem permissão para esta ação, por favor faça seu Login</p>
        </div>
      <?php endif ?>

      <?php if (isset($_GET['login']) && $_GET['login'] == false){ ?>
        <div class="main">
          <p class="error">Usuario ou senha invalido!</p>
        </div>
      <?php } ?>

      <?php if (isset($_GET['logout'])){ ?>
        <div class="main">
          <p class="sucess">Logout executado com sucesso!</p>
        </div>
      <?php } ?>

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


  