<?php
$host = 'localhost';
$tarefa = 'root';
$senha = '';
$banco = 'todolist';

$conn = mysqli_connect($host, $tarefa, $senha, $banco) 
or die('Não foi possível conectar');
?>