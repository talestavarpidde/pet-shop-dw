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
    <title>Solicitar Serviço de Estética</title>
</head>
<body>
    <form action="form_pedidos.php" method="post">

        Escolha o seu pet: <br>
        <select name="idpaciente">
            <?php
            $sql = "SELECT * FROM paciente WHERE dono_iddono = ?;";
            
            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($comando, "i", $iddono);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);
            
            while ($linha = mysqli_fetch_array($resultado)) {
                $idpaciente = $linha['idpaciente'];
                $nome_paciente = $linha['nome_paciente'];
                echo "<option value='$idpaciente'>$nome_paciente</option>";
            }
            ?>
        </select> <br><br>

        <input type="submit" value="Avançar">
    </form>

    <?php
    if (isset($_POST['idpaciente'])) {
        $idpaciente = $_POST['idpaciente'];

        $sql = "SELECT * FROM servico_estetica";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);
        $servicos = mysqli_stmt_get_result($comando);
    ?>
        <h2>Serviços de Estética Disponíveis</h2>
        <form action="save_pedido.php" method="post">

            <?php
            while ($servico = mysqli_fetch_array($servicos)) {
                $idservico_estetica = $servico['idservico_estetica'];
                $nome_servico = $servico['servicos'];
                $preco = $servico['preco'];
            ?>
                <input type="checkbox" name="servicos[]" value="<?php echo $idservico_estetica; ?>"> 
                <?php echo $nome_servico; ?><br>
            <?php
            }
            }
            ?>
            <br>
            <input type="submit" value="Salvar Serviço Solicitado">
        </form>
</body>
</html>