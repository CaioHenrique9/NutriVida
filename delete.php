<?php 

include('conexao.php');

session_start();

$id = $_SESSION['id'];

mysqli_query($conexao,"DELETE FROM cliente WHERE cli_id = '$id'");

session_destroy();

header('Location: index.php');

?>