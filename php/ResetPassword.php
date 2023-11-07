<?php
    include_once('Conexion.php');
    $conex = mysqli_connect('localhost','root','','searchproject');

    $token=$_POST['Token'];
    $pass=md5($_POST['Password']);
    $confirm_pass=md5($_POST['Confirm_Password']);

    $consulta="SELECT IdDatosPersonales FROM tbldatospersonales WHERE tokens='$token'";
    $ejecutar=mysqli_query($conex,$consulta);
    $correo=mysqli_fetch_column($ejecutar);

        if($correo) 
        {   
            if($pass==$confirm_pass){
                
                $actualizar_pass="UPDATE tblusuarios SET Contrasena='$pass' WHERE DatosPersonales='$correo'";
                $ejecutar=mysqli_query($conex,$actualizar_pass);
                if($ejecutar){
                    echo "<script>
                    window.location.replace('../html/Iniciar Sesion.html');
                    alert('¡Contraseña cambiada!');
                </script>";
                    
                }
                else{
                    echo "<script>
                        window.location.replace('../html/ResetPassword.html');
                        alert('Error en el cambio de contraseña');
                    </script>";
                }
            }
            else{
                echo "<script>
                window.location.replace('../html/ResetPassword.html');
                alert('Las contraseñas no coinciden');
            </script>";
            }
    
        }else{
            echo "<script>
                window.location.replace('../html/ResetPassword.html');
                alert('Token no valido, intente de nuevo');
            </script>";
        }

        //pa eliminar el token (no se puede eliminar como tal, asi que hago que el campo dentro de la tabla se vacie)
        $eliminar_token="UPDATE tbldatospersonales SET tokens=NULL WHERE IdDatosPersonales=$correo";
        $ejecutar=mysqli_query($conex,$eliminar_token);

?>