<?php

$servidor = 'localhost';
$banco = 'loja';
$usuario = 'root';
$senha = '';

echo $_GET['nome'];
echo "<br>";
echo $_GET['descricao'];
echo "<br>";
echo $_GET['preco'];
echo "<br>";
echo $_GET['url'];

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "UPDATE `produto` SET `nome` = :nm, `descricao` = :desc, `preco` = :pre, `url` = :url,`id` = :id WHERE `produto`.`id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'desc' => $_GET['descricao'], 'pre' => $_GET['preco'], 'url' => $_GET['url'], 'id' => $_GET['id']));

    if ($resultado) {
        echo "<br>Comando executado!";
    } else {
        echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
