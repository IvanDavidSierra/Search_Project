
<?php
class Database
{
  private $servidorlocalc;
  private $basededatosc;
  private $usuarioc;
  private $clavec;
  private $caracteresc;
    function connectar()
      {
      $servidorlocalc = 'localhost';
      $basededatosc   = 'colegio';
      $usuarioc       = 'root';
      $clavec      = '';
      $caracteresc    = 'utf8';
        try
          {
            $conexionc = "mysql:host=".$servidorlocalc.";dbname=".$basededatosc.";charset=".$caracteresc;
            $opcionesc = [
                          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                          PDO::ATTR_EMULATE_PREPARES  => false
                        ];
            $pdoc = new PDO($conexionc, $usuarioc, $clavec, $opcionesc);
            return $pdoc;
          }
        catch(PDOException $errorc)
          {
            echo 'Error en la conexion:  '.$errorc->getMessage();
          }
      }
}
//conexion::connect();
?>
