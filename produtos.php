<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
    include('header.php');
    include('functions.php');
    
    ?>

        <section id="container">
            <?php
                include('conexao.php');
                $query = selecionar('secao',['sec_id','sec_nome'],"");
                while($dados = mysqli_fetch_array($query)){
                $idSecao = $dados[0];
                $query2 = selecionar('produto',['pro_id','pro_nome','pro_preco','pro_quantidade','pro_path1','pro_path2','sec_id'],"WHERE sec_id = '$idSecao' ORDER BY sec_id");
                if(mysqli_num_rows($query2) != 0){
                $nomeSecao = $dados[1];
                echo "<h2>$nomeSecao</h2>";
                echo "<section class=\"produtos\">";
                $query2 = selecionar('produto',['pro_id','pro_nome','pro_preco','pro_quantidade','pro_path1','pro_path2','sec_id'],"WHERE sec_id = '$idSecao' ORDER BY sec_id");
                $dados2 = mysqli_fetch_array($query2);
                while($dados2 = mysqli_fetch_array($query2)){
                    $nome = $dados2[1];
                    $preco = $dados2[2];
                    $quantidade = $dados2[3];
                    $img1 = $dados2[4];
                    $img2 = $dados2[5];
                    $idsecao = $dados2[6];
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
                echo "</section>";
                }
                }
            ?>
        </section>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>