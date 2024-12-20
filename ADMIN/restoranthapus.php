<head>
        <title>Restorant</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $koderestorant = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM restorant WHERE restorantKODE = '$koderestorant' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='restorant.php'</script>";
}
?> 