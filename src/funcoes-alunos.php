<?php 
require_once "conecta.php";

function lerAlunos(PDO $conexao):array{
    $sql = "SELECT *, CAST(((primeira + segunda) /2) AS DEC(4,2)) media FROM alunos ORDER BY nome";

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

function lerUmAluno(PDO $conexao, int $id):array {
    $sql = "SELECT *, CAST(((primeira + segunda) /2) AS DEC(4,2)) media FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }

    return $resultado;
}

function atualizarAluno(PDO $conexao, int $id, string $nome, float $primeira, float $segunda):void {
    $sql = "UPDATE alunos 
    SET nome = :nome, 
    primeira = :primeira, 
    segunda = :segunda 
    WHERE id = :id";
    
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeira", $primeira, PDO::PARAM_STR);
        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }
}

function deletarAluno(PDO $conexao, int $id):void {
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao deletar: ".$erro->getMessage());
    }
}


