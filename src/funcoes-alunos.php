<?php 
require_once "conecta.php";

function lerAlunos(PDO $conexao):array{
    $sql = "SELECT * FROM alunos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); 
    } catch (Exception $erro) {
        die("Erro ao carregar alunos: ".$erro->getMessage());
    }
    return $resultado;
}

function inserirAluno(PDO $conexao, string $nome, float $primeira, float $segunda):void {
    $sql = "INSERT INTO alunos(nome, primeira, segunda) VALUE (:nome, :primeira, :segunda)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue("primeira", $primeira, PDO::PARAM_STR);
        $consulta->bindValue("segunda", $segunda, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}