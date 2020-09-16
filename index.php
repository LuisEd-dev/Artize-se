<!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Artize-se</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src='bootstrap/js/bootstrap.min.js'></script>
        <script src='src/main.js'></script>
    </head>
    <body>

<?php

session_start();
include("db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST["opcao"] == "login"){

        $login = mysqli_real_escape_string($db,$_POST['login']);
        $senha = mysqli_real_escape_string($db,$_POST['senha']); 
          
        $sql = "SELECT id FROM tb_usuarios WHERE login = '$login' and senha = '$senha'";
        $result = mysqli_query($db,$sql);
        
        $count = mysqli_num_rows($result);
        
        $id = mysqli_fetch_assoc($result)['id'];
        
        if($count == 1) {
            
            $_SESSION['usuario_login'] = $login;
            $_SESSION['usuario_id'] = $id;
             
            if(isset($_POST['check']) && $_POST['check']  == "on"){
                setcookie("ManterLogin", $login, time() + 60*60*24);
                setcookie("ManterID", $id, time() + 60*60*24);
            }
            header('Refresh:0');
    
        }else { 
            header("Location: index.php?erro-login=" . $login); 
        }
    } else if ($_POST["opcao"] == "cadastro"){
        $login = mysqli_real_escape_string($db,$_POST['login']);
        $senha = mysqli_real_escape_string($db,$_POST['senha']); 
        $email = mysqli_real_escape_string($db,$_POST['email']); 
          
        $sql = "INSERT INTO tb_usuarios(login, senha, email) VALUES ('$login', '$senha', '$email')";
        $result = mysqli_query($db,$sql);
        
        if($result == 1){
            echo "Cadastrado Com Sucesso!";
        } else {
            echo "Falha No Cadastro!";
        }
    }
    
}

else if ($_SERVER["REQUEST_METHOD"] == "GET" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) ){

    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
    ?>
    
        <div class="alert alert-success" role="alert">
            Logado Com Sucesso!
        </div>

<?php }

else if(isset($_GET["erro-login"])){ $login = $_GET["erro-login"]; ?>

<div class="container">
    <div class="row">
        <div class="col-sm text-center">
            <div class="alert alert-danger" role="alert">
                    Login ou Senha Incorretos!
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 text-center">
            <button type="button" class="btn btn-primary btn-block" onclick="form_login('<?php echo $login; ?>')">Login</button>
        </div>
        <div class="col-6 text-center">
            <button type="button" class="btn btn-dark btn-block" onclick="form_cadastro()">Cadastro</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm text-center">
            <div class="jumbotron" id="login-cadastro" >
        </div>
    </div>
</div>
<script type="text/javascript">
   form_login('<?php echo $login; ?>');
</script>

<?php }
else if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($_SESSION['usuario_login']) && !isset($_COOKIE["ManterLogin"])){ ?>

<div class="container login-principal">
    <div class="row">
        <div class="col-6 text-center">
            <button type="button" class="btn btn-primary btn-block" onclick="form_login()">Login</button>
        </div>
        <div class="col-6 text-center">
            <button type="button" class="btn btn-dark btn-block" onclick="form_cadastro()">Cadastro</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm text-center">
            <div class="jumbotron" id="login-cadastro" >
        </div>
    </div>
</div>

<?php } ?>
    </body>
</html>