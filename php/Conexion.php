<?php
class Database
{
  private $servidorlocal;
  private $basededatos;
  private $usuario;
  private $clave;
  private $caracteres;
    function connectar()
      {
      $servidorlocal = 'localhost';
      $basededatos   = 'searchproject';
      $usuario       = 'root';
      $clave      = '';
      $caracteres    = 'utf8';
        try
          {
            $conexion = "mysql:host=".$servidorlocal.";dbname=".$basededatos.";charset=".$caracteres;
            $opciones = [
                          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                          PDO::ATTR_EMULATE_PREPARES  => false
                        ];
            $pdo = new PDO($conexion, $usuario, $clave, $opciones);
            return $pdo;
          }
        catch(PDOException $error)
          {
            echo 'Error en la conexion:  '.$error->getMessage();
          }
      }
}
//conexion::connect();
?>


