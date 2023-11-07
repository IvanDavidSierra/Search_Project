<?php
    $ruta_archivo = '../manual de usuario/ManualUsuarioSearchProject.pdf';
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($ruta_archivo) . '"');
    readfile($ruta_archivo);
    exit;
?>
