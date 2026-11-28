<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pet_chop.css">
    <title>Document</title>
</head>
<body>
    <form class="formulario" action="save_especies.php" method="post">
        <label for="especie">Espécie:</label>
        <input type="text" name="especie" id="especie" required>
        <br>
        <label for="porte">Porte:</label>
        <input type="text" name="porte" id="porte" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>