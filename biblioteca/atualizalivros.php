<?php

// conexao
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

echo $_GET['titulo'];
echo "<br>";
echo $_GET['idioma'];
echo "<br>";
echo $_GET['quantidade'];
echo "<br>";
echo $_GET['editora'];
echo "<br>";
echo $_GET['data'];
echo "<br>";
echo $_GET['isbn'];

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "UPDATE `livro` SET `titulo` = :tit, `idioma` = :idi, `quantidade` = :qtd, `editora` = :edi, `data` = :dat, `isbn` = :isb, `id` = :id WHERE `livro`.`id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('tit' => $_GET['titulo'], 'idi' => $_GET['idioma'], 'qtd' => $_GET['quantidade'], 'edi' => $_GET['editora'], 'dat' => $_GET['data'], 'isb' => $_GET['isbn'], 'id' => $_GET['id']));

    if ($resultado) {
        echo "<br>Comando executado!";
    } else {
        echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
