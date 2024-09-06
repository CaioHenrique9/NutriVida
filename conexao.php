<?php 

$conexao = mysqli_connect("localhost","root","","nutrivida");

if(!$conexao){
    die('Não foi possível conectar ao banco de dados.Erro detectado:'. mysql_connect_error());
}
?>