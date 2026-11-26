<?php
    $especie = $_POST['especie'];
    $porte = $_POST['porte'];
    $sql = "INSERT INTO tipo_paciente (nome, porte) VALUES (?, ?)";
    
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, "ss", $especie, $porte);
    mysqli_stmt_execute($comando);
?>