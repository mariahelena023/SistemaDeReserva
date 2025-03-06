<?php
    session_start();
    require '../DB/conexao.php';

    //USUARIO
    if(isset($_POST['create_usuario'])){
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome_usuario']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
        $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));

        $sql = "INSERT INTO usuario (nome_usuario, email, telefone, cpf) VALUES ('$nome', '$email', '$telefone', '$cpf')";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Usuário Criado com Sucesso!';
            header('Location: ../USUARIO/usuario-index.php');
        } else{
            $_SESSION['mensagem'] = 'Erro ao Criar Usuário!';
            header('Location: ../USUARIO/usuario-index.php');
            exit;
        }
    }

    if(isset($_POST['update_usuario'])){
        $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome_usuario']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
        $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));


        $sql = "UPDATE usuario SET nome_usuario = '$nome', email = '$email', telefone = '$telefone', cpf = '$cpf' WHERE id_usuario = '$usuario_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Usuário Atualizado com Sucesso!';
            header('Location: ../USUARIO/usuario-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Erro ao Atualizar Usuário!';
            header('Location: ../USUARIO/usuario-index.php');
            exit;
        }
    }

    if(isset($_POST['delete_usuario'])){
        $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
        
        $sql = "DELETE FROM usuario WHERE id_usuario = '$usuario_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Usuário Deletado com Sucesso!';
            header('Location: ../USUARIO/usuario-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Usuário Não Foi Deletado!';
            header('Location: ../USUARIO/usuario-index.php');
            exit;
        }
    }

    //ESPACO
    if(isset($_POST['create_espaco'])){
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome_espaco']));
        $tipo = mysqli_real_escape_string($conexao, trim($_POST['tipo']));
        $capacidade = mysqli_real_escape_string($conexao, trim($_POST['capacidade']));
        $descricao = mysqli_real_escape_string($conexao, trim($_POST['des
        $sql = "INSERT INTO espaco (nome_espaco, tipo, capacidade, descricao) VALUES ('$nome', '$tipo', '$capacidade', '$de
        mysqli_query($conexao, $sql);
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Espaço Criado com Sucesso!';
            header('Location: ../ESPACO/espaco-index.php');
        } else{
            $_SESSION['mensagem'] = 'Erro ao Criar Espaço!';
            header('Location: ../ESPACO/espaco-index.php');
            exit;
        }
    }
    if(isset($_POST['update_espaco'])){
        $espaco_id = mysqli_real_escape_string($conexao, $_POST['espaco_id']);
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome_espaco']));
        $tipo = mysqli_real_escape_string($conexao, trim($_POST['tipo']));
        $capacidade = mysqli_real_escape_string($conexao, trim($_POST['capacidade']));
        $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));


        $sql = "UPDATE espaco SET nome_espaco = '$nome', tipo = '$tipo', capacidade = '$capacidade', descricao = '$descricao' WHERE id_espaco = '$espaco_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Espaço Atualizado com Sucesso!';
            header('Location: ../ESPACO/espaco-index.php');
            exit;
        }else{
            $_SESSION['mensagem'] = 'Erro ao Atualizar Espaço!';
            header('Location: ../ESPACO/espaco-index.php');
            exit;
        }
    }
    
    if(isset($_POST['delete_espaco'])){
        $espaco_id = mysqli_real_escape_string($conexao, $_POST['delete_espaco']);
        
        $sql = "DELETE FROM espaco WHERE id_espaco = '$espaco_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Espaço Deletado com Sucesso!';
            header('Location: ../ESPACO/espaco-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Espaço Não Foi Deletado!';
            header('Location: ../ESPACO/espaco-index.php');
            exit;
        }
    }

    //RESERVA
    if(isset($_POST['create_reserva'])){
        $id_usuario = mysqli_real_escape_string($conexao, trim($_POST['id_usuario']));
        $id_espaco = mysqli_real_escape_string($conexao, trim($_POST['id_espaco']));
        $data_inicio = mysqli_real_escape_string($conexao, trim($_POST['data_inicio']));
        $data_fim = mysqli_real_escape_string($conexao, trim($_POST['data_fim']));
        $hora_inicio = mysqli_real_escape_string($conexao, trim($_POST['hora_inicio']));
        $hora_fim = mysqli_real_escape_string($conexao, trim($_POST['hora_fim']));
    
        $sql_verificacao = "SELECT * FROM reserva 
                            WHERE espaco_id = '$id_espaco' 
                            AND (
                                (data_inicio BETWEEN '$data_inicio' AND '$data_fim') OR
                                (data_fim BETWEEN '$data_inicio' AND '$data_fim') OR
                                (data_inicio <= '$data_inicio' AND data_fim >= '$data_fim') OR
                                (data_inicio >= '$data_inicio' AND data_fim <= '$data_fim')
                            )";
        
        $resultado_verificacao = mysqli_query($conexao, $sql_verificacao);
    
        if (mysqli_num_rows($resultado_verificacao) > 0) {
            $_SESSION['mensagem'] = 'O Espaço Já Está Reservado!';
            header('Location: ../RESERVA/reserva-index.php');
            exit;
        }
    
        $sql = "INSERT INTO reserva (usuario_id, espaco_id, data_inicio, data_fim, hora_inicio, hora_fim) 
                VALUES ('$id_usuario', '$id_espaco', '$data_inicio', '$data_fim', '$hora_inicio', '$hora_fim')";
        
        mysqli_query($conexao, $sql);
    
        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Reserva Realizada com Sucesso!';
            header('Location: ../RESERVA/reserva-index.php');
        } else{
            $_SESSION['mensagem'] = 'Erro ao Realizar Reserva!';
            header('Location: ../RESERVA/reserva-index.php');
            exit;
        }
    }
    

    if(isset($_POST['delete_reserva'])){
        $reserva_id = mysqli_real_escape_string($conexao, $_POST['delete_reserva']);
        
        $sql = "DELETE FROM reserva WHERE id_reserva = '$reserva_id'";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Reserva Cancelada com Sucesso!';
            header('Location: ../RESERVA/reserva-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Reserva Não Foi Cancelada!';
            header('Location: ../RESERVA/reserva-index.php');
            exit;
        }
    }

?>