<?php
session_start();
include("db/db.php");

    
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $id = mysqli_real_escape_string($db,$_GET["id"]); 

    $sql = "SELECT id FROM tb_contato WHERE id = '$id'";
    $sql2 = "SELECT id FROM tb_usuarios WHERE login = '$id'";
    
    if(mysqli_num_rows(mysqli_query($db,$sql)) == 1){
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            $sql = "select * from tb_usuarios
            INNER JOIN tb_contato on (tb_usuarios.id = tb_contato.id)
            INNER JOIN tb_img_usuario on (tb_usuarios.id = tb_img_usuario.id)
            WHERE tb_usuarios.id = " . $id;
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_assoc($result);
        }    

    } else if(mysqli_num_rows(mysqli_query($db,$sql2)) == 1) {
        $result = mysqli_query($db,$sql2);
        $count = mysqli_num_rows($result);

        if($count == 1){
            $sql = "select * from tb_usuarios
            INNER JOIN tb_contato on (tb_usuarios.id = tb_contato.id)
            INNER JOIN tb_img_usuario on (tb_usuarios.id = tb_img_usuario.id)
            WHERE tb_usuarios.login = '" . $id . "'";
            
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_assoc($result);
        }    

    } else { echo "erro!"; exit();}
    
    
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
                    <center>
                        <?php echo '<img style="margin-left: 25px;" class="rounded-circle" width="300" height="300" src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" />'; ?>
                    </center> 
                </div>
                <div class="col-12">
                    <div class="jumbotron text-center jumbotron-perfil" id="jumbotron-perfil">
                        
                        <h1 id="usuario_nome" class="display-4" style="margin-left: 35px"><?php echo $row["nome"]; ?>
                        </h1>
                        <p class="lead">
                            <span class="badge badge-info">
                                <?php echo $row['categoria']; ?>
                            </span>
                        </p>
                        <hr class="my-4">
                        <p>Biografia completa:
                        <br>
                        <?php echo $row['biografia']; ?>
                        <br>
                            
                        </p>

                        <div class="modal fade text-center" id="contato-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="contato-modal">Informações para Contato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <h3> Nome: <?php echo $row['nome']; ?> </h3>
                                <h3> Email: <?php echo $row['email']; ?> </h3>
                                <h3> Telefone: <?php echo $row['telefone']; ?> </h3>
                                <h3> Celular: <?php echo $row['celular']; ?> </h3>
                                <h3> Local: <?php echo $row['cidade'] . " - " . $row['UF'] ?> </h3>
                                <hr>
                                <h3> <?php echo $row['mensagem']; ?> </h3>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>

                        <a style="margin-left: 25px" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contato-modal" role="button">Entrar em Contato</a>
                            
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

                <div class="col-lg-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
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

    </body>
</html>
    <?php } ?>