<?php  
    session_unset();
    session_destroy();
    echo "<script language='javascript'>
    window.location.replace('../index.html');
    </script>";
?>