<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('header.php')

    ?>

    <main>
        <h2>Preencha seus dados:</h2>
        <form action="cadastrar.php" method="POST">
            <div class="campo">
                <label>Nome:</label>
                <input type="text" name="nome">
            </div>
            <div class="campo">
                <label>Email:</label>
                <input type="email" name="email">
            </div>
            <div class="campo">
                <label>Telefone:</label>
                <input type="tel" name="telefone" placeholder="(xx)xxxxx-xxxx">
            </div>
            <div class="campo">
                <label>Senha:</label>
                <input type="password" name="senha" max="16" min="4" placeholder="Digite uma senha com no mínimo 4 caracteres">
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