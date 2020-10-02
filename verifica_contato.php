<?php
session_start();
include("db/db.php");

    $id = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 

    $sql = "SELECT id FROM tb_contato WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        header("Location: perfil.php");
    } else {
        header("Location: contato.php");
    }
?>