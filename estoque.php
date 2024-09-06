<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
    include('header.php');
    
    ?>

    <main>
        <?php 
        
        include('conexao.php');
        
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];

        mysqli_query($conexao,"UPDATE produto SET pro_quantidade = pro_quantidade + $quantidade WHERE pro_id = $produto");

        header('Location: gprodutos.php')
        ?>
    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>