<?php 

if(empty($_SESSION['id'])){
    die('
    
    <p>Você precisa estar logado para acessar essa página</p>
    <a href="login.php">Clique aqui para logar</a>
    <a href="cadastro.php">Clique aqui para se cadastrar</a>
    ');
}

?>