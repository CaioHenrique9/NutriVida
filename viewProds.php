<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Tabela de produtos</title>
    <link rel="stylesheet" href="style.css">
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
                <th>Imagens</th>
                <th>Seção</th>
                <th></th>
            </tr>
            <?php 
            include('conexao.php');
            $query = selecionar('produto',['pro_id','pro_nome','pro_preco','pro_quantidade','pro_path1','pro_path2','sec_id'],'ORDER BY pro_nome');
            
            while($dados = mysqli_fetch_array($query)){
                $id = $dados[0];
                $nome = $dados[1];
                $preco = $dados[2];
                $quantidade = $dados[3];
                $img1 = $dados[4];
                $img2 = $dados[5];
                $idsecao = $dados[6];
                $query2 = selecionar('secao',['sec_nome'],"WHERE sec_id = $idsecao");
                $dados2 = mysqli_fetch_array($query2);
                $secao = $dados2[0];
                echo "
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>R$$preco</td>
                    <td>$quantidade</td>
                    <td>
                    <div class=\"img-Prods\">
                    <img src=\"$img1\" alt=\"Imagem de $nome\">
                    <img src=\"$img2\" alt=\"Imagem de $nome\">
                    </div>
                    </td>
                    <td>$secao</td>
                    <td>
                    <a class='btn btn-sm btn-primary' href='editProd.php?id=$id' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='deleteProd.php?id=$id' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                    </td>
                </tr>
                ";
            }
            ?>
        </table>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>