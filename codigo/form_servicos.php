<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pet_chop.css">
    <title>Document</title>
</head>
<body>
    <form class="formulario" action="save_servicos.php" method="post">
        Serviço:
        <input type="text" name="servicos" required><br>
        Preço:
        <input type="number" name="preco" step="0.01" min="0" required><br>
        <input type="submit" value="cadastras">
    </form>
</body>
</html>