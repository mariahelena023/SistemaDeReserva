<<<<<<< HEAD:espacos_compartilhados/ACOES/acoes.php
<?php
    session_start();
    require '../DB/conexao.php';

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
    
=======
<?php
    session_start();
    require './DB/conexao.php';

    if(isset($_POST['create_usuario'])){
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome_usuario']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
        $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));

        $sql = "INSERT INTO usuario (nome_usuario, email, telefone, cpf) VALUES ('$nome', '$email', '$telefone', '$cpf')";

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
    
>>>>>>> b3bc3df894ab6cade596db5f3137b1c214b2027a:espacos_compartilhados/USUARIO/acoes.php
?>