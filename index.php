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
        
    </head>
    <body>

<?php

session_start();
include("db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
            setcookie("ManterSessao", $login, time() + 60*60*24);
            setcookie("ManterID", $id, time() + 60*60*24);
        }
        header('Refresh:0');

    }else { ?>

        <div class="alert alert-danger" role="alert">
            Login ou Senha Incorretos!
        </div>

        <?php
    }
}

else if ($_SERVER["REQUEST_METHOD"] == "GET" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterSessao"]) ) ){

    if (isset($_COOKIE["ManterSessao"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterSessao"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
    ?>
    
        <div class="alert alert-success" role="alert">
            Logado Com Sucesso!
        </div>

<?php }

else if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($_SESSION['usuario_login']) && !isset($_COOKIE["ManterSessao"])){ ?>

        <div class="container login-principal">
            <div class="row">
                <div class="col-sm text-center">
                        <button onclick="form_login()">Login</button>
                        <button onclick="form_cadastro()">Cadastro</button>
                    <div class="jumbotron" id="login-cadastro" >
                        
                        <!--
                        <h1 class="display-4 text-center">Artize-se</h1>
                        <p class="lead text-center">Contemple; Compartilhe; Aprecie a arte</p>
                        <hr class="my-5">
                        
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <div class="col-6 offset-3">
                                    <label>Login</label>
                                    <input type="text" class="form-control" name="login">
                                </div> 
                            </div>
    
                            <div class="form-group">
                                <div class="col-6 offset-3">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="senha">
                                </div>
                            </div>
                            
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" name="check">
                              <label class="form-check-label">Manter Sessão</label>
                            </div>
    
                            <div class="col-6 offset-3">
                                <button type="submit" class="btn btn-block btn-success">Acessar</button>
                            </div>
                            
                          </form>
    
                      </div>-->
                </div>
            </div>
        </div>

<?php } ?>
    <script src='src/main.js'></script>
    </body>
</html>