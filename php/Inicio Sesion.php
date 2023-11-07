<?php
        include_once 'Conexion.php';
        session_start(); # no se que hace


        if(isset($_POST['CerrarSesion']))
        {
            include_once 'Cerrar.php'; # <?php  session_unset();
        }


        if(isset($_SESSION['Rol']))
        {
            echo 'entre';
            switch($_SESSION['Rol'])
            {
                case 1:
                    header('Location: roles/Administrador/index Admin.php');
                    break;
                case 2:
                    header('Location: roles/Docente Jurado/index Docente Jurado.php');
                    break;
                case 3:
                    header('Location: roles/Docente/index Docente.php');
                    break;
                case 4:
                    header('Location: roles/Estudiante/index Estudiante.php');
                    break;
                default :
                    echo 'primero';
                    break;  
            }
        }




    if(isset($_POST['Nombre']) && isset($_POST['Clave']))
    {
        $nombre = $_POST['Nombre'];  
        $contrasena = md5($_POST['Clave']);
        $bd = new Database();
        $estado = 0;

        $Query = $bd -> connectar() -> prepare('SELECT * FROM tblusuarios WHERE NombreUsuario=:Nombre AND Contrasena=:Clave');
        # NombreUsuario y Contraseña tal cual nombrados en la bd = al de php y la variable
        $Query -> execute (['Nombre' => $nombre, 'Clave' => $contrasena]);

        $arreglofila = $Query -> fetch(PDO::FETCH_NUM);

        
      if($arreglofila == true)
      {
        $estado = $arreglofila[3];
            if($estado == 1)
            {
               
                        $rol = $arreglofila[5];
                        $_SESSION['Rol'] = $rol;

                        
                        switch($rol)
                        {
                            case 1:
                                header('Location: roles/Administrador/index Admin.php');
                                break;
                            case 2:
                                header('Location: roles/Docente Jurado/index Docente Jurado.php');
                                break;
                            case 3:
                                header('Location: roles/Docente/index Docente.php');
                                break;
                            case 4:
                                header('Location: roles/Estudiante/index Estudiante.php');
                                break;
                            default :
                                echo 'Opcion no valido';
                                break;
                        }
                        //info de la columna tabla usuario

                        $usuario = $arreglofila[0];
                        $_SESSION['IdUsuario'] = $usuario;

                    }
                    else
                    {
                        echo ('
                        <script language="javascript">
                        window.location.replace("../html/Iniciar Sesion.html");
                        alert("Este usuario no esta activo, contacte con el administrador");
                        </script>');
                }
                
            }
            else
            {
                echo ('
                <script language="javascript">
                window.location.replace("../html/Iniciar Sesion.html");
                alert("Usuario y contraseña incorrectos");
                </script>');
            }
      }
      

        
?>