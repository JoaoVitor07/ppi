
<?php
    function carregaString($arquivo)
    {
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
    return $string;
    }

    $email = $senha = "";

    if (isset($_POST["email"]))
        $email = $_POST["email"];
    
    if (isset($_POST["senha"]))
        $email = $_POST["senha"];
    
    $email = htmlspecialchars($email);
    $senha = htmlspecialchars($senha);

    echo "Bem vindo, $nome! <br>";
    echo "Seu e-mail é $email e sua senha é $senha <br>";

    $email = $_POST["email"];
    $arqemail = "email.txt";
    carregaString($email, $arqemail);

    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $arqsenha = "senha.txt";
    carregaString($senha, $arqsenha);
    echo "Arquivo Criado";
?>
