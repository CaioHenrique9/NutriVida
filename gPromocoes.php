<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Gerenciamento de promoções</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
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
            <legend>Adicionar Promoção</legend>
            <form action="cadProm.php" method="post">
                <div class="campo">
                    <label for="">Valor da promoção:</label>
                    <input type="number" name="valor" id="valor" placeholder="Digitar em %, sem o símbolo" required>
                </div>
                <div class="campo">
                    <label for="">Produto:</label>
                    <select name="produto" id="produto">
                    <?php 
                    
                    $query = selecionar('produto',['pro_id','pro_nome'],'');
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