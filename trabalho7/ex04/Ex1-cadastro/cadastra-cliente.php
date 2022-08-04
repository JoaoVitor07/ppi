<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$codigo = $_POST["codigo"] ?? "";
$email = $_POST["email"] ?? "";
$sexo = $_POST["sexo"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";
$peso = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$tipoSanguineo = $_POST["tipoSanguineo"] ?? "";


try {

  $sql = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  INSERT INTO pessoa (codigo, nome, sexo, email, telefone, 
                       cep, logradouro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

  $sqlpaciente = <<<SQL
    INSERT INTO paciente (peso, altura, tipoSanguineo, codigo)
    VALUES (?, ?, ?, ?)
  SQL;


  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois precisamos
  // cadastrar dados fornecidos pelo usuário 
  $stmt = $pdo->prepare($sql);
  $stmt1 = $pdo->prepare($sqlpaciente);
  $stmt->execute([
    $codigo, $nome, $sexo, $email, $telefone,
    $cep, $logradouro, $cidade, $estado
  ]);
  $stmt1->execute([
    $peso, $altura, $tipoSanguineo, $codigo
  ]);

  header("location: mostra-clientes.php");
  exit();
} 
catch (Exception $e) {  
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
