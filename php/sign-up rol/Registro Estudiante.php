<?php
    //include ('Validacion.php');
    $conex = mysqli_connect('localhost','root','','searchproject');

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
                window.location.replace("../../html/Iniciar Sesion.html");
                alert("¡Te has registrado correctamente!");
                </script>');

            }
        }
        else
        {
            echo('<script>
                window.location.replace("../../html/roles/Estudiante/Registro Estudiante.html");
                alert("¡Algo ha ocurrido!");
            </script>');
        }
    }
    else{
        echo('<script>
            alert("¡Las contraseñas no coinciden! Intente nuevamente");
            window.location.replace("../../html/roles/Estudiante/Registro Estudiante.html");
            </script>');
    }
}
?>