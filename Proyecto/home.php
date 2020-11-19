<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-COMPATIBLE" content=" ie=edge">
    <title>Sitio de reciclaje</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
  
<img src='logo.jpg' class='imgRedonda'><header>Recicla2</header>
  <br>
  <br>
  
    <a class="boton3" href="login.php">Iniciar Sesion</a>
    <a class="boton4" href="Register.php">Crear Usuario</a>
    <a class="boton5" href="post.php">Postear</a>
    <a class="boton6"href="Noticias.php ">Noticias</a>
    <br>
    <br>
    <br>
    <br>
    <br>  
    <div class="formu"> 
  <br>
  <br>
  
  <?php 
  $servidor="localhost";
  $usuario="root";
  $clave="";
  $basedatos ="posts";


  $enlace=mysqli_connect($servidor,$usuario,$clave,$basedatos);

  if (!$enlace) {
    echo "Error de conexion";
  }

    $miconsulta= "SELECT * FROM publicaciones ORDER BY fecha DESC";
    $resultado=mysqli_query($enlace, $miconsulta);
    if($resultado){

      while ($registro=mysqli_fetch_assoc($resultado)) {

        if ($registro['titulo'] !="") {

       
        echo "<div class=publicaciontitulo><p>".$registro['titulo']."</p></div> ";
        if ($registro['imagen'] !="") {
          echo "<div class=imagenes> <img src='Imagenes/".$registro['imagen']."' height='500px' height width='700px'/></div></br>";
        }
        echo "<div class= publicacionescuerpo><p>".$registro['comentario']."</p></div>";
        echo "<div class= publicaciones><h4>".$registro['fecha']."</h4></div>";

        echo "<hr/>";
        }

      }
    }
    
   ?>
</div>

   


</body> 

 </html>