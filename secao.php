<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Cadastrando Seção</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
    include('headerf.php');
    include('functions.php')
    
    ?>

    <main>
        <?php 
        
        include('protect.php');
        include('protectf.php');

        ?>
        
        <?php 
        
        include('conexao.php');

        $nome = $_POST['nome'];
        
        mysqli_query($conexao,"INSERT INTO secao VALUES (DEFAULT,'$nome')");

        mysqli_close($conexao);

        header('Location: gprodutos.php');
        ?>

    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>