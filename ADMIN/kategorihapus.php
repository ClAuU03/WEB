<head>
        <title>KATEGORIHAPUS</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodekategori = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM kategoriwisata WHERE kategoriKODE = '$kodekategori' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='inputkategori.php'</script>";
}
?> 