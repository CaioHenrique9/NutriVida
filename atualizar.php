<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Atualizando</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.ico" type="image/x-icon">
</head>
<body>
    <?php 
    
    include('header.php');
    
    ?>

    <?php 
        include('conexao.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        mysqli_query($conexao,"UPDATE cliente SET cli_nome='$nome',cli_email='$email',cli_telefone='$telefone',cli_senha='$senha' WHERE cli_id = '$id'");

        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['telefone'] = $telefone;

        header('Location: info.php');
    ?>
</body>
</html>