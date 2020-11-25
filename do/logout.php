<?php
session_start();
unset($_SESSION['user']);
session_destroy();

echo '<script language="javascript">';
echo 'alert("Berhasil Logout"); location.href="../index.php"';
echo '</script>';
?>