<?php 
session_start();
include("../db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_SESSION["usuario_login"]) || isset($_COOKIE["ManterLogin"]) ) ){
    
    if (isset($_COOKIE["ManterLogin"])){
        $_SESSION["usuario_login"] = $_COOKIE["ManterLogin"];
        $_SESSION["usuario_id"] = $_COOKIE["ManterID"];
    }
	
	$id = mysqli_real_escape_string($db,$_SESSION["usuario_id"]); 

    $sql = "SELECT id FROM tb_contato WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1){

		$conteudo = mysqli_real_escape_string($db,$_POST["conteudo"]);
		if(isset($_POST["destaque"])){
			$destaque = "S";
		}  else {
			$destaque = "N";
		}
			
		$tiposPermitidos= array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png');
		
		
		$tamanhoPermitido = 1024 * 1000 * 10; 
	
		
		$arqName = $_FILES['imagem']['name'];
		
		
		$arqType = $_FILES['imagem']['type'];
		
		
		$arqSize = $_FILES['imagem']['size'];
		
		
		$arqTemp = $_FILES['imagem']['tmp_name'];
		
		
		$arqError = $_FILES['imagem']['error'];

		echo $arqError;

		if ($arqError == 0) {
			
			if (array_search($arqType, $tiposPermitidos) === false) {
				echo 'O tipo de arquivo enviado é inválido!';
			
			} else if ($arqSize > $tamanhoPermitido) {
				echo 'O tamanho do arquivo enviado é maior que o limite!';
			
			} else {
				$pasta = 'img/';
				
				$extensao = strtolower(end(explode('.', $arqName)));
				
				$nome = time() . '.' . $extensao;
				$destino = $pasta . $nome;
				$upload = move_uploaded_file($arqTemp, $pasta . $nome);
	
				
				if ($upload == true) {
					

					$sql = "insert into tb_posts (autor, conteudo, destaque, img) 
								values ('$id', '$conteudo', '$destaque', '$destino')";
		
					$query = mysqli_query($db, $sql) or die ("Erro na sql!") ;

					if ($query == true) {
					
						header("Location: ../home.php"); 
					}
				}
			}
		} else if($arqError == 4){
			$sql = "insert into tb_posts (autor, conteudo, destaque) values ('$id', '$conteudo', '$destaque')";
		
			$query = mysqli_query($db, $sql) or die ("Erro na sql!") ;
			if ($query == true) {
					echo "Sql ok";
					header("Location: ../home.php"); 
				}
		}
	}
}
?>