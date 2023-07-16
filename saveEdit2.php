<?php

    include_once('config.php');

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $produto = $_POST['nome_produto'];
        $valorunitario = $_POST['valor_unitario'];
        $estoque = $_POST['estoque'];
    
        $sqlUpdate = "UPDATE produtos SET nome_produto='$produto', valor_unitario='$valorunitario', estoque='$estoque' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: produtosregistrados.php');

?>