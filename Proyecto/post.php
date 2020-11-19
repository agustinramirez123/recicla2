<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
	<form class="formulario2" enctype="multipart/form-data"  name="posteo" method="POST">
		<p><span class="titular"> Titulo </span></br><input  type="text" name="titulo"></p>
		<p><span class="cuerpoo">Cuerpo</span> </br><textarea name="cuerpo" rows="40" cols="210"></textarea> </p>
		<p><input type="file" name="imagen" value="Seleccione su imagen"></p>
		<p><input type="submit" class="boton2"name="postear" value="Publicar"></p>
		<p>                    <a href="home.php" class="link">Volver a la pagina inicial</a><p>
	</form>
	<?php 
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$basedatos ="posts";

	$enlace=mysqli_connect($servidor,$usuario,$clave,$basedatos);

	if (!$enlace) {
		echo "Error de conexion";
	}

	if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK))) {
			
		$destinoruta="Imagenes/";
			
		move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoruta.$_FILES['imagen']['name']);
			
		echo "el archivo".$_FILES['imagen']['name']."se a subido correctamente";	
		}
		else
		{
			echo "el archivo no se copio";
		}
	
	
	$eltitulo=$_POST['titulo'];
	
	$fechaactual=date("Y-m-d H:i:s");
	
	$elcomentario=$_POST['cuerpo'];
	
	$laimagen=$_FILES['imagen']['name'];


	$miposteo="INSERT INTO publicaciones (titulo, fecha, comentario, imagen) VALUES ('".$eltitulo."','".$fechaactual."','".$elcomentario."','".$laimagen."')";

	$enviarformulatio=mysqli_query($enlace,$miposteo);

	if(isset($_POST['postear'])){
		header("Location:http://localhost/Proyecto/home.php");
	}

	mysqli_close($enlace);

	echo "<br/> Se agrego el post exitosamente <br/> <br/>";
 ?>
	</body>

</html>