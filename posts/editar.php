<!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Artize-se</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src='../bootstrap/js/bootstrap.min.js'></script>
        <script src='../src/main.js'></script>
    </head>
    <body>
        <div class="container">
<?php

session_start();
include("../db/db.php");

    
if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) && !isset($_POST["editar"])){
    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
    
    $id = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 

    $sql = "SELECT id FROM tb_contato WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1){

        $autor = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 
        $id = mysqli_real_escape_string($db,$_POST["post_id"]); 

        $sql = "SELECT * FROM tb_posts WHERE autor = '$autor' AND id = '$id'";
        $post_query = mysqli_query($db,$sql) or die("Erro ao deletar post!");
        $post_row = mysqli_fetch_assoc($post_query);

        ?> 
        
        <div class="col-sm text-center">
            <div class="jumbotron" id="editar-post">
                <h1 class="display-4">Editar Post</h1>
                <p class="lead text-center">ID: <?php echo $id; ?></p>
                <hr class="my-5">
                <form action="editar.php" method="POST">
                    <input type="hidden" name="editar">
                    <div class="form-group">
                        <div class="col-6 offset-3">
                            <label>Conteudo</label>
                            <textarea type="text" class="form-control" name="conteudo"><?php echo $post_row["conteudo"]; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-6 offset-3">
                            <label for="destaque">Destaque</label>
                            <select class="form-control" id="destaque">
                                <option value="S" <?php if($post_row["destaque"] == "S"){ echo "selected";} ?> >Ativo</option>
                                <option value="N" <?php if($post_row["destaque"] == "N"){ echo "selected";} ?> >Inativo</option>
                            </select>
                        </div>
                    </div>

                    <?php if($post_row["img"]){ ?>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="check" id="checkbox" checked onclick="editar_img_post()">
                        <label class="form-check-label" id="checar">Manter Foto Anterior</label>
                    </div>
                    
                    <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-block btn-success">Editar</button>
                    </div>

                    <?php } else { ?>
                    <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-block btn-success">Editar</button>
                    </div>
                    <script type="text/javascript">
                        document.onload=editar_img_post();
                        
                        let div = document.getElementsByClassName("form-group")[2]
                        div.removeChild(document.querySelector(".btn.btn-secondary"))

                    </script>
                    <?php } ?>
                </form>
            </div>
    </div>

    
</div>
        
        <?php
    }
} else if ( $_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) && (isset($_POST["editar"])) ){
    
    $autor = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 
    $id = mysqli_real_escape_string($db,$_POST["post_id"]); 

    $conteudo = mysqli_real_escape_string($db,$_POST["conteudo"]); 
    $check = mysqli_real_escape_string($db,$_POST["check"]); 

    if($check){
        echo "checked";
    }

    //$sql = "UPDATE tb_posts SET (conteudo, destaque) VALUES ('$conteudo', '$destaque')";



}

?>
    </div>
    </body>
</html>