<?php
require_once("verifica_sessao.php");
require_once("conexao.php");

// Verifica se o pet e pelo menos um serviço foram enviados
if (isset($_POST['idpaciente']) && isset($_POST['servicos'])) {
    $idpaciente = $_POST['idpaciente'];
    $servicos = $_POST['servicos']; 

    foreach ($servicos as $idservico_estetica) {
        $sql = "INSERT INTO servico_solicitado (idpaciente, idservico_estetica) VALUES (?, ?)";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, "ii", $idpaciente, $idservico_estetica);
        mysqli_stmt_execute($comando);
    }

    // Redireciona de volta ou para uma tela de confirmação/listagem
    header("Location: home.php");

}