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
        <?php 
        if ($alunos['media'] >= 7) {
            $situacao = "Aprovado";
        } elseif ($alunos['media'] >= 5) {
            $situacao = "Recuperação";
        } else {
            $situacao = "Reprovado";
        }
        ?>
                <h2><?=$situacao?></h2>
                <h3><?=$alunos['nome']?></h3>
                <h4>Notas</h4>
                <p><b>Nota 1: </b><?=$alunos['primeira']?></p>
                <p><b>Nota 2: </b><?=$alunos['segunda']?></p>
                <p><b>Média: </b><?=$alunos['media']?></p>
                <hr>
                <p>
                    <a class="excluir" href="excluir.php?id=<?=$alunos['id']?>">Excluir Aluno</a> | <a href="atualizar.php?id=<?=$alunos['id']?>">Editar Aluno</a>
                </p>
            </article>
        <?php
        }
        ?>
    </div>
    <p><a href="../index.php">Voltar ao início</a></p>
</div>
<script src="../js/confirm-exclusao.js"></script>
</body>
</html>