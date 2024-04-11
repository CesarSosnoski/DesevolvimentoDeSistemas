<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'sistematarefa';
$bdSenha = 'sistema';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
if (mysqli_connect_errno($conexao)) {
echo "Problemas para conectar no banco. Verifique os dados!";
die();
}

function buscar_tarefas($conexao)
{
$sqlBusca = 'SELECT * FROM tarefas';
$resultado = mysqli_query($conexao, $sqlBusca);
$tarefas = array();
while ($tarefa = mysqli_fetch_assoc($resultado)) {
    $tarefas[] = $tarefa;
    }
    return $tarefas;
}
function gravar_tarefa($conexao, $tarefa)
{
$sqlGravar = "
INSERT INTO tarefas
(nome, descricao, prioridade)
VALUES
(
'{$tarefa['nome']}',
'{$tarefa['descricao']}',
{$tarefa['prioridade']}
)
";
mysqli_query($conexao, $sqlGravar);
}
{
    $sqlEditar = "
        UPDATE tarefas SET
            nome = '{$tarefa['nome']}',
            descricao = '{$tarefa['descricao']}',
            prioridade = {$tarefa['prioridade']},
            prazo = '{$tarefa['prazo']}',
            concluida = {$tarefa['concluida']}
        WHERE id = {$tarefa['id']}
    ";


    mysqli_query($conexao, $sqlEditar);
}


function remover_tarefa($conexao, $id)
{
    $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";


    mysqli_query($conexao, $sqlRemover);
}
