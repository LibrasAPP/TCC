<?php

    session_start();

    include('conexao.php');

  /*  if(isset($_POST['email']) || isset($_POST['senha'])) {
        if(strlen($_POST['email'])== 0){
            echo "Preencha seu e-mail!";
        }elseif(strlen($_POST['senha'])== 0){
            echo "Preencha sua senha!";
        }else{*/
            if(isset($_POST['email']) && isset($_POST['senha'])) {    
                $email =$_POST['email'];
                $senha =$_POST['senha'];
            
        
                $sql_code = "SELECT * FROM perfil WHERE email = '".$email."' AND senha ='".$senha."'";
                $sql_query = $mysqli->query($sql_code) or die('Falha na execução do código SQL'.$mysqli->error);

                $quantidade=$sql_query->num_rows;

                if($quantidade> 0){
                    $usuario = $sql_query->fetch_assoc();

                    

                    $_SESSION['id'] = $usuario['id'];
                // $_SESSION['nome'] = $usuario['nome'];
                header("Location: logado.html");
                }else{
                    echo 'Falha ao logar! E-mail ou senha incorretos!';
                }
        
        }

?>

