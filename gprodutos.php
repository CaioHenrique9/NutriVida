<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Gerenciamento de produtos</title>
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
        
        <fieldset>
            <legend>Adicionar seção</legend>
            <form action="secao.php" method="post">
            <div class="campo">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="botoes">
                    <button type="submit">Adicionar</button>
                    <button type="reset">Limpar</button>
                </div>
            </form>
        </fieldset>


        <fieldset>
            <legend>Cadastrar Produto</legend>
            <form action="cadProd.php" method="post" enctype="multipart/form-data">
                <div class="campo">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="campo">
                    <label for="">Preço:</label>
                    <input type="number" name="preco" id="preco" required>
                </div>
                <div class="campo">
                    <label for="">Quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade" required>
                </div>
                <div class="campo">
                    <label for="">Limitações:</label>
                    <input type="text" name="limitacoes" id="limitacoes" placeholder="Separe as limitações por '/'" required>
                </div>
                <div class="campo">
                    <label for="">Seção:</label>
                    <select name="secao" id="">
                    <?php 
                    
                    $query = selecionar('secao',['sec_id','sec_nome'],'');
                    while ($dados = mysqli_fetch_array($query)) {
                        $id = $dados[0];
                        $nome = $dados[1];
                        echo "
                            <option value=\"$id\">$nome</option>
                        ";
                    }
                    ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="">Insira as imagens:</label>
                    <input type="file" name="img1" id="img1" required>
                    <input type="file" name="img2" id="img2" required>
                </div>
                <div class="botoes">
                    <button type="submit">Enviar</button>
                    <button type="reset">Limpar</button>
                </div>
            </form>
        </fieldset>
        
        <fieldset>
            <legend>Adicionar estoque:</legend>
            <form action="estoque.php" method="post">
            <div class="campo">
                    <label for="">Produto:</label>
                    <select name="produto" id="">
                    <?php 
                    
                    $query = selecionar('produto',['pro_id','pro_nome'],'ORDER BY pro_nome');
                    while ($dados = mysqli_fetch_array($query)) {
                        $id = $dados[0];
                        $nome = $dados[1];
                        echo "
                            <option value=\"$id\">$nome</option>
                        ";
                    }
                    ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="">Quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade" required>
                </div>
                <div class="botoes">
                    <button type="submit">Adicionar</button>
                    <button type="reset">Limpar</button>
                </div>
            </form>
        </fieldset>
    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>