<?php 
session_start();
$_SESSION["useremail"];
unset($_SESSION["useremail"]);

session_unset(); /*session_unset hanya menghapus sesi untuk penggunaan.
        dengan menggunakan session_unset, variabel masih ada */
session_destroy();  /*menghpus file session dari server */
header("location:login.php")
?>