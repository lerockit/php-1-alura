<?php 

    require_once 'logica-usuario.php';

    logout();

    $_SESSION['sucess'] = "Logout executado com sucesso!";
    header('Location: index.php');
    
    die();