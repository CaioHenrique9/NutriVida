<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Cadastro de produtos</title>
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

        move_uploaded_file($_FILES['img1']['tmp_name'],'./imgProds/'. $_FILES['img1']['name']);
        move_uploaded_file($_FILES['img2']['tmp_name'],'./imgProds/'. $_FILES['img2']['name']);
        
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $limitacoes = $_POST['limitacoes'];
        $path1 = './imgProds/'. $_FILES['img1']['name'];
        $path2 = './imgProds/'. $_FILES['img2']['name'];
        $secao = $_POST['secao'];
        
        $query = mysqli_query($conexao,"INSERT INTO produto VALUES (DEFAULT,'$nome','$preco','$quantidade','$limitacoes','$path1','$path2','$secao')");

        header('Location: gprodutos.php')
        
        ?>

    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>