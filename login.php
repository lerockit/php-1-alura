<?php 

    require_once 'conecta.php'; 
    require_once 'banco-usuario.php';
    require_once 'logica-usuario.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = buscaUsuario($conexao, $email, $senha);

    if ($usuario == null) {
        $_SESSION['error'] = 'Usuario ou senha ivalidos!';    
        header("Location: index.php");
    } else {
        logaUsuario($usuario['email']);
        $_SESSION['sucess'] = 'Login efetuado com sucesso!';
        header("Location: index.php");
    };

    die();
