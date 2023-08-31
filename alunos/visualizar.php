<?php
require_once "../src/funcoes-alunos.php"; 

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$listaDeAlunos = lerAlunos($conexao)
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>
    <div class="alunos">
        <?php
        foreach ($listaDeAlunos as $alunos){
        ?>
            <article class="aluno">
                <h3><?=$alunos['nome']?></h3>
                <h4>Notas</h4>
                <p><b>Nota 1: </b><?=$alunos['primeira']?></p>
                <p><b>Nota 2: </b><?=$alunos['segunda']?></p>
                <p><b>Média:</b> Média</p>
                <p><b>Situação:</b> Situação</p>
                <hr>
                <p>
                    <a href="excluir.php">Excluir Aluno</a> | <a href="atualizar.php">Editar Aluno</a>
                </p>
            </article>
        <?php
        }
        ?>
    </div>
    <p><a href="../index.php">Voltar ao início</a></p>
</div>

</body>
</html>