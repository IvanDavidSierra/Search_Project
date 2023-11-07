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
    <title> Validacion </title>
    <link rel="stylesheet" href="../../../../css/styles.css">
    <link rel="stylesheet" href="../../../../css/responsive-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">                                    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                            
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">    
</head>
<body>

<header>  <!--Encabezado-->
        <div class="logo"></div>
        <img src="../../../../img/logo.jpeg" alt="logo de search project">
        <h2 class="nombre-empresa">Search Project</h2>
</header>


<form method ='POST' action ='#'>
<div class="row"><!--Bienvenido-->

    <div class="col-md-1">
            <h3>  </h3>
    </div>

<div class="cont-login">
        <div class="col-md-5">
            <h1><font color = "#0B0B61"><br><br> Valide si el usuario pertenece a la institucion </font></h1>
            <br>

            <div class="form-login">
            <div class="input-group"><!--caja user-->
            
                    <span class="input-group-text" id="basic-addon1" style="border: 4px solid #0F1D5D">🔣</span>
    
                    <input type="text" name = 'Codigo' class="form-control" placeholder="Ingrese codigo" aria-describedby="basic-addon1" required style="border: 4px solid #0F1D5D">
        
            </div>


            <br>

            <div class="posicion-rol">
                <div style="font-family: Lustria; color: #0F1D5D;">
                  <label for="inputSeminario" class="form-label" style="font-size: 20px; position: relative; left: 50px;">Seleccione su rol ⤵️</label>
                  <select id="inputSeminario" class="form-select" style="border: 4px solid #0F1D5D; margin-bottom: 10px; position: relative; left: 50px;" name='RolC'>
                    <option selected>Seleccionar...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Docente Jurado</option>
                    <option value="3">Docente</option>
                    <option value="4">Estudiante</option>  
                  </select>
                </div>
              </div>

            <br>
            <div class="boton-login">
                <div class="col-md-4"><!--boton inicio sesion-->
                        <button type="submit" class="btn btn-outline-primary" style="background-color: #0F1D5D; color:#FDFAFF; position: relative; left: 100px;" name="validar"> Validar </button>
                </div>
            </div>    

         
</div>
</form>

    
    <div class="col-md-6">
        <div class="Biblioteca"><!--imagen biblioteca-->
            <img src="../img/biblioteca.jpeg" alt="logo de search project">
        </div>
    </div>

</div>
     



</body>
</html>

<?php

    include_once '../../../ConexionC.php';
    #validacion base de datos del colegio

    if(isset($_POST['validar'])){
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
                    window.location.replace("Registro Admin.php");
                    </script>');
                    break;
                case 2:
                    echo ('<script>
                    window.location.replace("Registro Docente Jurado.php");
                    </script>');
                    break;
                case 3:
                    echo ('<script>
                    window.location.replace("Registro Docente.php");
                    </script>');
                    break;
                case 4:
                    echo ('<script>
                    window.location.replace("Registro Estudiante.php");
                    </script>');
                    break;
            }
        }
        else{
            echo ('<script>
            alert("Usuario no encontrado");
            window.location.replace("ValidacionC Admin.php");
            </script>');
        }
    }
    }
    
  
?>