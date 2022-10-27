<?php

session_start();

if(isset($_SESSION['logado']) && $_SESSION['logado']==true){
	session_destroy();
	echo "Log out realizado com sucesso!";
	header('location:index.html'.$_SERVER['HTML_REFERER']);
}else{
	echo "sessão não foi finalizada";
}

?>