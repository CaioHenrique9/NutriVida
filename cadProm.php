<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Cadastrando promoções</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('headerf.php');
    
    ?>

    <main>
        <?php 
        
        include('protect.php');
        include('protectf.php');

        ?>
        <?php 
        include('conexao.php');
        
        $valor = isset($_POST['valor']) ? $_POST['valor'] : null; 
        $produto = isset($_POST['produto']) ? $_POST['produto'] : null;
        $data = date('Y-m-d');
        
        mysqli_query($conexao,"INSERT INTO promocao VALUES (DEFAULT,'$valor','$data','$produto')");
        mysqli_close($conexao);
        header('Location: cadProm.php');
        
        ?>

    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>