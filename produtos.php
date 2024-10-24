<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Produtos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('header.php');
    include('functions.php');
    
    ?>

        <section id="container">
            <?php
                include('conexao.php');
                $query = selecionar('produto',['pro_id','pro_nome','pro_preco','pro_quantidade','pro_limitacao','pro_path1','pro_path2','sec_id'],'ORDER BY sec_id');
                while($dados = mysqli_fetch_array($query)){
                    $nome = $dados[1];
                    $preco = $dados[2];
                    $quantidade = $dados[3];
                    $img1 = $dados[5];
                    $img2 = $dados[6];
                    echo "
                    <section class=\"produto\">
                    <h3>$nome</h3>
                    <div class=\"imagens\">
                    <img src=\"$img1\" alt=\"Imagem de $nome\">
                    <img src=\"$img2\" alt=\"Imagem de $nome\">
                    </div>
                    <p><strong>Preço:</strong>R$$preco</p><br>
                    <p><strong>Estoque:</strong>$quantidade</p><br>
                    </section>
                    ";
                }
            
            ?>
        </section>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>