<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Entre na sua conta!</title>
</head>
<body>
    <main>
        <div id="top">
            <h1>Entrar</h1>
        </div>
        <form method="post" action="login.php">
            <div id="center">
                <?php include('errors.php'); ?>
                <!-- <div id="error">
                    <p>Username or password incorrect</p>
                </div> -->
                <div id="login-password">
                    <input class="input-grout" type="text" name="username" placeholder="Nome de Usuário">
                    <input class="input-grout" type="password" name="password" placeholder="Senha">
                </div>
                <div id="registro">
                    <p>Ainda não tem registro? <a href="register.php">Registre-se!</a></p>
                </div>
            </div>
            <div id="botton">
                <div id="back">
                    <div><a href="#">Voltar</a></div>
                </div>
                <div id="enter">
                    <button type="submit" name="login_user">Entrar</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>