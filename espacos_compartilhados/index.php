<?php
session_start();
require './DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espacos Compartilhados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1 class="mb-4">Espaços Compartilhados</h1>
            <div class="d-grid gap-3">
                <a href="./USUARIO/usuario-index.php" class="btn btn-primary btn-lg">Usuários</a>
                <a href="./ESPACO/espaco-index.php" class="btn btn-success btn-lg">Espaços</a>
                <a href="./RESERVA/reserva-index.php" class="btn btn-secondary btn-lg">Reservas</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>