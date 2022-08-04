<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$codigo = $_GET["codigo"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM paciente
  WHERE codigo = ?
  LIMIT 1
  SQL;

  $sql1 = <<<SQL
  DELETE FROM pessoa
  WHERE codigo = ?
  LIMIT 1
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (cpf) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$codigo]);

  $stmt1 = $pdo->prepare($sql1);
  $stmt1->execute([$codigo]);

  header("location: mostra-clientes.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
