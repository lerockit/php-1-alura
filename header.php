<?php include 'logica-usuario.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Loja Alura</title>

    <!-- Meta-Tags -->
    <meta charset="utf-8">

    <!-- Imports -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,400i,500,500i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    


    <!-- Styles -->
    <link rel="stylesheet" href="css/styles.css">
    
  </head>
  <body>

    <!-- Header -->

    <header class="header">
      <div class="container">
        
        <div class="logo">
          <h1>
            <a href="index.php"><img src="img/logo.png" alt="Alura Loja"></a>
          </h1>
        </div>

        <nav class="menu-nav">
          
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="formulario.php">Adicionar Produto</a></li>
            <li><a href="lista.php">Produtos</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Sobre</a></li>
          </ul>

        </nav>

      </div>      
    </header>
    <?php if (usuarioEstaLogado()): ?>
      <div class="user">

        <ul>
          <li>Olá <?=substr(usuarioLogado(), 0, 10)?></li>  
          <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
        </ul>

      </div>  
    <?php endif ?>