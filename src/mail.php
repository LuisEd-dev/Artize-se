<?php

session_start();
include("../db/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["cadastro"]) && isset($_POST["session"]) && isset($_POST["categoria"])){
    
    $sessao = mysqli_real_escape_string($db,$_POST['session']);
    $nome = mysqli_real_escape_string($db,$_POST['nome']);
    $login = mysqli_real_escape_string($db,$_POST['login']);
    $senha = mysqli_real_escape_string($db,$_POST['senha']); 
    $email = mysqli_real_escape_string($db,$_POST['email']); 
    $categoria = mysqli_real_escape_string($db,$_POST['categoria']); 
        
    $sql = "INSERT INTO tb_confirmar(sessao, nome, login, senha, email, categoria) VALUES ('$sessao', '$nome', '$login', '$senha', '$email', '$categoria')";
    $result = mysqli_query($db,$sql);
    
    if($result != 1){
        echo "Falha No Cadastro!";
    } else {
        $to  =  $_POST["email"];

        $subject = 'Confirmação de Email - Artize-se';


        $message = '
        <html>
        <head>
        <meta charset="utf-8"/>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
        
        <title>Confirmação de Email</title>
        
        <style type="text/css">
            h1{
                margin-top: 20px;
                font-family: "Kumbh Sans", sans-serif;
                font-weight: 700;
            }
            .principal{
                width: 500px;
                height: 300px;
                border-style: solid;
                border-radius: 10px;
                border-color: grey;
                margin: auto;
            }
            label{
                font-family: "Kumbh Sans", sans-serif;
                font-weight: 400;
            }
            .email{
                font-size: 25px;
                font-weight: 700;
                text-decoration: underline;
            }
            .confirmar{
                background-color: #158075;
                border-radius:6px;
                border:1px solid rgb(68, 68, 68);
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:17px;
                padding:9px 76px;
                text-decoration:none;
                
            }
            .confirmar:hover {
                background-color:#18ab9c;
            }
            .confirmar:active {
                position:relative;
                top:1px;
            }
        
        </style>
        
        </head>
        <body>
        <center> <h1>Confirmação de Email</h1> 
        <div class="principal">
            <br>
            <label> Seu cadastro está quase pronto!</label>
            <br>
            <label>Confirme seu Email para prosseguirmos.</label>
            <br><br>
            <label class="email">'.$_POST["email"].'</label>
            <br><br>
            <label>Dados:</label>
            <br><br>
            <label>
                <b>Usuario:</b>'.$_POST["login"].'<br><br>
                <b>Senha:</b>'.$_POST["senha"].'</label><br><br>
            <form action="http://localhost/artize-se/src/mail.php" method="GET">
                <input type="hidden" value="confirmar" name="confirmar">
                <input type="hidden" value="'.$_POST["session"].'" name="session">
                <input type="hidden" value="'.$_POST["email"].'" name="email">
                <button class="confirmar" type="submit">Confirmar!</button>
            </form>
        </div>
        </center>
        
        
        </body>
        </html>
        ';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= 'From: Artize-se <artizese@artizese.com> ' . "\r\n";
        try{
            mail($to, $subject, $message, $headers);?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 text-center offset-sm-2">
                            <div class="alert alert-success" role="alert">
                                Confirmação enviada!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 text-center offset-sm-2">
                            <div class="jumbotron">
                                <h1 class="display-6">Um Email foi enviado para confirmação do seu cadastro</h1>
                                <hr class="my-4">
                                <p class="lead">
                                    <a class="btn btn-primary btn-lg" href="." role="button">Página Inicial</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                

        <?php
        } catch (Exception $e) {?>
                <div class="alert alert-danger" role="alert">
                        Erro ao enviar confirmação!
                </div>
            <?php
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

} else if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"]) && isset($_GET["confirmar"]) && $_GET["confirmar"] == "confirmar" && isset($_GET["session"]) && $_GET["session"] != "" ){
        $email = mysqli_real_escape_string($db,$_GET['email']);
        $sessao = mysqli_real_escape_string($db,$_GET['session']); 
          
        $sql = "SELECT id, nome, login, senha, email, categoria FROM tb_confirmar WHERE sessao = '$sessao' and email = '$email'";
        $result = mysqli_query($db,$sql);
        
        $row = mysqli_fetch_assoc($result);
        
        $id = $row['id'];
        $nome = $row['nome'];
        $login = $row['login'];
        $senha = $row['senha'];
        $email = $row['email'];
        $categoria = $row['categoria'];
        
        $sql1 = "SELECT login FROM tb_usuarios WHERE login = '$login'";
        $result1 = mysqli_query($db,$sql1);
        $count1 = mysqli_num_rows($result1);

        $sql2 = "SELECT email FROM tb_usuarios WHERE email = '$email'";
        $result2 = mysqli_query($db,$sql2);
        $count2 = mysqli_num_rows($result2);

        if ($count1 == 0 && $count2 == 0){
            $content = http_build_query(array(
                'opcao' => 'cadastro',
                'id' => $id,
                'nome' => $nome,
                'login' => $login,
                'senha' => $senha,
                'email' => $email,
                'categoria' => $categoria,
            ));
                
            $context = stream_context_create(array(
                'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => "Content-Type: application/x-www-form-urlencoded")
            ));
                
            $result = file_get_contents('http://localhost/artize-se/index.php', null, $context);
            echo $result;
            header("Location: ../index.php");
        } else {
            echo "Email e/ou Login já cadastrado!";
        }

}
?>