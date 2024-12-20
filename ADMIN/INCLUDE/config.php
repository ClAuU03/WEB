<?php
    //ini koneksi ke database//
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pesonajawa";

    //membuat koneksinya//
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connection){
        die("Connection Failed : ".mysqli_connect_error());
    }

//mysqli artinya php udah versi 5 keatas
//kalau mau membuat aplikasi dan mau mengkonek, maka gunakan mysqli
//kalau hasil runnya tidak muncul apa apa dalam web , berarti koneksinya berhasil

?>