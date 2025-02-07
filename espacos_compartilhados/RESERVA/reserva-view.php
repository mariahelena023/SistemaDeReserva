<?php
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservas - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar Reserva
                            <a href="../RESERVA/reserva-index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id_reserva'])){
                                $reserva_id = mysqli_real_escape_string($conexao, $_GET['id_reserva']);
                                $sql = "SELECT * FROM reserva WHERE id_reserva = '$reserva_id'";
                                $query = mysqli_query($conexao, $sql);

                                if(mysqli_num_rows($query) > 0){
                                    $reserva = mysqli_fetch_array($query);
                                    $espaco = mysqli_fetch_array($query);
                        ?>
                        <div class="mb-3">
                            <label>ID de Usuário</label>
                            <p class="form-control">
                                <?=$reserva['usuario_id'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>ID de Espaço</label>
                            <p class="form-control">
                                <?=$reserva['espaco_id'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Data de Início</label>
                            <p class="form-control">
                                <?= date('d/m/Y', strtotime($reserva['data_inicio']));?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Data de Fim</label>
                            <p class="form-control">
                                <?= date('d/m/Y', strtotime($reserva['data_inicio']));?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Hora de Início</label>
                            <p class="form-control">
                                <?= date('H:i', strtotime($reserva['hora_inicio'])) ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Hora de Fim</label>
                            <p class="form-control">
                                <?= date('H:i', strtotime($reserva['hora_inicio'])) ?>
                            </p>
                        </div>
                        
                        <?php
                                }
                            } else{
                                echo "<h5>Espaço Não Encontrado!</h5>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>