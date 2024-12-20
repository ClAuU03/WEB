<head>
        <title>Hotel</title>
</head>
<?php 
include "include/config.php";
if (isset($_GET['hapus']))
{
    $kodehotel = $_GET["hapus"];
    mysqli_query ($connection, "DELETE FROM hotel WHERE hotelKODE = '$kodehotel' ");
    echo "<script> alert ('DATA BERHASIL DIHAPUS');
    document.location='hotel.php'</script>";
}
?> 