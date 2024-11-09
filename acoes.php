<?php
session_start();
require_once('conexao.php');

if (isset($_POST['criar_tarefa'])) {
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtDescricao']);
    $dataLimite = trim($_POST['txtDataLimite']);
    $status = 0;
  
    $sql = "INSERT INTO todolist (nome, descricao, status, data_limite) VALUES('$nome', '$descricao', '$status', '$dataLimite')";

    mysqli_query($conn, $sql);
  
    header('Location: index.php');
    exit();
}

if (isset($_POST['editar_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['tarefa_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $dataLimite = mysqli_real_escape_string($conn, $_POST['txtDataLimite']);

    $sql = "UPDATE todolist SET nome = '{$nome}', descricao = '{$descricao}', data_limite = '{$dataLimite}'";

    $sql .= " WHERE id = '{$tarefaId}'";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}

if (isset($_POST['executar_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['executar_tarefa']);
    $status = 1;

    $sql = "UPDATE todolist SET status = '{$status}' WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);
  
    header('Location: index.php');
    exit;
}

if (isset($_POST['finalizar_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['finalizar_tarefa']);
    $status = 2;

    $sql = "UPDATE todolist SET status = '{$status}' WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit;
}

if (isset($_POST['excluir_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['excluir_tarefa']);
    $sql = "DELETE FROM todolist WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit;
}