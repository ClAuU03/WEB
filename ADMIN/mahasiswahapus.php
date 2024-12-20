<head>
        <title>MAHASISWAHAPUS</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodemahasiswa = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM mahasiswa WHERE mahasiswaKODE = '$kodemahasiswa' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='mahasiswa.php'</script>";
}
?> 