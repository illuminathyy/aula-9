<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando produtos</title>
</head>

<body>
    <?php
    $servidor = 'localhost';
    $banco = 'loja';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $comandoSQL = 'SELECT * FROM `produto`';

    $comando = $conexao->prepare($comandoSQL);
    $resultado = $comando->execute();

    if ($resultado) {
        echo "Mostrando resultado:<br>";
        while ($linha = $comando->fetch()) {

            $id = $linha['id'];

            echo $linha['nome'];
            echo "<br>";
            echo $linha['descricao'];
            echo "<br>";
            echo $linha['preco'];
            echo "<br>";
            echo $linha['url'];
            echo "<br>";
            echo "<a href='atualizaprodutos.php?id=$id'>Atualizar</a><br>";
        }
    } else {
        echo "Erro no comando SQL";
    }
    ?>

</body>

</html>