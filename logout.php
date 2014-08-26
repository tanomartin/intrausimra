<?php
session_save_path("sesiones");
session_start();
session_unset();
session_destroy();
if (isset($_GET['error'])) {
	header ("Location: logintranet.php?err=2");
} else {
	header ("Location: logintranet.php");
}
?>