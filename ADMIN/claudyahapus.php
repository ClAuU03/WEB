<head>
        <title>CLAUDYAHAPUS</title>
</head>
<?php 
include "INCLUDE/config.php";
if (isset($_GET['hapus']))
{
    $berita0049 = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM claudya WHERE berita0049 = '$berita0049' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='claudya0049.php'</script>";
}
?> 