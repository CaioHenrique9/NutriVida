<?php 
function selecionar($tabela,$campos,$condicao){
    include('conexao.php');
    $part = '';
    for($i = 0;$i < count($campos);++$i){
        if($i == count($campos) - 1){
            $part .= $campos[$i];
        }
        else{
            $part .= $campos[$i].','; 
        }
    }   
    $query = mysqli_query($conexao,"SELECT $part FROM $tabela $condicao");
    return $query;
}
?>