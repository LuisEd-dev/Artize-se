<?php

session_start();
include("../db/db.php");

    
if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) ){
    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
    
    $autor = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 
    $id = mysqli_real_escape_string($db,$_POST["post_id"]); 

    $sql = "UPDATE tb_posts SET destaque = 'N' WHERE autor = '$autor' AND id = '$id'";
    mysqli_query($db, $sql) or die("Erro ao deletar post!");
    header("Location: ../perfil.php");
}

?>