<?php
require_once("../conexao.php");
require_once("../session.php");

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$data_nascimento = $_POST['data_nascimento'];
$tipo_paceinte = $_POST['idtipo_paciente'];
$iddono = $_SESSION['iddono'];
$foto = $_POST['foto_paciente'];
 

   $sql = "INSERT INTO paciente (foto_paciente,nome_paciente,sexo,data_nacimento_paciente,tipo_paciente_idtipo_paciente,dono_iddono ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, "ssssii", $nome, $data_nascimento, $cpf, $endereco, $email, $nova_senha, $novo_nome, $telefone);
    mysqli_stmt_execute($comando);

    header("Location: index.php");