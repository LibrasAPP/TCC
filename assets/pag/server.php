<?php
    session_start();
    $username = "";
    $email    = "";
    $errors = array();
    $_SESSION['success'] = "";
    $db = mysqli_connect('localhost', 'root', '', 'registration');
  
    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if (empty($username) or empty($email) or empty($password_1) or empty($password_2)) {
            array_push($errors, "Preencha todos os campos.");
        }
        else {
            if ($password_1 != $password_2) {
                array_push($errors, "As duas senhas não combinam.");
                // Checking if the passwords match
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);
            $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";

            mysqli_query($db, $query);
        
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You have logged in";

            header('location: index.php');
        }
    }

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username) and empty($password)) {
            array_push($errors, "Preencha todos os campos.");
        }
        else {
            if (empty($username)) {
                array_push($errors, "Digite um nome de usuário.");
            }
            if (empty($password)) {
                array_push($errors, "Digite uma senha.");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You have logged in!";

                header('location: index.php');
            }
            else {
                array_push($errors, "Nome de usuário ou senha incorreta.");
            }
        }
    }
?>