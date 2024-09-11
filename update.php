<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Atualizar informações</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
    include('header.php');

    ?>

    <main>
        <h2>Preencha seus dados:</h2>
        <form action="atualizar.php" method="POST">
            <div class="campo">
                <label>Nome:</label>
                <?php echo "<input type=\"text\" name=\"nome\" value=\"$nome\">"; ?>
            </div>
            <div class="campo">
                <label>Email:</label>
                <?php echo "<input type=\"text\" name=\"email\" value=\"$email\">"; ?>
            </div>
            <div class="campo">
                <label>Telefone:</label>
                <?php echo "<input type=\"text\" name=\"telefone\" value=\"$telefone\">"; ?>
            </div>
            <div class="campo">
                <label>Senha:</label>
                <?php echo "<input type=\"password\" name=\"senha\" max=\"16\" min=\"4\" placeholder=\"Digite a mesma senha caso não queira alterar\">";?>
            </div>
            <div class="botoes">
                <button type="submit">Enviar</button>
                <button type="reset">Limpar</button>
            </div>
        </form>
    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>