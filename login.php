<?php

include("db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $myusername = mysqli_real_escape_string($db,$_POST['login']);
    $mypassword = mysqli_real_escape_string($db,$_POST['senha']); 
      
    $sql = "SELECT id FROM tb_usuarios WHERE login = '$myusername' and senha = '$mypassword'";
    $result = mysqli_query($db,$sql);
    
      
    $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
    if($count == 1) {
        echo "logado";
        $_SESSION['login_user'] = $myusername;
         
        header("location: index.html");
    }else {
        echo  "Your Login Name or Password is invalid";
    }
}

?>