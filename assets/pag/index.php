<?php
    include_once("server.php");
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: login.php'); 
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css"href="style.css">
</head>
<body>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>+Libras</title>
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/index_logado.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="../img/logo-branca/logo-branca-48px.png" alt="logo do +libras">
        </div>
        <nav>
            <ul>
                <a href="#" class="marcado">Inicio</a>
                <a href="modulos.html">Aulas</a>
                <a href="pag/">Dicionário</a>
            </ul>
        </nav>
        <div id="direita">
            <!-- <span id="login"><a href="pag/login.php">Entrar</a></span>
            <span id="registro"><a href="pag/register.php">Registrar</a></span> -->
            <span><a href="" id="perfil">Meu Perfil</a></span>
        </div>
    </header>
    <div id="librasimg">
        <h1>+Libras</h1>
    </div>
    <main>
        <h2>Bem vindo devolta!</h2>
        <div class="paragrafo">
            <p>Olá <strong><?php echo $_SESSION['username']; ?></strong>, como vão seus estudos? Você possui aulas para fazer!</p>
        </div>
        <div id="modulos">
            <a href="modulos.html">Ir para módulos</a>
        </div>
    </main>
    <footer><a href="../index.html">index</a></footer>
</body>
</html>
</body>
</html>