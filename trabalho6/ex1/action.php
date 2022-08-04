<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Exercicio 1</title>

  <style>
    .col-sm{
        border: 10px solid blue;
    }
    body{
        padding: 20px;
    }
  </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <?php
                    $cep = $_POST["cep"];
                    echo "Cep: $cep";
                ?>
            </div>

            <div class="col-sm">
                <?php
                    $logradouro = $_POST["logradouro"];
                    echo "Logradouro: $logradouro";
                ?>
            </div>

            <div class="col-sm">
                <?php
                    $bairro = $_POST["bairro"];
                    echo "Bairro: $bairro";
                ?>
            </div>

            <div class="col-sm">
                <?php
                    $cidade = $_POST["cidade"];
                    echo "Cidade: $cidade";
                ?>
            </div>

            <div class="col-sm">
                <?php
                    $estado = $_POST["estado"];
                    echo "Estado: $estado";
                ?>
            </div>

        </div>
    </div>
</body>


</html>