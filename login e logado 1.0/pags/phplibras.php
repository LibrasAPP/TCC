<?php
session_start();

	$nome = $_POST["nome"];
	$acao = $_POST["acao"];
	$senha = $_POST["senha"];
	$email = $_POST["email"];

	$con = new mysqli("127.0.0.1:3306", "root", "", "bdlibras");

	if ($acao == "c") {
		$sql = "insert into usuario(NomeUsuario, Senha, EmailUsuario) values ('$nome','$senha','$email')";
		$res = $con->query($sql);
		$_SESSION['aviso'] = "O cadastro foi realizado com êxito";
		echo '<script> alert("Cadastro realizado com êxito") </script>';
		header("location:index.html".$_SERVER['HTML_REFERER']);
	}	

	if ($acao == "r") {
		$sql = "select * from usuario where Nomeusuario='$nome'";
		$res = $con->query($sql);
		if (mysqli_num_rows($res)>0) {	
			echo ("<table>");
			echo("<tr><th>idprod</th><th>nome</th>");
			while ($campo = $res->fetch_assoc()) {
				echo("<tr>");
				echo("<td>".$campo["idperfil"]."</td>"); //seleciona o valor no campo 'idprod' para a execucao do laco atual do while
				echo("<td>".$campo["nome"]."</td>"); //seleciona o valor no campo 'nome' para a execucao do laco atual do while
				echo("<td>".$campo["email"]."</td>"); //seleciona o valor no campo 'email' para a execucao do laco atual do while
				echo("<td>".$campo["senha"]."</td>"); //seleciona o valor no campo 'senha' para a execucao do laco atual do while
				echo("</tr>");
			}
		echo ("</table>");
		}else{
	echo "Nenhum resultado encontrado buscando por: $nome";

		}
		echo("<br><br><a href='index.html'".$_SERVER['HTML_REFERER']."'>Voltar a pagina inicial</a>"); //cria um link para voltar a pagina inicial

	}

	if ($acao == "u") {
		$sql = "update usuario set EmailUsuario='$email' where nome='nome'"; //SQL para a consulta
		$sql3 = "update usuario set senha='$senha' where nome='nome'"; //SQL para a consulta
		$res = $con->query($sql); //executa a consulta
		$res = $con->query($sql2); //executa a consulta
		$_SESSION["aviso"] = "O item foi alterado com sucesso"; //salva um aviso para ser impresso na pagina inicial e...
		header("location:index.html ".$_SERVER['HTML_REFERER']); //Redireciona para a pagina inicial
	}

	if ($acao == "d") {
			$sql = "delete from usuario where Nomeusuario='nome'";
			$res = $con->query($sql);
			$_SESSION['aviso'] = "Foram deletados ".$con->affected_rows."itens";
			header("location:index.html".$_SERVER['HTML_REFERER']);
		}	
		
	$con->close();

?>
