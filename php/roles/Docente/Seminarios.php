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
            if($_SESSION['Rol']!=3)
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
    <title>Seminarios</title>
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
<body class="content">
<input type="checkbox" id="btn-menu">
<div class="container-menu" style="height: 250vh">
<div class="cont-menu" style="height: 250vh">
    <nav>
        <a href="index Docente.php"> 🏠 Inicio</a>
        <a href="Perfil Docente.php"> 👤 Perfil</a>
        <div class="row"><!--boton cerrar sesion-->
            <form action="../../../php/Inicio Sesion.php" method="POST">
                <div>
                    <button type="Submit" name="CerrarSesion" value="CERRAR SESION" class="boton-cerrar"> Cerrar sesión </button>
                </div>
            </form>
        </div>
            <a href="Ayuda Docente.php"> ❔ Ayuda</a>
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
        <br><br>
        <h1 style="margin-left: 20px;">Seminarios</h1>

        <hr style="color: #0F1D5D;">
       
        <?php
        $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');

        $busqueda="SELECT * FROM tblseminario";
        $ejecutar=mysqli_query($conex,$busqueda);
        $contador=0;

        while($filas=mysqli_fetch_array($ejecutar)){
        $IdS=$filas['IdSeminarios'];
        $seminario=$filas['NombreSeminario'];
        $descripcion=$filas['DescripcionSeminario'];
        $contador++;
        ?>


        <br>
        <div class="cartas-seminarios" style="font-family: Lustria;">
            <div class="card">
                <div class="header-cartas">
                    <div class="card-header" style="color: white; background-color: #0f1d5db2;">
                        <?php echo $seminario ?>
                    </div>
                </div>
            
                <div class="body-cartas">
                    <div class="card-body">
                        <p class="card-text"><?php echo $descripcion ?></p>
                    <a href="SeminarioPlantilla.php? IdSeminarios=<?php echo $IdS ?>" style="color: white; text-decoration: none;"><button style="background-color: #0F1D5D; padding: 8px 8px; border-radius: 8px;"> Ver proyectos </a></button>
                    </div>
                </div>
            
            </div>
        </div>
        <?php
        }
        ?>
        
    </div>

</body>
</html>

