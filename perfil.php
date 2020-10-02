<?php
session_start();
include("db/db.php");

    
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
?>

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
        <div class="container">
            <div class="row">
                <div class="col-12 margin-top">
                    <center><img src="img/usuario.jpg" class="rounded-circle" alt="Cinque Terre" width="300" height="300"></center> 
                </div>
                <div class="col-12">
                    <div class="jumbotron text-center jumbotron-perfil">
                        <h1 class="display-4"><?php echo $_SESSION["usuario_nome"]; ?></h1>
                        <p class="lead">Breve Apresentação</p>
                        <hr class="my-4">
                        <p>Biografia completa</p>
                        <a class="btn btn-primary btn-lg" onclick="contato(#passar informações e apresentar modal)" role="button">Entrar em Contato</a>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <center><h1>Destaques:</h1></center>
                    <br>
                </div>
            </div>

            <div class="row">

                <div class="col-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>                       
            </div>
            <br>
        </div>
        <div class="container-fluid perfil-background-container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <center><h1>Compartilhamentos:</h1></center>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-8 offset-2">
                    <br>
                    <div class="media">
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                          <h5 class="mt-0">Titulo</h5>
                          Conteudo
                        </div>
                      </div>
                    <br>
                </div>
            </div>

        </div>

        <a class="btn btn-danger btn-block" href="logout.php">Sair</a>

    </body>
</html>
<?php } } else { header("Location: ."); } ?>
