
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriVida - Cadastro    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    include('header.php');
    ?>

    <main>
        <?php 
        
            include('conexao.php');

            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $tipo_de_usuario = $_POST['tipo_de_usuario'];

            if($tipo_de_usuario == 'cliente'){ 
                $query = mysqli_query($conexao,"SELECT * FROM cliente WHERE cli_email = '$email' and cli_senha = '$senha'");
            }else{
                $query = mysqli_query($conexao,"SELECT * FROM funcionario WHERE fun_email = '$email' and fun_senha = '$senha'");
            }

            if(mysqli_num_rows($query) == 0){
                die('Email ou senha incorretos');
            }

            $dados = mysqli_fetch_array($query);
            $_SESSION['id'] = $dados[0];
            $_SESSION['nome'] = $dados[1];
            $_SESSION['email'] = $dados[2];
            $_SESSION['telefone'] = $dados[3];
            $_SESSION['tipo_de_usuario'] = $tipo_de_usuario;

            if($tipo_de_usuario == 'cliente'){ 
                header('Location: index.php');
            }else{
                header('Location: indexf.php');
            }
        ?>

    </main>
        <footer>NutriVida, &copy; 2024</footer>
</body>
</html>