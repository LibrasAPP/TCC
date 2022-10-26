<?php
session_start();

	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
    echo ('<script>Login realizado com sucesso!</script>');
?>

 <!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-5.2.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
  <title>+Libras</title>
</head>
<body id="logado">
	<nav class="navbar navbar-expand-lg suavenanav">
    <img src="../images/logo-branca-64px.png" alt="Logo do Aplicativo" id="logonav">
    <div class="container-fluid">
		<h1 id="nomesite" class="fontes">+Libras</h1>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li id="inicio" class="nav-item">
            <a class="fontes nav-link" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="fontes nav-link" aria-current="page" href="aulas.html">Aulas</a>
          </li>
          <li class="nav-item">
            <a class="fontes nav-link" aria-current="page" href="dicionario.html">Dicionário</a>
          </li>
        </ul>
      </div>
      <div id="itensdireita">
        <ul class="collapse navbar-collapse" id="navbarSupportedContent">
          <li class="nav-item" type="none">
            <a class="botaoperfil nav-link" aria-current="page" href="perfil.php">Desconectar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <h1 id="titulo">Bem vindo de volta!</h1>
  <main id="pagina">
    <div id="texto">
      <h2>Como vão seus estudos?</h2>
      <p>Você possui aulas para realizar!</p>
    </div>
    <div id="aula">
      <div id="texto2">
        <h3>Aula 3</h3>
        <p>Aprendendo a Conversar</p>
      </div>
      <a id="botao" class="nav-link" aria-current="page" href="aulas.html">Começar a aula!</a>
    </div>
  </main>
</body>
</html>

<?php
	}else{
		echo "não tá funcionando";
    session_destroy();
	}
	
?>