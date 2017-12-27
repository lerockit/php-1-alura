<?php include 'logica-usuario.php';

  logout();
  $_SESSION['sucess'] = "Logout executado com sucesso!";
  header('Location: index.php');
  die();