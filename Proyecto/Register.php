
<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$basedatos ="registros";

	$enlace=mysqli_connect($servidor,$usuario,$clave,$basedatos);

	if (!$enlace) {
		echo "Error de conexion";
	}
?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">	
		<script src="https://kit.fontawesome.com/e2678f7743.js" ></script>
	</head>
	<body>
		<form class="formulario" name="formulario" method="POST">
			<h1>Registrarse</h1>	
			<div class="contenedor">

			</div>
			<div class="entrada-contenedor">
				<i class="fas fa-user icon"></i>
				<input type="text" placeholder="Nombre de usuario" name="nombre">
			</div>
			<div class="entrada-contenedor">
				<i class="fas fa-lock icon"></i>
				<input type="password" placeholder="Contraseña" name="contraseña">
			</div>
			<div class="entrada-contenedor">
				<i class="fas fa-envelope icon"></i>
				<input type="text" placeholder="Correo electronico" name="correo">
			</div>
			<input type="submit" name="registro"value="Registrate" class="boton">
			<p>¿Ya tienes una cuenta? <a href="login.php" class="link">Iniciar sesión</a></p>
			<p>                 <a class="link"href="home.php">Volver a la pagina principal</a></p>
		</form>
	</body>
</html>
<?php
	if(isset($_POST['registro'])){
		$nombre=$_POST["nombre"];
		$contraseña=$_POST["contraseña"];
		$correo=$_POST["correo"];
		

		$enviardatos = "INSERT INTO datosusuarios(usuario,contraseña,correo) VALUES('$nombre','$contraseña','$correo')";

		$ejecutareEnviar = mysqli_query($enlace,$enviardatos);
		if (!$ejecutareEnviar) {
			echo "Error en envio de datos";
			# code...
		}
	}
?>