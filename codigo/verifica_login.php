<?php
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from dono WHERE email = ?";
$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "s", $email);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
$quantidade = mysqli_num_rows($resultado);

if ($quantidade == 1) {
    $linha = mysqli_fetch_array($resultado);
    $senha_banco = $linha['senha'];

    if (password_verify($senha, $senha_banco)) {
        $email = $linha['email'];
        $iddono = $linha['iddono'];
        $foto = $linha['foto_dono'];
        $nome_dono = $linha['nome_dono'];

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nome_dono'] = $nome_dono;
        $_SESSION['iddono'] = $iddono;
        $_SESSION['foto'] = $foto;

        header("Location: home.php");
    } else {
        header("Location: index.php?erro=login&email=$email");
    }
} else {
    header("Location: index.php?erro=login&email=$email");
}