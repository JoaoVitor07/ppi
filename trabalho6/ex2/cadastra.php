<?php
    function salvaString($string, $arquivo)
    {
     $arq = fopen($arquivo, "w");
     fwrite($arq, $string);
     fclose($arq);
    }

    $email = $_POST["email"];
    $arqemail = "email.txt";
    salvaString($email, $arqemail);
    
    $senha =  password_hash($senha, PASSWORD_DEFAULT);
    $arqsenha = "senha.txt"; 
    salvaString($senha, $arqsenha);
    echo "Arquivo Criado";
    

?>