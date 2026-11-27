<?php
require_once("verifica_sessão.php");
require_once("conexao.php");
$iddono = $_SESSION['iddono'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pet_chop.css">
    <title>Document</title>
</head>
<body>
    O tratamento sera:
    <select name="idpaciente">
    <?php
            
            require_once("conexao.php");
            
            $sql = "SELECT * FROM paciente WHERE dono_iddono = ?;";
            
            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($comando, "s", $iddono);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);
            
            while ($linha = mysqli_fetch_array($resultado)) {
                $idpaciente = $linha['idpaciente'];
                $nome_paciente = $linha['nome_paciente'];
                echo "<option value='$idpaciente'>$nome_paciente</option>";
            }
    ?>
    </select>

    <?php
    if (isset($_POST['turma'])) {
        $idtrabalho = $_SESSION['idtrabalho'];
        $idturma = $_POST['turma'];

        $sql = "SELECT * FROM tb_aluno WHERE idturma = ?";
        // require_once "conexao.php";
        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($comando, "i", $idturma);
        mysqli_stmt_execute($comando);
        $alunos = mysqli_stmt_get_result($comando);

    ?>
        <h2>Lista de Alunos</h2>
        <form action="" method="post">

            <?php
            while ($aluno = mysqli_fetch_array($alunos)) {
                $id_aluno = $aluno['idaluno'];
                $nome_aluno = $aluno['nome'];
            ?>
                <input type="checkbox" name="alunos[]" value="<?php echo $id_aluno; ?>"> <?php echo $nome_aluno; ?> <br>
        <?php
            }
        }
        ?>
        <br>
        <input type="submit" value="Salvar Grupo">
        </form>
</body>
</html>
