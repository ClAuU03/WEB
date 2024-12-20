<head>
        <title>Provinsi</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodeprovinsi = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM provinsi WHERE provinsiKODE = '$kodeprovinsi' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='provinsi.php'</script>";
}
?> 