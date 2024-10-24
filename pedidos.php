<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Pedidos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('header.php');

    ?>

    <main>
        <?php include('protect.php'); ?>
        <h2>Preencha as informações do pedido:</h2>
        <form action="#" method="POST">
            <div class="campo">
                <label>Endereço:</label>
                <input type="text" name="endereco">
            </div>
            <div class="campo">
                <label>Data de entrega:</label>
                <input type="date" name="dataEntrega">
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