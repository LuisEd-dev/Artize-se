<?php

include("db/db.php");
echo $_COOKIE['ManterSessao'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $myusername = mysqli_real_escape_string($db,$_POST['login']);
    $mypassword = mysqli_real_escape_string($db,$_POST['senha']); 
      
    $sql = "SELECT id FROM tb_usuarios WHERE login = '$myusername' and senha = '$mypassword'";
    $result = mysqli_query($db,$sql);
    
      
    $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
    if($count == 1) {
        echo "logado";

        session_start();
        $_SESSION['login_user'] = $myusername;
         
        //header("location: index.html");
        if(isset($_POST['check']) && $_POST['check']  == "on"){
            setcookie("ManterSessao", $myusername, time() + 60*60*24);
        }
    }else {
        echo  "Your Login Name or Password is invalid";
    }
}

?>