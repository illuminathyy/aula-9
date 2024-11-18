<?php

$servidor = 'localhost';
$banco = 'times';
$usuario = 'root';
$senha = '';

echo $_GET['nome'];
echo "<br>";
echo $_GET['pontos'];

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "UPDATE `quetimeteu` SET `nome` = :nm, `pontos` = :pts, `id` = :id WHERE `quetimeteu`.`id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'pts' => $_GET['pontos'], 'id' => $_GET['id']));

    if ($resultado) {
        echo "<br>Comando executado!";
    } else {
        echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
