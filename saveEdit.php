<?php

    include_once('config.php');

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $quantidade = $_POST['quantidade'];
        $produto = $_POST['produto'];
        $valortotal = $_POST['valortotal'];
        $forma_pagamento = $_POST['forma_pagamento']; 
    
        $sqlUpdate = "UPDATE vendas SET quantidade='$quantidade', produto='$produto', valortotal='$valortotal', forma_pagamento='$forma_pagamento' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: historicovendas.php');

?>