<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container mt-4">
        <?php include('../ACOES/mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Reservas
                            <a href="reserva-create.php" class="btn btn-primary float-end">Fazer Reserva</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID de Usuário</th>
                                    <th>ID do Espaço</th>
                                    <th>Data de Início</th>
                                    <th>Data de Fim</th>
                                    <th>Horário de Início</th>
                                    <th>Horário de Fim</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM reserva";
                                    $reservas = mysqli_query($conexao, $sql);
                                    if(mysqli_num_rows($reservas) > 0){
                                        foreach($reservas as $reserva){
                                ?>
                                <tr>
                                    <td><?= $reserva['id_reserva'] ?></td>
                                    <td><?= $reserva['usuario_id'] ?></td>
                                    <td><?= $reserva['espaco_id'] ?></td>
                                    <td><?= $reserva['data_inicio'] ?></td>
                                    <td><?= $reserva['data_fim'] ?></td>
                                    <td><?= $reserva['hora_inicio'] ?></td>
                                    <td><?= $reserva['hora_fim'] ?></td>
                                    <td>
                                        <a href="reserva-view.php?id_reserva=<?= $reserva['id_reserva'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                        <a href="reserva-edit.php?id_reserva=<?= $reserva['id_reserva'] ?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="../ACOES/acoes.php" type="submit" method="POST" class="d-inline">
                                            <button onclick = "return confirm('Tem Certeza que Deseja Excluir?')" type="submit" name="delete_reserva" value="<?= $reserva['id_reserva'] ?>" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else{
                                        echo '<h5>Nenhuma Reserva Encontrado!</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <a href="../index.php" class="btn btn-danger float-start">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>