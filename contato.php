<?php
session_start();
include("db/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_SESSION["usuario_id"]) && $_SESSION["usuario_id"] != "") && (isset($_POST["telefone"]) && $_POST["telefone"] != "") && (isset($_POST["celular"]) && $_POST["celular"] != "") && (isset($_POST["cidade"]) && $_POST["cidade"] != "") && (isset($_POST["uf"]) && $_POST["uf"] != "") && (isset($_POST["mensagem"]) && $_POST["mensagem"] != "")){
 
    $id = mysqli_real_escape_string($db,$_SESSION["usuario_id"]);  
    $telefone = mysqli_real_escape_string($db,$_POST["telefone"]); 
    $celular = mysqli_real_escape_string($db,$_POST["celular"]); 
    $cidade = mysqli_real_escape_string($db,$_POST["cidade"]); 
    $uf = mysqli_real_escape_string($db,$_POST["uf"]); 
    $mensagem = mysqli_real_escape_string($db,$_POST["mensagem"]); 

    $sql = "INSERT INTO tb_contato (id, telefone, celular, cidade, UF, mensagem) VALUES ('$id', '$telefone', '$celular', '$cidade', '$uf', '$mensagem')";
    $result = mysqli_query($db,$sql);

    if($result != 1){
        echo "Falha No Cadastro!";
    } else{
        header("Location: perfil.php");
    }
} else{ ?>

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
        <div class="container margin-top">
            <div class="row">
                <div class="col-8 offset-2">
                    <center>
                        <h1>
                            Cadastrar Informações de Contato
                            <hr>
                            <small><?php echo $_SESSION["usuario_login"]; ?></small>
                        </h1>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3 margin-top">
                    <form action="contato.php" method="POST">
                        <div class="form-group">
                          <label>Telefone Fixo</label>
                          <input type="number" class="form-control" placeholder="Telefone Fixo" name="telefone">
                        </div>

                        <div class="form-group">
                            <label>Celular</label>
                            <input type="number" class="form-control" placeholder="Celular" name="celular">
                        </div>

                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" placeholder="Cidade" name="cidade">
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="uf">
                              <option>AC</option>
                              <option>AL</option>
                              <option>AP</option>
                              <option>AM</option>
                              <option>BA</option>
                              <option>CE</option>
                              <option>ES</option>
                              <option>GO</option>
                              <option>MA</option>
                              <option>MT</option>
                              <option>MS</option>
                              <option>MG</option>
                              <option>PA</option>
                              <option>PB</option>
                              <option>PR</option>
                              <option>PE</option>
                              <option>PI</option>
                              <option>RJ</option>
                              <option>RN</option>
                              <option>RS</option>
                              <option>RO</option>
                              <option>RR</option>
                              <option>SC</option>
                              <option>SP</option>
                              <option>SE</option>
                              <option>TO</option>
                              <option>DF</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mensagem</label>
                            <input type="text" class="form-control" placeholder="Mensagem" name="mensagem">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                      </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php } ?>