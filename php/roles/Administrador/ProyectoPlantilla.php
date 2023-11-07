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
<div class="container-menu" style="height: 95.2%">
<div class="cont-menu" style="height: 95.2%">
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
        <a href="Seminarios.php"> 📚Seminarios</a>
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
        <h3> </h3>
    </div>

      
   <?php /*nombre del boton que selcione el proyecto */
   if(isset($_GET['IdProyecto']))/*Traer id proyecto para el query-------------------------------------------*/
   {
   $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
   $IdP=$_GET['IdProyecto'];

   $consultaSeminario="SELECT Seminario FROM tblproyecto where IdProyecto=$IdP";
   $ejecutar1=mysqli_query($conex,$consultaSeminario);
   $idS=mysqli_fetch_column($ejecutar1);

   $Query ="SELECT * FROM  tblproyecto WHERE IdProyecto=$IdP";
   $resultado= mysqli_query($conex,$Query);
   if ($resultado) {
       while($filas = mysqli_fetch_array($resultado)) 
        {
           $NombreP=$filas["NombreProyecto"];
           $DescripcionP=$filas["DescripcionProyecto"];
           $Autor=$filas["Autores"];
           $Anio=$filas["Anio"];
           $NombreA=$filas['NombreArchivo'];
?>

   <div class="col-md-8">
   <br>
   <?php
   ob_start();
   ?>
   <h4>Proyecto</h4>
   <h1><?php echo $NombreP ?></h1>
   <h4>Autor: <?php echo $Autor ?></h4>
   <h2><?php echo $DescripcionP ?></h2>
   <h4>Año: <?php echo $Anio ?></h4>

   <br> 
   <br>
   <!-- Boton para editar -->
   <div class="boton-editar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #0F1D5D; font-family: Lustria; border: black;">
            Editar
            </button>
        </div>

        <!-- Modal para editar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Editar proyecto </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                
                <div class="nombre-cajasR"><label for="inputText1" class="form-label"> Nombre proyecto </label></div>
                <div class="cajas-formulario"><input type="text" class="form-control" id="inputText1" name="NombreP" value="<?php echo $NombreP ?>"></div>

                <div class="nombre-cajasR"><label for="inputPassword1" class="form-label">Autores</label></div> 
                <div class="cajas-formulario"> <input type="text" class="form-control" id="inputPassword1" name="AutoresP" value="<?php echo $Autor  ?>"></div>

                <div class="nombre-cajasR"><label for="inputEmail" class="form-label">Descripcion proyecto</label></div>
                <div class="cajas-formulario"><textarea class="form-control" id="inputEmail" name="DescripcionP"><?php echo $DescripcionP ?></textarea></div>

                <div class="nombre-cajasR"><label for="inputPassword1" class="form-label">Año</label></div> 
                <div class="cajas-formulario"> <input type="text" class="form-control" id="inputPassword1" name="AñoP" value="<?php echo $Anio ?>"></div>
            
            </div>

            <div class="modal-footer" style="font-family: Lustria;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" > Cerrar </button>
                <button type="submit" class="btn btn-primary" style="background-color: #0F1D5D;" name="editar" value="editar"> Editar </button>
            </div>
            </div>
        </div>
        </div>


        <!-- Boton para el modal -->
       <div class="boton-eliminar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #800707; border: none; font-family: Lustria;">
            Eliminar
            </button>
        </div>

        <!-- Modal --> 
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel1">Eliminar proyecto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                
                <form method="POST">
                
                <div class="nombre-cajasR" style="color: black;"><label for="inputText1" class="form-label"> ¿Esta seguro que desea borrar el proyecto? </label></div>
                </div>
                
            <div class="modal-footer" style="font-family: Lustria;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #0F1D5D;" > No </button>
                <button type="submit" class="btn btn-primary" style="background-color: #800707;" name="delete" value="delete"> Sí </button>
            </div>
            </form>
            </div>
        </div>
        </div>
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
<?php
   //Editar seminarios
if(isset($_POST['editar'])){
    $NombreP= $_POST['NombreP'];
    $AutoresP= $_POST['AutoresP'];
    $DescripcionP= $_POST['DescripcionP'];
    $AñoP= $_POST['AñoP'];
    $actualizar="UPDATE tblproyecto set NombreProyecto='$NombreP', Autores='$AutoresP',DescripcionProyecto='$DescripcionP', Anio='$AñoP' WHERE IdProyecto=$IdP";
    $ejecutar=mysqli_query($conex,$actualizar);

    if($ejecutar){
        echo '<script>
            alert("Proyecto editado correctamente");
        </script>';
        header("Location: ProyectoPlantilla.php? IdProyecto=$IdP");
    }
    else{
        echo '<script>
            alert("Error al editar seminario");
        </script>';
    }
}
unset($_POST['editar']);



if(isset($_POST['delete'])){
    $consulta="SELECT IdUsuario FROM tblusuarios WHERE Proyecto=$IdP";
    $ejecutar=mysqli_query($conex,$consulta);
    $id=mysqli_fetch_column($ejecutar);

    if(!empty($id)){
        $quitar_relacion="UPDATE tblusuarios set Proyecto=NULL WHERE IdUsuario=$id";
        $eliminar="DELETE FROM tblproyecto WHERE IdProyecto=$IdP";
        $ejecutar=mysqli_query($conex,$quitar_relacion);
        $eliminar=mysqli_query($conex,$eliminar);

        if($ejecutar && $eliminar){
            echo '<script>
                alert("Proyecto eliminado correctamente");
                window.location.replace("SeminarioPlantilla.php?IdSeminarios=' . $idS . '");
            </script>';
            exit();

        }
    }else{
        $eliminar="DELETE FROM tblproyecto WHERE IdProyecto=$IdP";
        $ejecutar=mysqli_query($conex,$eliminar);
        if($ejecutar){
            echo '<script>
                alert("Proyecto eliminado correctamente");
                window.location.replace("SeminarioPlantilla.php?IdSeminarios=' . $idS . '");
            </script>';
            exit();        
        }
    }
}
    
?>