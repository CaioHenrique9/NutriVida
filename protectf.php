<?php 
    if($_SESSION['tipo_de_usuario'] != "funcionario"){
        die('
        <p>Você não tem permissão para acessar esta página</p>
        <a href="index.php">Clique aqui para voltar a página principal</a>
        ');
    }
?>