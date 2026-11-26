<?php
require_once("../conexao.php");
require_once("../session.php");

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$data_nascimento = $_POST['data_nascimento'];
$tipo_paceinte = $_POST['idtipo_paciente'];
$iddono = $_SESSION['iddono'];
$foto = $_POST['foto_paciente'];