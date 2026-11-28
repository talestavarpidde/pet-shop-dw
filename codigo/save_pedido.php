<?php
require_once("verifica_sessao.php");
require_once("conexao.php");

    $idpaciente = $_POST['idpaciente'];
    $servicos = $_POST['servicos']; 

    // 2. Prepara a query fora do loop para melhor desempenho e segurança
    $sql = "INSERT INTO servico_solicitado (idpaciente, idservico_estetica) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

        // 3. Percorre cada serviço selecionado e executa a inserção
        foreach ($servicos as $idservico_estetica) {
            mysqli_stmt_bind_param($comando, "ii", $idpaciente, $idservico_estetica);
            mysqli_stmt_execute($comando);
        }

        mysqli_stmt_close($comando);
        mysqli_close($conexao);
        header("Location: home.php");

?>