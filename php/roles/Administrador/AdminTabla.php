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

<html>
    
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard</title>
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
</div>
            </header>

<!--menu lateral-->


<body>

<input type="checkbox" id="btn-menu">
<div class="container-menu">
<br>
<br>
<div class="cont-menu">
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
        <h3> <h3>
    </div> 
    <div class="col-md-8">
        <?php
        if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
        if (!isset($_POST['Rol'])){$_POST['Rol'] = '';}
        
        ?>
  
        <div class="container mt-5">
            <div class="col-12">
         
        
        
        <div class="row">
        <div class="col-12 grid-margin">
        <div class="card">
        <div class="card-body">
        
                <h4 class="card-title">Buscador</h4>
        
        
        <form id="form2" name="form2" method="POST" action="AdminTabla.php">
                <div class="col-12 row">
        
                    <div class="mb-3">
                            <label  class="form-label"><h5>Nombre de usuario a buscar</h5></label>
                            <input type="text" class="form-control" id="buscar" name="buscar" style="border: 2px solid #0F1D5D;" value="<?php echo $_POST["buscar"] ?>" >
                    </div>
        
                    <div class="col-11">
        
                        <table class="table">
                            <thead>
                                <th>
                                    <h4>Roles</h4>
                                    <select id="subject-filter" id="Rol" name="Rol" class="form-control" style="border: 2px solid #0F1D5D;  font-family: Lustria;" >
                                    <?php if ($_POST["Rol"] != ''){ ?>
                                        <option value="<?php echo $_POST["Rol"]; ?>"><?php echo $_POST["Rol"]; ?></option>
                                    <?php } ?>
                                        <option value=""><h5>Todos</h5></option>
                                        <option value="1"><h5>Administrador</h5></option>
                                        <option value="2"><h5>Docente jurado</h5></option>
                                        <option value="3"><h5>Docente</h5></option>
                                        <option value="4"><h5>Estudiante</h5></option>
                                    </select>               
                                </th>
                                <th>
                                    <input type="submit" class="btn " value="Ver" style="background-color: #0F1D5D; color: white; font-family: Lustria;">
                                </th>          
                            </thead>   
                        </table>
                    </div>
                </div>
        
        
                <?php 
                /*FILTRO de busqueda////////////////////////////////////////////*/
                if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
                $aKeyword = explode(" ", $_POST['buscar']);
                
               
                if ($_POST["buscar"] == '' AND  $_POST['Rol'] == ''){ 
                        $query ="SELECT * FROM  tblusuarios";
                }else{
        
                        $query ="SELECT * FROM tblusuarios ";
        
                if ($_POST["buscar"] != '' ){ 
                        $query .= "WHERE (NombreUsuario LIKE LOWER('%".$aKeyword[0]."%')) ";
                
                for($i = 1; $i < count($aKeyword); $i++) {
                   if(!empty($aKeyword[$i])) {
                       $query .= " OR NombreUsuario LIKE '%" . $aKeyword[$i] . "%'";
                   }
                 }
        
                }
        
          
                       
                 if ($_POST["Rol"] != '' ){
                        $query .= " AND Rol = '".$_POST["Rol"]."' ";
                 }
               
        }
        
        
                 $sql = $conexion->query($query);
        
                 $numeroSql = mysqli_num_rows($sql);
        
                ?>
                <p><i class="mdi mdi-file-document"></i><h6> <?php echo $numeroSql; ?> Resultados encontrados</h6></p>
        </form>
        
        
        <div class="table-responsive">
                <table class="table">
                        <thead>
                        <tr>
                                <th><h6><b> Id </b></h6></th><!--nombres en la tabla arriba-->
                                <th><h6><b> Nombre </b></h6></th>
                                <th><h6><b> Rol </b></h6></th>
                                <th><h6><b> Estado </b></h6></th>
                                <th><h6><b> Activar </b></h6></th>
                                <th><h6><b> Desactivar </b></h6></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                       
                                <tr>
                                <td><h6><?php echo $rowSql["IdUsuario"]; ?></h6></td>
                                <td><h6><?php echo $rowSql["NombreUsuario"]; ?></h6></td>
                                <td><h6><?php echo $rowSql["Rol"]; ?></h6></td>
                                <td><h6><?php echo $rowSql["Activo"]; ?></h6></td>
                                    <td><button style="background-color: #0F1D5D; padding: 8px 8px; border-radius: 8px;"><a href="AdminTabla.php? Activar=<?php echo $rowSql["IdUsuario"]; ?>" style="text-decoration: none;"> ✅ </a></button></td>
                                    <td><button style="background-color: #0F1D5D; padding: 8px 8px; border-radius: 8px;"><a href="AdminTabla.php? Desactivar=<?php echo $rowSql["IdUsuario"]; ?>" style="text-decoration: none;"> 🚷 </a></button></td>
                                </tr>
                               
                       <?php } ?>

                       <?php While($rowSql = $sql->fetch_assoc()) {   ?>
               
                                <tr>
                                        <td style="text-align: center;"><?php echo $rowSql["NombreUsuario"]; ?></td>

                                        <td style="text-align: center;"><?php echo $rowSql["Rol"]; ?></td>
                                
                                </tr>
                        
                        <?php } ?>
                        </tbody>
                </table>
        </div>
        
        
        </div>
        </div>
                       </div>
                       </div>
                       </div>
                       </div>
                       </div>
                       </div>
                        
        


<!-- Fin de menu vertical ------------------------------------------------------>



                <?php
                    if(isset($_GET['Desactivar']))/*Desactivar usuario-----------------------------------------------*/
                    {
                        $desactivar_id=$_GET['Desactivar'];
                        $desactivar="UPDATE `tblusuarios` SET `Activo` = '0' WHERE `tblusuarios`.`IdUsuario` = '$desactivar_id'";
                        $ejecutar=mysqli_query($conexion,$desactivar);
                        if($ejecutar)
                        {
                            echo "<script>
                                alert ('Usuario desactivado');
                                window.location.replace('AdminTabla.php');
                                </script>";
                        }
                        else
                        {
                            echo "<script>
                                alert ('No se logro desactivar');
                                </script>";
                        }


                    }
                    unset($_POST['Desactivar']);

                    if(isset($_GET['Activar']))/*Activar usuario-----------------------------------------------*/
                    {
                        $desactivar_id=$_GET['Activar'];
                        $desactivar="UPDATE `tblusuarios` SET `Activo` = '1' WHERE `tblusuarios`.`IdUsuario` = '$desactivar_id'";
                        $ejecutar=mysqli_query($conexion,$desactivar);
                        if($ejecutar)
                        {
                            echo "<script>
                                window.location.replace('AdminTabla.php');
                                </script>";
                        }
                        else
                        {
                            echo "<script>
                                alert ('No se logro activar');
                                </script>";
                        }
                    }
                    unset($_POST['Activar']);
                    
                ?>
        </div>
        </div>
                 
</body>
</html>