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
    $banco = 'biblioteca';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $id = $_GET['id'];
    $comandoSQL = "SELECT `titulo`, `idioma`, `quantidade`, `editora`, `data`, `isbn` FROM `livro` WHERE `id` = $id";
    // echo $comandoSQL;
    $comando = $conexao->prepare($comandoSQL);
    $resultado = $comando->execute();

    if ($resultado) {
        if ($linha = $comando->fetch()) {
    ?>
            <form action="atualizalivros.php">
                <label for="titulo">Titulo:</label>
                <?php echo "<input type='text' name='titulo' value='{$linha['titulo']}'><br>"; ?>

                <label for="idioma">Idioma:</label>
                <?php echo "<input type='text' name='idioma' value='{$linha['idioma']}'><br>"; ?>

                <label for="quantidade">Quantidade:</label>
                <?php echo "<input type='number' name='quantidade' value='{$linha['quantidade']}'><br>"; ?>

                <label for="editora">Editora:</label>
                <?php echo "<input type='text' name='editora' value='{$linha['editora']}'><br>"; ?>

                <label for="data">Data:</label>
                <?php echo "<input type='date' name='data' value='{$linha['data']}'><br>"; ?>

                <label for="isbn">ISBN:</label>
                <?php echo "<input type='text' name='isbn' value='{$linha['isbn']}'><br>"; ?>

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