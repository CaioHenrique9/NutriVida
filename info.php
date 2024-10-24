<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Informações</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('header.php');

    ?>

    <main>
        <?php include('protect.php');?>
        <h2>Seus dados</h2>
        <?php 
            
            $id = $_SESSION['id'];
            $nome = $_SESSION['nome'];
            $email = $_SESSION['email'];
            $telefone = $_SESSION['telefone'];

            echo "
            <dl>
               <div class=\"dl-config\">
                   <dt>ID:</dt>
                   <dd>$id</dd>
               </div>
                <div class=\"dl-config\">
                    <dt>Nome:</dt>
                    <dd>$nome</dd>
                </div>
                <div class=\"dl-config\">
                    <dt>Email:</dt>
                    <dd>$email</dd>
                </div>
                <div class=\"dl-config\">
                    <dt>Telefone:</dt>
                    <dd>$telefone</dd>
                </div>
            </dl>
            <div class=\"botoes\">
                <a href=\"logout.php\"><button type=\"submit\">Logout</button></a>
                <a href=\"update.php\"><button type=\"submit\">Alterar Dados</button></a>
                <a href=\"delete.php\"><button type=\"submit\">Apagar conta</button></a>
            </div>
            ";
        
        ?>
    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>