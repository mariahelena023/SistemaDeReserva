<?php
    ob_start();
    session_start();
    require './DB/conexao.php';

    if(isset($_POST['create_usuario'])){
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
        $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));

        $sql = "INSERT INTO usuario (nome, email, telefone, cpf) VALUES ('$nome', '$email', '$telefone', '$cpf')";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Usuário Criado com Sucesso!';
            header('Location: ./USUARIO/usuario-index.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Erro ao Criar Usuário!';
            header('Location: ./USUARIO/usuario-index.php');
            exit;
        }
    }
    
    ob_end_flush();
?>