<head>
        <title>Pusat Oleh-Oleh </title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodeoleh = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM oleholeh WHERE olehKODE = '$kodeoleh' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='oleholeh.php'</script>";
}
?> 