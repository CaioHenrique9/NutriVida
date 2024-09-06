<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
    include('header.php');

    ?>

    <main>
        <h2>Preencha seus dados:</h2>
        <form action="logar.php" method="POST">
            <div class="campo">
                <select name="tipo_de_usuario" id="">
                    <option value="cliente">Cliente</option>
                    <option value="funcionario">Funcionário</option>
                </select>
            </div>
            <div class="campo">
                <label>Email:</label>
                <input type="email" name="email">
            </div>
            <div class="campo">
                <label>Senha:</label>
                <input type="password" name="senha" max="16" min="4" placeholder="Digite sua senha">
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