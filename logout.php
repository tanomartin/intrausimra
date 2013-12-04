<?
session_save_path("sesiones");
session_start();
session_unset();
session_destroy();
header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
?>