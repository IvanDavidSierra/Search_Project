<?php
    $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
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
    $usuario=$_SESSION['IdUsuario'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Proyecto</title>

    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/responsive-styles.css">
    <!--<link rel="stylesheet" href="css/styles.css"> Link CSS-->


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
          <a href="index Estudiante.php"> 🏠 Inicio</a>
          <a href="Perfil Estudiante.php"> 👤 Perfil</a>
          <div class="row"><!--boton cerrar sesion-->
              <form action="../../../php/Inicio Sesion.php" method="POST">
                  <div>
                      <button type="Submit" name="CerrarSesion" value="CERRAR SESION" class="boton-cerrar"> Cerrar sesión </button>
                  </div>
              </form>
          </div>
                  <a href="Ayuda Estudiante.php"> ❔ Ayuda</a>
                  <a href="Seminarios.php"> 📚Seminarios</a>
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
      <form class="row g-3" method="POST" action="#" enctype="multipart/form-data">
        <div class="col-md-2">
          <h3> </h3>
        </div>

      <div class="col-md-8">
          <br>
          <h6 class="titulo-proyecto">Para subir tu proyecto, </h6>
          <p class="titulo-proyecto">Ingresa estos datos: </p>

          <br>

          <div class="nombre-cajas">
            <label for="inputText1" class="form-label">Nombre del proyecto</label>
            <div class="caja-proyecto"> <input type="text" class="form-control" id="" name="NombreProyectoh" required> </div>
          </div>  
           
          <br>
          
          <div class="nombre-cajas">
            <div class="form-floating caja-proyecto">
              <textarea class="form-control"  placeholder="Leave a comment here" id="" name="DescripcionPh" style="height: 100px" required></textarea>
              <label for="floatingTextarea2" > Breve descripción del proyecto</label>
            </div>
          </div>

          <br>
            <div class="nombre-cajas" style="font-family: Lustria; color: #0F1D5D;">
              <label for="inputSeminario" class="form-label">Seminario</label>
              <div class="caja-proyecto">
              <select id="inputSeminario" class="form-select" name="SeminariosH" required>

                <option selected value="">Seleccionar...</option>
            
                <?php
                //Consulta para que aparezcan los seminarios en el seleccionador
                //$conex = mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
                $busqueda="SELECT * FROM tblseminario";
                $ejecutar=mysqli_query($conex,$busqueda);
                $contador=0;

                while($filas=mysqli_fetch_array($ejecutar)){
                $IdS=$filas['IdSeminarios'];
                $seminario=$filas['NombreSeminario'];
                $contador++;
                ?>
                  <option value=<?php echo "$IdS"; ?>><?php echo $seminario; ?></option>
                  <?php 
                    }
                  ?>

                </select>
              </div>
            </div>
            <br>
          <div class="nombre-cajas">
            <label for="inputText1" class="form-label">Año</label>
            <div class="caja-proyecto"> <input type="text" class="form-control" id="" name="AnioPh" required></div>
          </div>  
          <br>
          <div class="nombre-cajas">
            <label for="inputText1" class="form-label">Autores</label>
            <div class="caja-proyecto"> <input type="text" class="form-control" id="" name="AutoresPh" required></div>
          </div>  
          <br>
          <!--Subir Proyecto-->
          <div class="nombre-cajas" style="font-family: Lustria; color: #0F1D5D;">
            <label for="inputSeminario" class="form-label nombre-cajas">Cargar proyecto (PDF): </label>
            <div class="caja-proyecto">
              <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="Archivoh">
              </div>
            </div>    
          </div>

          <button type= "submit" class="boton-perfil" name="SubirPH" > Subir Proyecto </button></div></form>

          
        </div>

        <div class="col-md-2">
          <h3> </h3>
        </div>

    
</body>
</html>


<?php

    if(isset($_POST['SubirPH']))
    {
        $Nombreproyecto= $_POST['NombreProyectoh']; 
        $Descripcionp= $_POST['DescripcionPh'];

        $NombreArchivo= $_FILES['Archivoh']['name'];    
        $TipoArchivo= $_FILES['Archivoh']['type'];
        $Archivo= $_FILES['Archivoh']['tmp_name'];

        $Autores= $_POST['AutoresPh'];
        $Seminario=$_POST['SeminariosH'];
        $Aniop=$_POST['AnioPh'];

        $ruta="../../../proyectos_subidos/";

        move_uploaded_file($Archivo, $ruta.$NombreArchivo);

        $insertar="INSERT INTO tblproyecto (NombreProyecto, DescripcionProyecto, Autores, Seminario, Anio, NombreArchivo,TipoArchivo,ArchivoProyecto) VALUES ('$Nombreproyecto', '$Descripcionp','$Autores','$Seminario','$Aniop','$NombreArchivo','$TipoArchivo','$ruta$NombreArchivo')";

        $resultado=mysqli_query($conex, $insertar);

        if($resultado)
        {
            $id_ultimo_registro=mysqli_insert_id($conex);

            $actualizar="UPDATE tblusuarios set Proyecto=$id_ultimo_registro where IdUsuario=$usuario";
            $resultado=mysqli_query($conex,$actualizar);
            if($resultado){
                echo "<script>
                    alert('Proyecto subido correctamente');
                    window.location.replace('Seminarios.php');
                </script>";
            }
            else{
                echo "<script>
                alert('Error al subir archivo');
                window.location.replace('Subirproyecto.php');
                </script>";
            }
        }  
    }
    ?>