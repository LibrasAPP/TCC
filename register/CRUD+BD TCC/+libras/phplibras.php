
<?php

	//Recuperando valor das variaveis do formulario
	$nome = $_POST["nome"];
	$idade = $_POST["idade"];
	$acao = $_POST["acao"];
	$senha = $_POST["senha"];
	$email = $_POST["email"];
	
	//Abrindo a conexao com o banco de dados
	$con = new mysqli("127.0.0.1:3306", "root", "", "bdlibras");
	// 127.0.0:3306 endereço banco de dados porta padrão 
	// root é o administrador do bd e "" não requer senha
	// dblibras é o nome do banco de dados
	session_start(); //inicia a sessao
	
	if($acao == "c"){ //se a acao for para inserir (cadastrar)
		$sql = "insert into perfil (nome, idade, senha, email) values ('$nome','$idade','$senha','$email')"; //SQL utilizado para consulta
		$res = $con->query($sql); //Excecuta o comando no banco de dados e armazena a resposta em $res
		$_SESSION["aviso"] = "O cadastro foi efetuado com sucesso"; //salva um aviso para ser impresso na pagina inicial e...
		header("location: ".$_SERVER['HTTP_REFERER']); //redireciona de volta para a pagina inicial
	}
	if($acao == "r"){ //se a acao for para recuperar/ler dados
		$sql = "select * from perfil where nome='$nome'"; //SQL utilizado para a consulta
		$res = $con->query($sql); //Excecuta o comando no banco de dados e armazena a resposta em $res
		if(mysqli_num_rows($res) > 0){ //checa se foram encontrados resultados
			echo("<table>");
			echo("<tr><th>idprod</th><th>nome</th><th>imagem</th><th>idade</th></tr>"); //cabecalho da tabela
			while($campo = $res->fetch_assoc()){ //para cada linha de resultado recuperada da consulta monta uma linha em <table>
				echo("<tr>");
				echo("<td>".$campo["idprod"]."</td>"); //seleciona o valor no campo 'idprod' para a execucao do laco atual do while
				echo("<td>".$campo["nome"]."</td>"); //seleciona o valor no campo 'nome' para a execucao do laco atual do while
				echo("<td>".$campo["idade"]."</td>");
				echo("<td>".$campo["email"]."</td>"); //seleciona o valor no campo 'email' para a execucao do laco atual do while
				echo("<td>".$campo["senha"]."</td>"); //seleciona o valor no campo 'senha' para a execucao do laco atual do while
				echo("</tr>");
			}
			echo("</table>"); //finaliza a tabela
		}
		else{
			echo "nenhum resultado encontrado buscando por: $nome";
		}
		
		echo("<br><br><a href='".$_SERVER['HTTP_REFERER']."'>Voltar a pagina inicial</a>"); //cria um link para voltar a pagina inicial
	}
	if($acao == "u"){ //se a acao for atualizar dados
		$sql = "update perfil set email='$email' where nome='$nome'"; //SQL para a consulta
		$sql2 = "update perfil set idade='$idade' where nome='$nome'"; //SQL para a consulta
		$sql3 = "update perfil set senha='$senha' where nome='$nome'"; //SQL para a consulta
		$res = $con->query($sql); //executa a consulta
		$res = $con->query($sql2); //executa a consulta
		$_SESSION["aviso"] = "O item foi alterado com sucesso"; //salva um aviso para ser impresso na pagina inicial e...
		header("location: ".$_SERVER['HTTP_REFERER']); //Redireciona para a pagina inicial
	}
	if($acao == "d"){ //se a acao for deletar dados
		$sql = "delete from perfil where nome='$nome'"; //SQL para a consulta
		$res = $con->query($sql); //executa a consulta
		$_SESSION["aviso"] = "Foi deletado um total de ".$con->affected_rows." itens"; //salva um aviso para ser impresso na pagina inicial e...
		header("location: ".$_SERVER['HTTP_REFERER']); //Redireciona para a pagina inicial
	}
	
	$con->close(); //fecha a conexao com o banco

?>