<?php 
session_start();
include("../db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) ){
    
    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
	
	$id = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 

    $sql = "SELECT id FROM tb_contato WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1){
        header("Location: ../home.php");
    }
}
?>