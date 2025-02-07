<?php
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserva - Criar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Reserva
                            <a href="./reserva-index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="../ACOES/acoes.php" method="POST">
                            <div class="mb-3">
                                <label>ID do Usuário</label>
                                <input type="text" name="id_usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>ID do Espaço</label>
                                <input type="text" name="id_espaco" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de Início</label>
                                <input type="date" name="data_inicio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de Fim</label>
                                <input type="date" name="data_fim" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Horário de Início</label>
                                <input type="time" name="hora_inicio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Horário de Fim</label>
                                <input type="time" name="hora_fim" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create_reserva" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <?php include('../ACOES/mensagem.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Espaços</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Capacidade</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM espaco";
                                    $espacos = mysqli_query($conexao, $sql);
                                    if(mysqli_num_rows($espacos) > 0){
                                        foreach($espacos as $espaco){
                                            $sql_reserva = "SELECT * FROM reserva WHERE espaco_id = '".$espaco['id_espaco']."'";
                                            $reservas = mysqli_query($conexao, $sql_reserva);
                                            $status_reserva = (mysqli_num_rows($reservas) > 0) ? 'Reservado' : 'Livre';
                                    ?>
                                        <tr>
                                            <td><?= $espaco['id_espaco'] ?></td>
                                            <td><?= $espaco['nome_espaco'] ?></td>
                                            <td><?= $espaco['tipo'] ?></td>
                                            <td><?= $espaco['capacidade'] ?></td>
                                            <td><?= $espaco['descricao'] ?></td>
                                            <td>
                                                <span class="badge <?= ($status_reserva == 'Reservado') ? 'bg-danger' : 'bg-success' ?>">
                                                    <?= $status_reserva ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<h5>Nenhum Espaço Encontrado!</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row-md-6 mt-5">
                <?php include('../ACOES/mensagem.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Usuários</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>CPF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM usuario";
                                    $usuarios = mysqli_query($conexao, $sql);
                                    if(mysqli_num_rows($usuarios) > 0){
                                        foreach($usuarios as $usuario){
                                ?>
                                <tr>
                                    <td><?= $usuario['id_usuario'] ?></td>
                                    <td><?= $usuario['nome_usuario'] ?></td>
                                    <td><?= $usuario['email'] ?></td>
                                    <td><?= $usuario['telefone'] ?></td>
                                    <td><?= $usuario['cpf'] ?></td>
                                </tr>
                                <?php
                                        }
                                    } else {
                                        echo '<h5>Nenhum Usuário Encontrado!</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>