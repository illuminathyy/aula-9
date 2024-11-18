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
    $banco = 'times';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $id = $_GET['id'];
    $comandoSQL = "SELECT `nome`, `pontos` FROM `quetimeteu` WHERE `id` = $id";
    $comando = $conexao->prepare($comandoSQL);
    $resultado = $comando->execute();

    if ($resultado) {
        if ($linha = $comando->fetch()) {
    ?>
            <form action="atualizatimes.php">
                <label for="nome">Nome:</label>
                <?php echo "<input type='text' name='nome' value='{$linha['nome']}'><br>"; ?>

                <label for="pontos">Pontos:</label>
                <?php echo "<input type='text' name='pontos' value='{$linha['pontos']}'><br>"; ?>

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