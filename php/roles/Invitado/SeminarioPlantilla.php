<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminario</title>
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
        <a href="../../../index.html"> 🏠 Inicio</a>
        <a href="../../../html/Iniciar Sesion.html"> 👤 Iniciar sesion </a>
        <a href="Seminarios.php"> 📚Seminarios</a>
        <a href="../../../html/Ayuda.html"> ❔ Ayuda</a>
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

    <div class="col-md-8">
        <br>


        
    <?php /*nombre del boton que selcione el proyecto */
        if(isset($_GET['IdSeminarios']))/*Traer id proyecto para el query-------------------------------------------*/
        {
        $conex=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');
        $IdS=$_GET['IdSeminarios'];

        $Query ="SELECT * FROM  tblseminario WHERE IdSeminarios=$IdS";
        $resultado= mysqli_query($conex,$Query);
        if ($resultado) {
            while($filas = mysqli_fetch_array($resultado)) {
                $NombreSeminario=$filas["NombreSeminario"];
                $DescripcionSeminario=$filas["DescripcionSeminario"];
                $DirectorSeminario=$filas["DirectorSeminario"];

 
    ?>

        <div class="texto-seminario">
        <br>
        <h4>Seminario</h4>
        <h1><?php echo $NombreSeminario ?></h1>
        <h2><?php echo $DescripcionSeminario ?></h2>
        <h4>Director: <?php echo $DirectorSeminario ?></h4>
        <hr color="white"> </hr>

        <?php
                        }
                    } else {
                        echo "No se encontraron resultados";
                    }
                }
        ?>

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
        
                <h6 class="card-title">Buscador</h6>
        
        
        <form id="form2" name="form2" method="POST" action="#">
                <div class="col-12 row">
        
                    <div class="col-md-11"> 
                        <input type="text" class="form-control" id="buscar" name="buscar" style="border: 2px solid #0F1D5D;" value="<?php echo $buscar=$_POST["buscar"] ?>" >
                    </div>
                    <div class="col-md-1">
                        <input type="submit" class="btn " value="🔍" style="background-color: #0F1D5D; color: white;">     
                    </div>
                           
                            
                   
        
                </div>
        
        
                <?php 
                $conexion=mysqli_connect('localhost', 'root', '', 'searchproject') or die ('Problema de conexion');

                $IdS=$_GET['IdSeminarios'];

                $Query ="SELECT * FROM  tblseminario WHERE IdSeminarios=$IdS";
                $ejecutar=mysqli_query($conexion,$Query);

                /*FILTRO de busqueda////////////////////////////////////////////*/
                if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
                $aKeyword = explode(" ", $_POST['buscar']);
                
               
                if ($_POST["buscar"] == ''){ 
                        $query ="SELECT * FROM  tblproyecto";
                }else{

                        $query ="SELECT * FROM tblproyecto ";
        
                if ($_POST["buscar"] != '' ){ 
                        $query .= "WHERE (NombreProyecto LIKE LOWER('%".$aKeyword[0]."%')) ";
                        $query .= "AND (Seminario=$IdS) ";
                
                for($i = 1; $i < count($aKeyword); $i++) {
                   if(!empty($aKeyword[$i])) {
                       $query .= " OR NombreProyecto LIKE '%" . $aKeyword[$i] . "%'";
                   }
                 }
                }   
            }
                $sql = mysqli_query($conexion, $query);
        
                $numeroSql = mysqli_num_rows($sql);
        
                ?>
                <p><i class="mdi mdi-file-document"></i><h6> <?php echo $numeroSql; ?> Proyectos encontrados</h6></p>
        </form>
        
        
        <div class="table-responsive">
                <table class="table">

                    <label  class="form-label"><h4>Proyectos</h4></label>
                        <thead>
                        <tr>
                                <th><h6><b> Nombre del proyecto </b></h6></th>
                                <th><h6><b> Autor </b></h6></th>
                                <th><h6><b> Año </b></h6></th>
                                <th><h6><b> Ver </b></h6></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        while($rowSql = $sql->fetch_assoc()) {   ?>
                       
                                <tr>
                                <td><h6><?php echo $rowSql["NombreProyecto"]; ?></h6></td>
                                <td><h6><?php echo $rowSql["Autores"]; ?></h6></td>
                                <td><h6><?php echo $rowSql["Anio"]; ?></h6></td>
                             
                                    <td><a href="ProyectoPlantilla.php? IdProyecto=<?php echo $rowSql["IdProyecto"]; ?>" style=" color: white; text-decoration: none;" ><button style="background-color: #0F1D5D; padding: 5px 8px; border-radius: 8px;"> Ver </a></button> </td>
                                </tr>
                               
                       <?php } ?>

                       <?php while($rowSql = $sql->fetch_assoc()) {   ?>
               
                                <tr>
                                    <td style="text-align: center;"><?php echo $rowSql["NombreProyecto"]; ?></td>

                                    <td style="text-align: center;"><?php echo $rowSql[""]; ?></td>
                                
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
</div>


</body>

<html>