<?php
    session_start();
    //print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
         include_once('config.php');
         $nome = $_POST['user'];
         $senha = $_POST['pass'];

         $sql = "SELECT * FROM usuarios WHERE nome = '$nome' and senha = '$senha'";

         $result = $conexao->query($sql);

         if(mysqli_num_rows($result) < 1) {
            unset($_SESSION['user']);
            unset($_SESSION['pass']);
            header('Location: index.php');
         } else {
            $_SESSION['user'] = $nome;
            $_SESSION['pass'] = $senha;
            header('Location: home.php');
         }
    } else {
        header('Location: index.php');
    }

?>
