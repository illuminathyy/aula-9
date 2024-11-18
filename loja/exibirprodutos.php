<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando dados</title>
</head>

<body>
    <?php
    $servidor = 'localhost';
    $banco = 'loja';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $id = $_GET['id'];
    $comandoSQL = "SELECT `nome`, `descricao`, `preco`, `url` FROM `produto` WHERE `id` = $id";
    $comando = $conexao->prepare($comandoSQL);
    $resultado = $comando->execute();

    if ($resultado) {
        if ($linha = $comando->fetch()) {
    ?>
            <form action="atualizaprodutos.php">
                <label for="nome">nome:</label>
                <?php echo "<input type='text' name='nome' value='{$linha['nome']}'><br>"; ?>

                <label for="descricao">descricao:</label>
                <?php echo "<input type='text' name='descricao' value='{$linha['descricao']}'><br>"; ?>

                <label for="preco">preco:</label>
                <?php echo "<input type='number' name='preco' value='{$linha['preco']}'><br>"; ?>

                <label for="url">url:</label>
                <?php echo "<input type='text' name='url' value='{$linha['url']}'><br>"; ?>

                <?php echo "<input type='hidden' name='id' value=$id>"; ?>

                <input type="submit">
            </form>
    <?php
        }
    } else {
        echo "Erro no comando SQL";
    }
    ?>
</body>

</html>