<?php
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espaços - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../ACOES/navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar Espaço
                            <a href="../ESPACO/espaco-index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id_espaco'])){
                                $espaco_id = mysqli_real_escape_string($conexao, $_GET['id_espaco']);
                                $sql = "SELECT * FROM espaco WHERE id_espaco = '$espaco_id'";
                                $query = mysqli_query($conexao, $sql);

                                if(mysqli_num_rows($query) > 0){
                                    $espaco = mysqli_fetch_array($query);
                        ?>
                        <div class="mb-3">
                            <label>Nome</label>
                            <p class="form-control">
                                <?=$espaco['nome_espaco'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Tipo</label>
                            <p class="form-control">
                                <?=$espaco['tipo'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Capacidade</label>
                            <p class="form-control">
                                <?=$espaco['capacidade'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Descrição</label>
                            <p class="form-control">
                                <?=$espaco['descricao'];?>
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