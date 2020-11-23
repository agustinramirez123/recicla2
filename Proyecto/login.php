<html lang="es">
	<head>
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
		<meta charset="UTF-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<script src="https://kit.fontawesome.com/e2678f7743.js" ></script>
	</head>
	<body>
        <form class="formulario"  name="alfajor" method="POST" >
			<h1>Iniciar Sesión</h1>	
			<div class="contenedor">

			</div>
			<div class="entrada-contenedor">
				<i class="fas fa-user icon"></i>
				<input type="text"  name="nombre"placeholder="Nombre de usuario">
			</div>
			<div class="entrada-contenedor">
				<i class="fas fa-lock icon"></i>
				<input type="password" name="contraseña"placeholder="Contraseña">
			</div>
			<input type="submit" name="inicio"value="Iniciar sesión" class="boton">
			<p>¿Todavia no tienes una cuenta? <a href="Register.php" class="link">Registrate</a> </p>
			<p><a href="home2.php" class="link">Volver a pagina principal</a></p>
		
		<?php 
			if(isset($_POST['inicio'])){
			$nombre=$_POST["nombre"];
			$contraseña=md5($_POST["contraseña"]);
		}
			$miconsulta= "SELECT * FROM datosusuarios ORDER BY id";
    	$resultado=mysqli_query($enlace, $miconsulta);
    	if($resultado){
    		if(isset($_POST['inicio'])){
     	 while ($registro=mysqli_fetch_assoc($resultado)) {
     	 	
     	 	if ($nombre==$registro['usuario'] && $contraseña==$registro['contraseña']) {
     	 		header("Location:home.php");
     	 	}
     	 	elseif ($nombre!=$registro['usuario']) {
     	 		echo "<div class=error> No existe el nombre de usuario  </span>";
     	 		break;
     	 	}
     	 	elseif ($contraseña!=$registro['contraseña']) {
     	 		echo "<div class=error> Contraseña incorrecta </span>";
     	 		break;
     	 	}
     	 }
      }
    }


		 ?>
	</form>
	</body>
</html>