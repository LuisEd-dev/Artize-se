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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["opcao"])){
    if ($_POST["opcao"] == "login"){

        $login = mysqli_real_escape_string($db,$_POST['login']);
        $senha = mysqli_real_escape_string($db,$_POST['senha']); 
          
        $sql = "SELECT id, login, nome FROM tb_usuarios WHERE login = '$login' and senha = '$senha'";
        $result = mysqli_query($db,$sql);
        
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        
        if($count == 1) {
            
            $id = $row['id'];
            $nome = $row['nome'];

            $_SESSION['usuario_login'] = $login;
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $nome;
             
            if(isset($_POST['check']) && $_POST['check']  == "on"){
                setcookie("ManterLogin", $login, time() + 60*60*24);
                setcookie("ManterID", $id, time() + 60*60*24);
            }
            header('Refresh:0');
    
        }else { 
            header("Location: index.php?erro-login=" . $login); 
        }
    } else if ($_POST["opcao"] == "cadastro"){

        $nome = mysqli_real_escape_string($db,$_POST['nome']);
        $login = mysqli_real_escape_string($db,$_POST['login']);
        $senha = mysqli_real_escape_string($db,$_POST['senha']); 
        $email = mysqli_real_escape_string($db,$_POST['email']); 
        $categoria = mysqli_real_escape_string($db,$_POST['categoria']); 

        $sql = "INSERT INTO tb_usuarios(nome, login, senha, email, categoria) VALUES ('$nome', '$login', '$senha', '$email', '$categoria')";
        $result = mysqli_query($db,$sql);
        
        if($result == 1){
            echo "Cadastrado Com Sucesso!";
            $id = mysqli_real_escape_string($db,$_POST['id']);
            $sql = "DELETE FROM tb_confirmar WHERE id = '$id'";
            $result = mysqli_query($db,$sql);
        } else {
            echo "Falha No Cadastro!";
        }
    } else if ($_POST["opcao"] == "confirmar"){
        
        $email = mysqli_real_escape_string($db,$_POST['email']); 
        $login = mysqli_real_escape_string($db,$_POST['login']);

        $sqlEmailUsuarios = "SELECT email FROM tb_usuarios WHERE email = '$email'";
        $resultEmailUsuarios = mysqli_query($db,$sqlEmailUsuarios);
        $countEmailUsuarios = mysqli_num_rows($resultEmailUsuarios);

        $sqlLoginUsuarios = "SELECT login FROM tb_usuarios WHERE login = '$login'";
        $resultLoginUsuarios = mysqli_query($db,$sqlLoginUsuarios);
        $countLoginUsuarios = mysqli_num_rows($resultLoginUsuarios);


        if ($countEmailUsuarios == 0 && $countLoginUsuarios == 0){
            $content = http_build_query(array(
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'login' => $_POST['login'],
                'senha' => $_POST['senha'],
                'categoria' => $_POST['categoria'],
                'session' => $_COOKIE["PHPSESSID"],
                'cadastro' => 'cadastro'
            ));
                
            $context = stream_context_create(array(
                'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => "Content-Type: application/x-www-form-urlencoded",
                )
            ));
            
            $result = file_get_contents('http://localhost/artize-se/src/mail.php', null, $context); 
            echo $result;        
        } else{
            echo "Email e/ou Login já cadastrado!";
        }
        
    }
    
}

else if ($_SERVER["REQUEST_METHOD"] == "GET" && ( (isset($_SESSION["usuario_login"]) && isset($_SESSION["usuario_nome"])) || isset($_COOKIE["ManterLogin"]) ) ){

    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
    ?>
    
        <div class="alert alert-success" role="alert">
            Logado Com Sucesso!
        </div>

<?php
    header("Location: verifica_contato.php");
}

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

<div class="container margin-top">
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