<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Funcionários</title>
    <link rel="stylesheet" href="style.css">
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
        
        <p>Bem-vindo <?php echo strtok($nome," ");?>!</p>
        <p>Se direcione pelos links acima para realizar as tarefas</p>

    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>