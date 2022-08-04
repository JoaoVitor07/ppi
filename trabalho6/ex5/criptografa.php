
<?php

    $email = $senha = "";

    if (isset($_POST["email"]))
        $email = $_POST["email"];
    
    if (isset($_POST["senha"]))
        $email = $_POST["senha"];
    
    $email = htmlspecialchars($email);
    $senha = htmlspecialchars($senha);

    echo "Bem vindo, $nome! <br>";
    echo "Seu e-mail é $email e sua senha é $senha <br>";

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    if (password_verify($senha, $senhaHash)){
        //Senha correta!
        header("Location: ");
        exit();
    } else {
        header("Location: forms.html");
    }

?>
