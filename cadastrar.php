<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Cadastrando</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    include('header.php');
    ?>

    <main>
        <?php 
        
        include('conexao.php');
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        mysqli_query($conexao,"INSERT INTO cliente VALUES (DEFAULT,'$nome','$email','$telefone','$senha')");

        $query = mysqli_query($conexao,"SELECT * FROM cliente WHERE cli_email = '$email' and cli_senha = '$senha'");

        if(isset($_SESSION['id'])){
            session_destroy();
        }

        $dados = mysqli_fetch_array($query);
        $_SESSION['id'] = $dados[0];
        $_SESSION['nome'] = $dados[1];
        $_SESSION['email'] = $dados[2];
        $_SESSION['telefone'] = $dados[3];

        header('Location: index.php');
        ?>
    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>