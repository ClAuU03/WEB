<!doctype html>
<?php ob_start();   //dipake untuk menghindari error "header already sent"
?>
<?php  include "INCLUDE/head.php"?>
    <body class="sb-nav-fixed">'
    <?php include "INCLUDE/nav.php";?>
        <div id="layoutSidenav">
         <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Destinasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php
    include "include/config.php";
?>
<html lang="en">
  <head>
        <title>DATA MAHASISWA</title>
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">     <!-- menggunakan link select2 -->
        <!-- link yang dipanggil adalah link css, untuk memberitahu browser kita menggunakan link css yang dari link tersebut -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">    
      </head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  -->
  </head>


  <body>
    <!--ini bagian kerja saya-->
<div class="row">
<div class="col-sm-1">
</div>

<div class="col-sm-10" > 

<div class="mt-3 row"> </div>

<div class="jumbotron">
        <h2 class="display-5">Hasil entri data Mahasiswa</h2> 
</div>
<div class="mb-3 row"> </div>


<!-- membuat form pencarian data -->
<form method = "POST">

    <div class="form-group row mb-2">    <!-- kyk bikin div container -->        
    <label for = "search" class="col-sm-3">Cari </label>
     <div class="col-sm-6">
          <input type ="text" name="search" class="form-control" id="search"
          value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
          placeholder="Cari Nama Mahasiswa">        
    </div>
          <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
    </div>
</form>
<!-- akhir dari pencarian -->



<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Mahasiswa</th>
      <th scope="col">Nama Mahasiswa</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Status Kuliah</th>
    </tr>  
  </thead>
  <tbody>

<?php  
//$query =mysqli_query($connection, "select * from mahasiswa");

if (isset($_POST["kirim"])) 
{
  $search = $_POST ['search'];
  $query =mysqli_query ($connection, "select mahasiswa. * from mahasiswa
        where mahasiswaNAMA like '%".$search."%'");

}
else {
  $query =mysqli_query ($connection, "select mahasiswa. * from mahasiswa");

}
    $nomor = 1;
    while ($row = mysqli_fetch_array($query))
    {
?>
    <tr>
      <td><?php echo $nomor; ?></td>     <!-- php dipake untuk menampilkan datanya -->
      <td><?php echo $row ['mahasiswaKODE']; ?></td>        <!-- isi kurung [] nya hrus sama yang ditable DBnya-->
      <td><?php echo $row ['mahasiswaNAMA']; ?></td>
      <td><?php echo $row ['mahasiswaJURUSAN']; ?></td>
      <td><?php echo $row ['mahasiswaJK']; ?></td>
      <td><?php echo $row ['mahasiswaSTATUS']; ?></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>        <!-- kalo while ,operasi incrementnya dibawah, klo for dan do while diatas.-->
    <?php } ?>
 </tbody>
 </table>

 </div> <!-- penutup col-sm-10-->
</div> <!-- penutup tag row -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function()
    {
        $('#kodekategori').select2(
            {
                CloseOnSelect:true,
                allowClear:true,
                placeholder:"Pilih kategori wisata"
    });
});
</script>

</body>

</html>
