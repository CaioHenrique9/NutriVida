<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Tabela de produtos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('headerf.php');
    include('functions.php');
    
    ?>

        <?php 
        
        include('protect.php');
        include('protectf.php');

        ?>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Limitações</th>
                <th>Imagens</th>
                <th>Seção</th>
            </tr>
            <?php 
            include('conexao.php');
            $query = selecionar('produto',['pro_id','pro_nome','pro_preco','pro_quantidade','pro_limitacao','pro_path1','pro_path2','sec_id'],'ORDER BY pro_nome');
            
            while($dados = mysqli_fetch_array($query)){
                $id = $dados[0];
                $nome = $dados[1];
                $preco = $dados[2];
                $quantidade = $dados[3];
                $limitacao = $dados[4];
                $img1 = $dados[5];
                $img2 = $dados[6];
                $idsecao = $dados[7];
                $query2 = selecionar('secao',['sec_nome'],"WHERE sec_id = $idsecao");
                $dados2 = mysqli_fetch_array($query2);
                $secao = $dados2[0];
                echo "
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>R$$preco</td>
                    <td>$quantidade</td>
                    <td>$limitacao</td>
                    <td>
                    <div class=\"img-Prods\">
                    <img src=\"$img1\" alt=\"Imagem de $nome\">
                    <img src=\"$img2\" alt=\"Imagem de $nome\">
                    </div>
                    </td>
                    <td>$secao</td>
                </tr>
                ";
            }
            ?>
        </table>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>