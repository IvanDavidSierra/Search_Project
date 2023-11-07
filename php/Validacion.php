<?php
    include_once 'ConexionC.php';
#validacion base de datos del colegio

    if(isset($_POST['Codigo']) && isset($_POST['RolC']))
    {
        $codigo = $_POST['Codigo'];  
        $Rolc= $_POST['RolC'];
        $bdC = new Database();
        
        $Queryc = $bdC -> connectar() -> prepare('SELECT * FROM tblcodigo WHERE IdCodigo=:Codigo AND Rolc=:RolC');
        # NombreUsuario y Contraseña tal cual nombrados en la bd = al de php y la variable
        $Queryc -> execute (['Codigo' => $codigo, 'RolC' => $Rolc]);

        $arreglofila = $Queryc -> fetch(PDO::FETCH_NUM);

        if($arreglofila == true)
        {
            switch($Rolc)
            {
                case 1:
                    echo ('<script>
                    window.location.replace("../html/roles/Administrador/Registro Administrador.html");
                    </script>');
                    break;
                case 2:
                    echo ('<script>
                    window.location.replace("../html/roles/Docente Jurado/Registro Docente Jurado.html");
                    </script>');
                    break;
                case 3:
                    echo ('<script>
                    window.location.replace("../html/roles/Docente/Registro Docente.html");
                    </script>');
                    break;
                case 4:
                    echo ('<script>
                    window.location.replace("../html/roles/Estudiante/Registro Estudiante.html");
                    </script>');
                    break;
            }
        }
        else{
            echo ('<script>
            alert("Usuario no encontrado");
            window.location.replace("../html/ValidacionC.html");
            </script>');
        }
    }
  
?>