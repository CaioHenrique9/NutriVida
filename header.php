<header>
        <div style="height: 70%;width: 100%;display:flex;align-items: center;justify-content: space-between;padding-right:10%;">
            <img src="assets/logo.PNG" alt="" id="logo">
            <h1>NutriVida</h1>
            <?php 
            session_start();
            if(empty($_SESSION['id'])){
                echo "<a href=\"login.php\" id=\"link-login\" title=\"Clique aqui para fazer login\">login</a>";
            }
            else{
                $id=$_SESSION['id'];
                $nome = $_SESSION['nome'];
                $telefone = $_SESSION['telefone'];
                $email = $_SESSION['email'];
                echo "<a href=\"info.php\" id=\"link-login\" title=\"Clique aqui para fazer login\">".strtok($nome," ")."</a>";
            }
            ?>
        </div>
        <nav>
            <ul id="links">
                <li><a href="index.php">Home</a></li>
                <li><a href="promocoes.php">Promoções</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="cadastro.php">Cadastre-se</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
            </ul>
        </nav>
    </header>