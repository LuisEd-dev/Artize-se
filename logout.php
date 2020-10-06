<?php
    session_start();
    session_destroy();
    unset($_COOKIE['ManterLogin']); 
    setcookie('ManterLogin', null, -1, '/artize-se'); 
    unset($_COOKIE['ManterID']); 
    setcookie('ManterID', null, -1, '/artize-se'); 
    header('Location: index.php');
    exit();
?>