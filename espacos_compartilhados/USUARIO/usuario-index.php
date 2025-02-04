<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
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
                        <h4>Lista de Usuários
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
                        </h4>
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
                                    <th>Ações</th>
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
                                    <td>
                                        <a href="usuario-view.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                        <a href="usuario-edit.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="acoes.php" type="submit" method="POST" class="d-inline">
                                            <button onclick = "return confirm('Tem Certeza que Deseja Excluir?')" type="submit" name="delete_usuario" value="<?= $usuario['id_usuario'] ?>" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else{
                                        echo '<h5>Nenhum Usuário Encontrado!</h5>';
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