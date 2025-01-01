<?php 
session_start();
require "conexao.php";

if(isset($_POST['create-task'])){
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $horario = mysqli_real_escape_string($conexao, trim($_POST['horario']));
    if (empty($descricao) || empty($horario)){
        $_SESSION['mensagem'] = "Favor preencher todos os campos!";
        header('Location: index.php');
        exit;
    }

    $sql = "INSERT INTO rotina SET descricao = '$descricao', horario = '$horario'";
    mysqli_query($conexao, $sql);
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Tarefa criada com sucesso!';
    } else{
        $_SESSION['mensagem'] = 'Erro ao criar tarefa';
    }

    header("Location: index.php");
    exit;
}

if(isset($_POST['delete-task'])){
    $tarefa_id = mysqli_real_escape_string($conexao, $_POST['delete-task']);

    $sql = "DELETE FROM rotina WHERE id = '$tarefa_id'";
    mysqli_query($conexao, $sql);
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Tarefa excluída com sucesso!';
        header('Location: index.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'Erro ao excluir tarefa';
        header('Location: index.php');
        exit;
    }
}

if(isset($_POST['edit-task'])){
    $tarefa_id = mysqli_real_escape_string($conexao, $_POST['tarefa_id']);
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $horario = mysqli_real_escape_string($conexao, trim($_POST['horario']));

    $sql = "UPDATE rotina SET descricao = '$descricao', horario = '$horario' WHERE id = '$tarefa_id'";
    mysqli_query($conexao, $sql);
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Tarefa editada com sucesso!';
        header('Location: index.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'Erro ao editar tarefa';
        header('Location: index.php');
        exit;
    }
}
?>