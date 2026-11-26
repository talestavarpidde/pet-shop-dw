<?php
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from usuario WHERE email = ?";
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
        $idusuario = $linha['idusuario'];
        $foto = $linha['foto'];
        $nome = $linha['nome_dono'];

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['idusuario'] = $idusuario;
        $_SESSION['foto'] = $foto;

        header("Location: principal.php");
    } else {
        header("Location: index.php?erro=login&email=$email");
    }
} else {
    header("Location: index.php?erro=login&email=$email");
}