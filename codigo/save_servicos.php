<?php
require_once 'conexao.php';
$servicos = $_POST['servicos'];
$preco = $_POST['preco'];

$sql = "INSERT INTO servico_estetica (servicos, preco) VALUES (?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "sd", $servicos, $preco);
mysqli_stmt_execute($comando);

header("Location: home.php");
exit;
?>