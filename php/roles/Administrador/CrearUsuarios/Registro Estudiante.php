<?php 
session_start();
if(!isset($_SESSION['Rol']))
    {
        echo '<script>
            window.location.replace("../../../../html/Iniciar Sesion.html");
        </script>';
    }
    else
    {
        {
            if($_SESSION['Rol']!=1)
            {
                echo '<script>
                    window.location.replace("../../../../html/Iniciar Sesion.html");
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
    <title>Registro</title>
    <link rel="stylesheet" href="../../../../css/styles.css"> 
    <link rel="stylesheet" href="../../../../css/responsive-styles.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">                                    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                            
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">        
     <!-- ↥ Para tener la fuente "Lustria"-->


     <!--pal' boostrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head>
<body>
    <header>  <!--Encabezado-->
        <div class="logo"></div>
        <img src="../../../../img/logo.jpeg" alt="logo de search project">
        <h2 class="nombre-empresa">Search Project</h2>
    </header>
   
    <!--Formulario sacado de Boostrap 🤑-->


    <div class="row">


    <form class="row g-3" method="POST" action="#">
      <div class="col-md-2">
        <h3> </h3>
      </div>


      <div class="col-md-4">
          <br>
          <div class="titulo-signup">
          <h1 style="font-family: Lustria; margin-top: 20px; font-size: 20pt; margin-bottom: 5px; margin-top: -30px">Para registrarte ingresa tus datos</h1>
          </div>

            <div class="nombre-cajasR"><label for="inputText1" class="form-label">Nombre</label></div>
            <div class="cajas-formulario"> <input type="text" class="form-control" id="inputText1" name="Nombre" required></div>
           
            <div class="nombre-cajasR"><label for="inputText2" class="form-label">Usuario</label></div> 
            <div class="cajas-formulario"> <input type="text" class="form-control" id="inputText2" name="Usuario" required> </div>
  
            <div class="nombre-cajasR"><label for="inputEmail" class="form-label">Correo</label></div>
            <div class="cajas-formulario"> <input type="text" class="form-control" id="inputEmail" name="Correo" required></div>

            <div class="nombre-cajasR"><label for="inputPassword1" class="form-label">Contraseña</label></div> 
            <div class="cajas-formulario"> <input type="password" class="form-control" id="inputPassword1" name="Password" required></div>
           
            <div class="nombre-cajasR"><label for="inputPassword2" class="form-label">Confirmar contraseña</label></div>
            <div class="cajas-formulario"> <input type="password" class="form-control" id="inputPassword2" name="Confirm_Password" required> </div> 
   
          <div class="col-md-1">
            <h3> </h3>
          </div>
 

      <div class="boton-registro">
          <button type="submit"  class="btn btn-primary" style="margin-top: 10px; font-family: Lustria; background-color: #0F1D5D; color:#FDFAFF;" name="registrar">Registrarse</button>
      </div></div>

    
  </div> <!--Fin formulario-->
</form> 
   
     
      <div class="col-md-1">
        <h3> </h3>
      </div>
      
    </div>
</body>
</html>


<?php
    $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
    if(isset($_POST['registrar']))
    {
        $nombre= trim($_POST['Nombre']);
        $usuario= trim($_POST['Usuario']);
        $correo= trim($_POST['Correo']);
        $contraseña= md5($_POST['Password']);
        $confirm_pass= md5($_POST['Confirm_Password']);

    if($contraseña==$confirm_pass)
    {
        $registro_d="INSERT INTO tbldatospersonales (NombreCompleto, Correo) VALUES ('$nombre','$correo')";
        $ejecutar=mysqli_query($conex,$registro_d);

        $correo= trim($_POST['Correo']);

        $id_datos="SELECT IdDatosPersonales FROM tbldatospersonales WHERE Correo='$correo'";
        $ejecutar1=mysqli_query($conex,$id_datos);
        $datos=mysqli_fetch_column($ejecutar1);
        if($ejecutar)
        {
            $registro="INSERT INTO tblusuarios (NombreUsuario,Contrasena,Rol,Activo,DatosPersonales) VALUES ('$usuario','$contraseña','4','1',$datos)";
            $ejecutar=mysqli_query($conex,$registro);
            
            if($ejecutar)
            {
                echo ('<script>
                window.location.replace("../Perfil Admin.php");
                alert("Usuario registrado correctamente");
                </script>');

            }
        }
        else
        {
            echo('<script>
                window.location.replace("Registro Estudiante.php");
                alert("¡Algo ha ocurrido!");
            </script>');
        }
    }
    else{
        echo('<script>
            alert("¡Las contraseñas no coinciden! Intente nuevamente");
            window.location.replace("Registro Estudiante.php");
            </script>');
    }
}
        
?>