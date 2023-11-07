<?php
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
    
    $usuario=$_SESSION['IdUsuario']; //Extraer nombre de usuario del inicio de sesion

    $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');

    $consulta="SELECT DatosPersonales FROM tblusuarios WHERE IdUsuario='$usuario'"; //Extraer ID relacionado en la tabla usuarios 
    $ejecutar=mysqli_query($conex,$consulta);
    $DatosPersonales=mysqli_fetch_column($ejecutar);

    $datos_perfil="SELECT * FROM tbldatospersonales WHERE IdDatosPersonales=$DatosPersonales";
    $ejecutar=mysqli_query($conex, $datos_perfil);
    while($filas=mysqli_fetch_array($ejecutar)){
        $Nombre=$filas['NombreCompleto'];
        $Correo=$filas['Correo'];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
<div class="container-menu">
<div class="cont-menu">
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
        <a href="Seminarios.php"> 📚Seminarios</a>
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

<body>

    <div class="foto">
    <img src="../../../img/PERFIL.png" style="width: 230px; height: 230px;">
    </div>

    <div class="nombre-usuario">
        <h1><?php echo $Nombre; ?></h1>
    </div>

    <div class="nombre-rol">
        <p>Docente</p>
    </div>

    <div class="titulo-correo">
        <p>Correo</p>
    </div>

    <div class="nombre-correo">
        <p><?php echo $Correo; ?></p>
    </div>

    <!-- <button class="boton-perfil" href="#">Configurar cuenta</button> -->
    <!-- Button trigger modal -->
    <button type="button" class="boton-perfil" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Configurar cuenta
    </button>

    <!-- Modal -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: Lustria;">Actualizar datos</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="#" >

            <div class="nombre-cajasR"><label for="inputText1" class="form-label">Nombre</label></div>
            <div class="nombre-cajasR"><label for="inputText1" class="form-label" style="color: gray;"><?php echo $Nombre ?></label></div>
           
            <div class="nombre-cajasR"><label for="inputEmail" class="form-label">Correo</label></div>
            <div class="cajas-formulario"> <input type="text" class="form-control" id="inputEmail" name="Correo" required></div>

            <div class="nombre-cajasR"><label for="inputPassword1" class="form-label">Contraseña</label></div> 
            <div class="cajas-formulario"> <input type="password" class="form-control" id="inputPassword1" name="Contraseña" required></div>
           
            <div class="nombre-cajasR"><label for="inputPassword2" class="form-label">Confirmar contraseña</label></div>
            <div class="cajas-formulario"><input type="password" class="form-control" id="inputPassword2" name="Confirmar_Contra" required> </div> 

            

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-family: Lustria;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="font-family: Lustria; background-color:#0F1D5D;" name="actualizar">Guardar datos</button>
        </form>  
        </div>
        </div>
    </div>
    </div>

</body>

</html>

<?php
//Actualizar datos 
        $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');

        if(isset($_POST['actualizar'])){
            $Correo=$_POST['Correo'];
            $pass=md5($_POST['Contraseña']);
            $Confirm_Pass=md5($_POST['Confirmar_Contra']);


        $actualizar="UPDATE tbldatospersonales SET Correo='$Correo' WHERE IdDatosPersonales=$DatosPersonales";
        $result=mysqli_query($conex, $actualizar);

        if($pass==$Confirm_Pass){
            $actualizar_pass="UPDATE tblusuarios SET Contrasena='$pass' WHERE DatosPersonales=$DatosPersonales";
            $result_pass=mysqli_query($conex, $actualizar_pass);
        }

        if($result && $result_pass)
        {
            echo "<script>
            window.location.replace('Perfil Docente.php');
            </script>"; 
        }
        }

?>