<head>
        <title>DESTINASIHAPUS</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodedestinasi = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM destinasi WHERE destinasiKODE = '$kodedestinasi'");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='destinasi.php'</script>";
}
?> 