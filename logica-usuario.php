<?php 

    session_start();

    function usuarioEstaLogado() 
    {
        return isset($_SESSION['usuario_logado']);
    }

    function usuarioLogado() 
    {
        return $_SESSION['usuario_logado'];
    }

    function verificaUsuario() 
    {
        if(!usuarioEstaLogado()) {
          $_SESSION['error'] = 'Você não tem permissão para executar essa ação, por favor, faça seu Login!';
          header('Location: index.php?falhaDeSeguranca=true');
          die();
        }
    }

    function logaUsuario($email) 
    {
        $_SESSION['usuario_logado'] = $email;
    }

    function logout() 
    {
        session_destroy();
        session_start();
    }

    function alerta() 
    {
        if (isset($_SESSION['sucess'])): 
?>

            <div class="main">
                <p class="sucess"><?=$_SESSION['sucess']?></p>
            </div>

<?php 

        unset($_SESSION['sucess']);
        endif;  
        if (isset($_SESSION['error'])) : 

?>

          <div class="main">
            <p class="error"><?=$_SESSION['error']?></p>
          </div>

<?php 

        unset($_SESSION['error']);
        endif;

    }