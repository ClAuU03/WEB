<!DOCTYPE html>
<!DOCTYPE html>
<html>
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
                        <h1 class="mt-4">Dashboard Berita</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php
    include "INCLUDE/config.php";
?>

<body>


<div class="row"> <!-- membuat formnya menjadi div class tersendiri -->
<div class="col-sm-1">
</div>

<div class="col-sm-10">

<div class="mb-3 row"> </div>
<form method = "POST">

<div class="form-group row mb-2">    <!-- kyk bikin div container -->        
<label for = "search" class="col-sm-3">Cari Kode Berita </label>
<div class="col-sm-6">
      <input type ="text" name="search" class="form-control" id="search"
      value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
      placeholder="Cari kode berita">        
</div>
      <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
</div>
</form>

<div class="mb-3 row"> </div>
<form method = "POST">

<div class="form-group row mb-2">    <!-- kyk bikin div container -->        
<label for = "searchnama" class="col-sm-3">Cari Judul Berita </label>
<div class="col-sm-6">
      <input type ="text" name="searchnama" class="form-control" id="searchnama"
      value="<?php if(isset($_POST["searchnama"])) {echo $_POST ["searchnama"];}?>"
      placeholder="Cari judul berita">        
</div>
      <input type="submit" name="kirimnama" class="col-sm-1 btn btn-primary" value="Search">
</div>
</form>


<div class="mt-3 row"> </div>

<div class="jumbotron">
        <h2 class="display-5">Hasil entri data berita claudya</h2> 
</div>

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Berita</th>
      <th scope="col">Judul Berita</th>
      <th scope="col">Kategori Berita</th>
      <th scope="col">Event</th>
    </tr>  
  </thead>
  <tbody>

<?php  
    // $query =mysqli_query($connection, "select * from claudya");
    if (isset($_POST['kirim'])) 
{
  $search = $_POST ['search'];
  $query =mysqli_query ($connection, "select claudya. * from claudya
        where berita0049 like '%".$search."%'");
} 

else if (isset($_POST['kirimnama'])) {
  $searchnama = $_POST ['searchnama'];
  $query =mysqli_query ($connection, "select claudya. * from claudya
              where beritaclau like '%".$searchnama."%'");
}
else {
  $query =mysqli_query ($connection, "select claudya. * from claudya");

}
    $nomor = 1;
    while ($row = mysqli_fetch_array($query))
    {
?>
    <tr>
      <td><?php echo $nomor; ?></td>     <!-- php dipake untuk menampilkan datanya -->
      <td><?php echo $row ['berita0049']; ?></td>        <!-- isi kurung [] nya hrus sama yang ditable DBnya-->
      <td><?php echo $row ['beritaclau']; ?></td>
      <td><?php echo $row ['kategoriberita0049']; ?></td>
      <td><?php echo $row ['event0049']; ?></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>        <!-- kalo while ,operasi incrementnya dibawah, klo for dan do while diatas.-->
    <?php } ?>
 </tbody>
 </table>

 </div> <!-- penutup col-sm-10-->
</div> <!-- penutup tag row -->


</body>
</html>