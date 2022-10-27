<?php

    session_start();
    include('conexao.php');
    $_SESSION['logado'] = false;

  /*  if(isset($_POST['email']) || isset($_POST['senha'])) {
        if(strlen($_POST['email'])== 0){
            echo "Preencha seu e-mail!";
        }elseif(strlen($_POST['senha'])== 0){
            echo "Preencha sua senha!";
        }else{*/
            if(isset($_POST['email']) && isset($_POST['senha'])) {    
                $email =$_POST['email'];
                $senha =$_POST['senha'];
            
        
                $sql_code = "SELECT * FROM usuarios WHERE Emailusuario = '".$email."' AND senha ='".$senha."'";
                $sql_query = $mysqli->query($sql_code) or die('Falha na execução do código SQL'.$mysqli->error);

                $quantidade=$sql_query->num_rows;

                if($quantidade> 0){
                    $usuario = $sql_query->fetch_assoc();

                    

                    $_SESSION['idusuario'] = $usuario['idusuario'];
                    $_SESSION['logado'] = true;
                    $_SESSION['email'] = $email;
                // $_SESSION['nome'] = $usuario['nome'];
                header("Location:logado.php");
                }else{
                    echo 'Falha ao logar! E-mail ou senha incorretos!';
                    session_destroy();
                }
        
        }

?>

