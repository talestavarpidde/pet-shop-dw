<?php
require_once("conexao.php");
require_once("verifica_sessão.php");

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$data_nascimento = $_POST['data_nascimento'];
$tipo_paciente = $_POST['raca'];
$iddono = $_SESSION['iddono'];
 
    // SEPARA O NOME DO ARQUIVO 
    $nome_arquivo = $_FILES['foto_paciente']['name'];

    // CRIA UM CAMINHO TEMPORARIO
    $caminho_temporario = $_FILES['foto_paciente']['tmp_name'];

    // SEPARA A EXTENSAO DO NOME DO ARQUIVO
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    // CRIA O NOVO NOME COM A FUNÇÃO DE CRIAR NOME ALEATORIO
    $novo_nome = $nome . uniqid() . "." . $extensao;

    // MOSTRA O CAMINHO DE DESTINO
    $caminho_destino = "fotos_pacientes/" . $novo_nome;

    // MOVE PRO CAMINHO DE DESTINO
    move_uploaded_file($caminho_temporario, $caminho_destino);

    $sql = "INSERT INTO paciente (foto_paciente, nome_paciente, sexo, data_nascimento_paciente, tipo_paciente_idtipo_paciente, dono_iddono) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, "ssssii", $caminho_destino, $nome, $sexo, $data_nascimento, $tipo_paciente, $iddono);
    mysqli_stmt_execute($comando);
    header("Location: index.php");