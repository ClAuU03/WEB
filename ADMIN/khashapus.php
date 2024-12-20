<head>
        <title>KHAS HAPUS</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodekhas = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM khas WHERE khasKODE = '$kodekhas' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='khas.php'</script>";
}
?> 