<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();
try {

  $sql = <<<SQL
  SELECT cep, rua, bairro, cidade
  FROM enderecotrab8
  SQL;


  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}


class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

while($row = $stmt->fetch()){
  $cepbd = htmlspecialchars($row['cep']);
  $ruabd = htmlspecialchars($row['rua']);
  $bairrobd = htmlspecialchars($row['bairro']);
  $cidadebd = htmlspecialchars($row['cidade']);

  $cep = $_GET['cep'] ?? '';

  if($cep == $cepbd){
    $endereco = new Endereco($ruabd, $bairrobd, $cidadebd);
    break;
  }else
    $endereco = new Endereco('', '', '');
}
header('Content-type: application/json');  
echo json_encode($endereco);