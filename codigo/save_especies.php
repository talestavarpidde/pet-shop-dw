<?php
require_once("conexao.php");

$especie = $_POST['especie'];
$porte = $_POST['porte'];
$sql = "INSERT INTO tipo_paciente (especie, porte) VALUES (?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "ss", $especie, $porte);
mysqli_stmt_execute($comando);

header("Location: home.php");
exit;
?>