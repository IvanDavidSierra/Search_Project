<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/responsive-styles.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">                                    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                            
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<header><!--Encabezado-->

    <div class="btn-menu"><!--boton menu-->
        <label> </label>
        <label for="btn-menu"> ☰ </label>
        <label> </label>
    </div>


    <div class="logo"></div>
        <img src="../../../img/logo.jpeg" alt="logo de search project">
        <p class="nombre-empresa">Search Project</p>
    

</header>
<!--menu lateral-->
<input type="checkbox" id="btn-menu">
<div class="container-menu"  style="height: 92.3%">
<div class="cont-menu" style="height: 92.3%">
<nav>
        <a href="../../../index.html"> 🏠 Inicio</a>
        <a href="../../../html/Iniciar Sesion.html"> 👤 Iniciar sesion </a>
        <a href="Seminarios.php"> 📚Seminarios</a>
        <a href="../../../html/Ayuda.html"> ❔ Ayuda</a>
        <hr></hr>
        <a href="#">Facebook</a>
        <a href="#">Youtube</a>
        <a href="#">Instagram</a>
    </nav>

<!-- <label for="btn-menu"> ✕ </label>-->
</div>
</div>
<!--fin menu lateral-->

<div class="row">
    <div class="col-md-2">
        <h3> </h3>
    </div>


   
   <?php /*nombre del boton que selcione el proyecto */
   if(isset($_GET['IdProyecto']))/*Traer id proyecto para el query-------------------------------------------*/
   {
   $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
   $IdP=$_GET['IdProyecto'];

   $Query ="SELECT * FROM  tblproyecto WHERE IdProyecto=$IdP";
   $resultado= mysqli_query($conex,$Query);
   if ($resultado) {
       while($filas = mysqli_fetch_array($resultado)) 
        {
           $NombreP=$filas["NombreProyecto"];
           $DescripcionP=$filas["DescripcionProyecto"];
           $Autor=$filas["Autores"];
           $Anio=$filas["Anio"];
           $NombreA=$filas["NombreArchivo"];


?>

   <div class="col-md-8">
   <br>
   <h4>Proyecto</h4>
   <h1><?php echo $NombreP ?></h1>
   <h4>Autor: <?php echo $Autor ?></h4>
   <h2><?php echo $DescripcionP ?></h2>
   <h4>Año: <?php echo $Anio ?></h4>
   <hr color="white"> </hr>
   <div class="download-project">
   <a href="../../DescargarProyectos.php?IdProyecto= <?php echo $IdP ?> & archivito=<?php echo $NombreA ?>"><button class="boton-perfil"> Descargar Proyecto </button>
        </div>
   <?php
        }
               } else {
                   echo "No se encontraron resultados";
               }
           }
   ?>


 

    </div>
    </div>
</div>

    </body>
</html>