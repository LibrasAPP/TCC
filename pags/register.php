<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/register.css">
    <title>Faça registro!</title>
</head>
<body>
    <main>
        <div id="top">
            <h1>Registro</h1>
        </div>
        <form method="post" action="register.php">
            <div id="center">
                <?php include('errors.php'); ?>
                <!-- <div id="error">
                    <p>Username or password incorrect</p>
                </div> -->
                <div id="labels">
                    <input class="input-grout" placeholder="Nome de usuário" type="text" name="username" value="<?php echo $username; ?>">
                    <input class="input-grout" placeholder="E-mail" type="email" name="email" value="<?php echo $email; ?>">
                    <input class="input-grout" placeholder="Senha" type="password" name="password_1">
                    <input class="input-grout" placeholder="Confirme sua senha" type="password" name="password_2">
                    <div id="login">
                        <p>Já possui uma conta? <a href="login.php">Faça login!</a></p>
                    </div>
                </div>
            </div>
            <div id="botton">
                <button type="submit" id="register" name="reg_user">Registrar</button>
            </div>
        </form>
    </main>
</body>
</html>