<?php
    include_once '../../Conexion.php';
    session_start();
    $conexion=mysqli_connect('localhost','root','','searchproject') or die ('problemas en la conexion');
    if(!isset($_SESSION['Rol']))
    {
        echo '<script>
            window.location.replace("../../../html/Iniciar Sesion.html");
        </script>';
    }
    else
    {
        {
            if($_SESSION['Rol']!=1)
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
        <a href="index Admin.php"> 🏠 Inicio</a>
        <a href="Perfil Admin.php"> 👤 Perfil</a>
        <div class="row"><!--boton cerrar sesion-->
            <form action="../../../php/Inicio Sesion.php" method="POST">
                <div>
                    <button type="Submit" name="CerrarSesion" value="CERRAR SESION" class="boton-cerrar"> Cerrar sesión </button>
                </div>
            </form>
        </div>
        <a href="AdminTabla.php">📋 Admin Dashboard</a>
            <a href="Ayuda Admin.php"> ❔ Ayuda</a>
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

       <!-- Boton para el modal -->
       <div class="boton-crear">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #0F1D5D; font-family: Lustria;">
            Crear
            </button>
        </div>

        <!-- Modal --> 
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear nuevo seminario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#" >
                
                <div class="nombre-cajasR"><label for="inputText1" class="form-label"> Nombre seminario </label></div>
                <div class="cajas-formulario"><input type="text" class="form-control" id="inputText1" name="NombreSeminario" required></div>
            
                <div class="nombre-cajasR"><label for="inputEmail" class="form-label">Descripcion seminario</label></div>
                <div class="cajas-formulario"><textarea class="form-control" id="inputEmail" name="Descripcion" required></textarea></div>

                <div class="nombre-cajasR"><label for="inputPassword1" class="form-label">Nombre director</label></div> 
                <div class="cajas-formulario"> <input type="text" class="form-control" id="inputPassword1" name="Director" required></div>
            
                </div>
            <div class="modal-footer" style="font-family: Lustria;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
                <button type="submit" class="btn btn-primary" style="background-color: #0F1D5D;" name="Crear"> Crear </button>
            </div>
            </div>
        </div>
        </div>

        
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

<?php
    $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
    //Crear seminarios 
    if(isset($_POST['Crear'])){
        $Nombre=$_POST['NombreSeminario'];
        $Descripcion=$_POST['Descripcion'];
        $Director=$_POST['Director'];

    $crear="INSERT INTO tblseminario (NombreSeminario, DescripcionSeminario, DirectorSeminario) VALUES ('$Nombre', '$Descripcion', '$Director')";
    $resultado=mysqli_query($conex, $crear);

    if($resultado)
    {
        echo "<script>
        alert('¡Seminario creado!');
        window.location.replace('Seminarios.php');
        </script>"; 
    }else{
        echo "<script>
        alert('Error al crear seminario');
        window.location.replace('Seminarios.php');
        </script>"; 
    }
}  
?>