<?php

session\_start();

?>

<!DOCTYPE html>

<html lang="en">



<head>

&#x20;   <meta charset="UTF-8">

&#x20;   <meta name="viewport" content="width=device-width, initial-scale=1.0">

&#x20;   <title>Cadastro de Grupos - Passo 2</title>

</head>



<body>

&#x20;   <form action="form\_grupo\_alunos.php" method="post">

&#x20;       <h1>Cadastro de Grupos - Passo 2</h1>



&#x20;       Escolha uma turma: <br>

&#x20;       <select name="turma">

&#x20;           <?php

&#x20;           require\_once "conexao.php";



&#x20;           $sql = "SELECT \* FROM tb\_turma";



&#x20;           $comando = mysqli\_prepare($conexao, $sql);

&#x20;           mysqli\_stmt\_execute($comando);

&#x20;           $turmas = mysqli\_stmt\_get\_result($comando);



&#x20;           while ($turma = mysqli\_fetch\_array($turmas)) {

&#x20;               $turma\_id = $turma\['idturma'];

&#x20;               $turma\_nome = $turma\['nome'];



&#x20;               echo "<option value='$turma\_id'>$turma\_nome</option>";

&#x20;           }

&#x20;           ?>

&#x20;       </select> <br><br>



&#x20;       <input type="submit" value="Avançar">

&#x20;   </form>





&#x20;   <?php

&#x20;   if (isset($\_POST\['turma'])) {

&#x20;       $idtrabalho = $\_SESSION\['idtrabalho'];

&#x20;       $idturma = $\_POST\['turma'];



&#x20;       $sql = "SELECT \* FROM tb\_aluno WHERE idturma = ?";

&#x20;       // require\_once "conexao.php";

&#x20;       $comando = mysqli\_prepare($conexao, $sql);



&#x20;       mysqli\_stmt\_bind\_param($comando, "i", $idturma);

&#x20;       mysqli\_stmt\_execute($comando);

&#x20;       $alunos = mysqli\_stmt\_get\_result($comando);



&#x20;   ?>

&#x20;       <h2>Lista de Alunos</h2>

&#x20;       <form action="salvar\_grupo.php" method="post">

&#x20;           Nome do grupo: <br>

&#x20;           <input type="text" name="nome\_grupo"> <br><br>



&#x20;           <?php

&#x20;           while ($aluno = mysqli\_fetch\_array($alunos)) {

&#x20;               $id\_aluno = $aluno\['idaluno'];

&#x20;               $nome\_aluno = $aluno\['nome'];

&#x20;           ?>

&#x20;               <input type="checkbox" name="alunos\[]" value="<?php echo $id\_aluno; ?>"> <?php echo $nome\_aluno; ?> <br>

&#x20;       <?php

&#x20;           }

&#x20;       }

&#x20;       ?>

&#x20;       <br>

&#x20;       <input type="submit" value="Salvar Grupo">

&#x20;       </form>

</body>



</html>

