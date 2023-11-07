<?php
    include_once '../../Conexion.php';
    session_start();
    if(!isset($_SESSION['Rol']))
    {
        echo '<script>
            window.location.replace("../../../html/Iniciar Sesion.html");
        </script>';
    }
    else
    {
        {
            if($_SESSION['Rol']!=4)
            {
                echo '<script>
                    window.location.replace("../../../html/Iniciar Sesion.html");
                </script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Project</title>

    <link rel="stylesheet" href="../../../css/styles.css"> <!--Link CSS-->
    <link rel="stylesheet" href="../../../css/responsive-styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> <!--Boostrap-->

    <link rel="preconnect" href="https://fonts.googleapis.com">                                    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                            
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet"> <!--Fuente Lustria-->
</head>
<body>

<header><!--Encabezado-->

            <div class="btn-menu"><!--boton menu-->
                <label> </label>
			    <label for="btn-menu"> ☰ </label>
                <label> </label>
            </div>
        
   
            <div class="logo"></div>
                <img src="../../../img/logo.jpeg" alt="logo de search project">
                <h2 class="nombre-empresa">Search Project</h2>
        
        
</header>
<!--menu lateral-->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
<div class="cont-menu">
    <nav>
      <a href="Perfil Estudiante.php"> 👤 Perfil</a>
      <div class="row"><!--boton cerrar sesion-->
          <form action="../../../php/Inicio Sesion.php" method="POST">
              <div>
                  <button type="Submit" name="CerrarSesion" value="CERRAR SESION" class="boton-cerrar"> Cerrar sesión </button>
              </div>
          </form>
      </div>
      <a href="Seminarios.php"> 📚Seminarios</a>
      <a href="Ayuda Estudiante.php"> ❔ Ayuda</a>
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
        <h3> <h3>
    </div> 
    
    <div class="col-md-8">
        <br> 
        <h1 style="font-family: Lustria; color: #0F1D5D;"align="center"> Bienvenido a Search Project <h1>

            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner" style="z-index: -1;">
                  <div class="carousel-item active">
                    <img src="../../../img/caruseluno.jpeg" class="d-block w-100" alt="carruseluno">
                  </div>
                  <div class="carousel-item">
                    <img src="../../../img/carruseldos.jpg" class="d-block w-100" alt="carruseldos">
                  </div>
                  <div class="carousel-item">
                    <img src="../../../img/caruseltres.jpeg" class="d-block w-100" alt="carruseltres">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Siguiente</span>
                </button>
              </div>

              <hr color="white"> </hr>
             <!--barra busqueda 
        <div class="buscador">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder=" " aria-label="Recipient's username" aria-describedby="button-addon2" style="border: 4px solid #0F1D5D;">
            <button class="btn btn-outline-primary bg-$blue-900" type="button" id="button-addon2" style="border: 4px solid #0F1D5D;">🔍</button>
        </div>
      </div>-->

      <div style="margin: 0 auto; font-family: Lustria; color: #0F1D5D;">
        <h2>Search Project es un aplicativo web que tiene como función almacenar los proyectos de grado del colegio americano de Bogotá para que puedas consultarlos aqui y ahora.</h2>
      </div>

    
</div>
</div>
       
<!--style="background-color: #0f1d5d62"-->