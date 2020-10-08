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
                        <a class="editar" onclick="editar_img()">
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>
                    </center> 
                </div>
                <div class="col-12">
                    <div class="jumbotron text-center jumbotron-perfil" id="jumbotron-perfil">
                        
                        <h1 id="usuario_nome" class="display-4" style="margin-left: 35px"><?php echo $_SESSION["usuario_nome"]; ?>
                        <a class="editar" onclick="editar_nome('<?php echo $_SESSION['usuario_nome'] . "')" . '"'; ?> >
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>
                        </h1>
                        <p class="lead">Breve Apresentação</p>
                        <hr class="my-4">
                        <p>Biografia completa</p>

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
                        

                            <?php $cidade = addslashes($row["cidade"]);
                            $html = <<<HTML
                            <a class="editar" onclick="editar_contato('{$row["email"]}','{$row["telefone"]}', '{$row["celular"]}', '{$cidade}', '{$row["UF"]}', '{$row["mensagem"]}' )">
                            HTML;  echo $html?>
                            
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>
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
<?php } }
else if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) && isset($_POST["alterar_nome"])){

    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }

    $id = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 
    $nome = mysqli_real_escape_string($db,$_POST["alterar_nome"]); 

    $sql = "UPDATE tb_usuarios SET nome = '$nome' WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    
    if($result == 1){

        $_SESSION["usuario_nome"] = $nome;

        header("Refresh: 0");
    } else {
        echo "Erro ao alterar nome de usuario!";
    }

} else if($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) && isset($_FILES["alterar_foto"])){


    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }

    $imagem = $_FILES['alterar_foto']['tmp_name'];
    $tamanho = $_FILES['alterar_foto']['size'];
    $tipo = $_FILES['alterar_foto']['type'];
    $nome = $_FILES['alterar_foto']['name'];

    if ( $imagem != "none" )
    {
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

        $queryInsercao = "UPDATE tb_img_usuario SET img = '$conteudo' WHERE id = " . $_SESSION['usuario_id'];
        mysqli_query($db, $queryInsercao) or die("Erro ao gravar a imagem!");
        echo 'Imagem gravada com sucesso!';

        header('Location: index.php');  
    }
    else{print "Não foi possível carregar a imagem.";}
} else if($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) && (isset($_POST["alterar_email"]) && $_POST["alterar_email"] != "") && (isset($_POST["alterar_telefone"]) && $_POST["alterar_telefone"] != "") && (isset($_POST["alterar_celular"]) && $_POST["alterar_celular"] != "") && (isset($_POST["alterar_cidade"]) && $_POST["alterar_cidade"] != "") && (isset($_POST["alterar_uf"]) && $_POST["alterar_uf"] != "") && (isset($_POST["alterar_mensagem"]) && $_POST["alterar_mensagem"] != "")){
    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
    $sql = "UPDATE tb_contato SET telefone = '" . $_POST["alterar_telefone"] . "', celular = '" . $_POST["alterar_celular"] . "', cidade = '" . $_POST["alterar_cidade"] . "', UF = '" . $_POST["alterar_uf"] . "', mensagem = '" . $_POST["alterar_mensagem"] . "' WHERE id =" .$_SESSION['usuario_id'];
    mysqli_query($db, $sql) or die ("Erro SQL!");
    $sql = "UPDATE tb_usuarios SET email = '" . $_POST["alterar_email"] . "'";
    mysqli_query($db, $sql) or die ("Erro SQL!");
    header("Refresh: 0");
}
else { header("Location: ."); } ?>
