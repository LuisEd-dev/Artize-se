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
        $sql = "select * from tb_usuarios
        INNER JOIN tb_contato on (tb_usuarios.id = tb_contato.id)
        INNER JOIN tb_img_usuario on (tb_usuarios.id = tb_img_usuario.id)
        WHERE tb_usuarios.id = " . $_SESSION["usuario_id"];
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_assoc($result);
        

?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Artize-se</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>

                <ul class="nav justify-content-center">
                    <form class="form-inline nav-item">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </ul>
                
                <a style="color: white;" class="nav-link" href="perfil.php">
                    <?php echo '<img style="margin-left: 25px;" class="rounded-circle" width="30" height="30" src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" />'; ?>
                    Perfil
                </a>
                <a class="btn btn-danger" style="width: 100px;" href="logout.php">Sair</a>
                

            </div>
          </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                <br>
                    
                
                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><?php echo '<img class="rounded-circle" width="50" height="50" src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" />'; ?></span>
                        </div>

                        <textarea type="text" class="form-control" placeholder="Conte-nos novidades..." aria-label="Conte-nos novidades..." aria-describedby="basic-addon1" style="height: 70px;"></textarea>
                    </div>

                    <div class="form-check float-left">
                        <input type="checkbox" class="form-check-input" id="Destaque">
                        <label class="form-check-label" for="Destaque">Destaque</label>
                    </div>

                    <div class="btn-group float-right" role="group" >
                        <input type="file" class="btn btn-secondary">

                        <button type="button" class="btn btn-success">Compartilhar</button>
                    </div>

                </div>
            </div>
        </div>

    <?php }} else { header("Location: index.php"); }?>

    </body>
</html>