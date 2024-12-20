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
    if(isset ($_POST["Simpan"]))
    {
        $berita0049 =$_POST["beritaKODE"];        //harus sama dengan name
        $beritaclau =$_POST["beritaJUDUL"];
        $kategoriberita0049=$_POST["kategoriberitaKODE"];
        $event0049 =$_POST["eventKODE"];

        mysqli_query($connection, "insert into claudya values ('$berita0049','$beritaclau','$kategoriberita0049','$event0049')");

        header("location: claudya0049.php");
    }
    $datakategori =mysqli_query($connection, "select * from claudya");
?>

    <head>
        <title>BERITA</title>
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">     <!-- menggunakan link select2 -->
        <!-- link yang dipanggil adalah link css, untuk memberitahu browser kita menggunakan link css yang dari link tersebut -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">    

    </head>
<body>


<div class="row"> <!-- membuat formnya menjadi div class tersendiri -->
<div class="col-sm-1">
</div>

<div class="col-sm-10">

    <form method="POST">

    <div class="mb-3 row">          <!-- mb = marginbottom , memberi jarak 3 baris, max sampai 5 baris-->
    <label for="beritaKODE" class="col-sm-2 col-form-label">Kode Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="beritaKODE" id="beritaKODE" placeholder="Kode Berita">      <!-- name: variabel yang akan disimpan kedalam table -->
    </div>
  </div>

  <div class="mb-3 row">
    <label for="beritaJUDUL" class="col-sm-2 col-form-label">Judul Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="beritaJUDUL" id="beritaJUDUL" placeholder="Judul Berita">      <!-- name: variabel yang akan disimpan kedalam table -->
    </div>
  </div>

  <div class="mb-3 row">
    <label for="kategoriberitaKODE" class="col-sm-2 col-form-label">Kategori Berita</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="kategoriberitaKODE" id="kategoriberitaKODE" placeholder="Kategori Berita">      <!-- name: variabel yang akan disimpan kedalam table -->
    </div>
  </div>

  <div class="mb-3 row">
    <label for="eventKODE" class="col-sm-2 col-form-label">Event Berita</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="eventKODE" id="eventKODE" placeholder="Event Berita">      <!-- name: variabel yang akan disimpan kedalam table -->
    </div>
  </div>


  <div class="form-group row">      <!-- membuat input kedalam 1 grup-->
<div class="col-sm-2">
</div>
<div class="col-sm-10" > 
    
  <input type="submit" class="btn btn-secondary" value="Simpan" name="Simpan">
<input type="reset" class="btn btn-success" value="Batal" name="Batal">
  
</div>      
</div> <!-- penutup form-group row -->

</form>




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
      <th colspan="2" style="text-align: center"> Aksi     <!-- colspan buat menggabungkan 2 kolom jadi 1 -->
     <!-- colspan buat menggabungkan 2 kolom jadi 1 -->

    </tr>  
  </thead>
  <tbody>

<?php  
// --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
$jumlahtampilan = 2;
$halaman = (isset($_GET['page']))? $_GET['page'] : 1;
$mulaitampilan = ($halaman - 1) * $jumlahtampilan;

// ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
    // $query =mysqli_query($connection, "select * from claudya");
    if (isset($_POST['kirim'])) 
{
  $search = $_POST ['search'];
  $query =mysqli_query ($connection, "select claudya. * from claudya
        where berita0049 like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
        // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
} 

else if (isset($_POST['kirimnama'])) {
  $searchnama = $_POST ['searchnama'];
  $query =mysqli_query ($connection, "select claudya. * from claudya
              where beritaclau like '%".$searchnama."%' limit $mulaitampilan, $jumlahtampilan ");
              //	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	

}
else {
  $query =mysqli_query ($connection, "select claudya. * from claudya limit $mulaitampilan, $jumlahtampilan");
//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	

}
    $nomor = 1;
    while ($row = mysqli_fetch_array($query))
    {
?>
    <tr>
      <td><?php echo $mulaitampilan + $nomor; ?></td>     <!-- php dipake untuk menampilkan datanya -->
      <!-- pad bagian ini ganti dengan $mulaitampilan + $nomor -->
<!-- ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN -------------- -->   
      <td><?php echo $row ['berita0049']; ?></td>        <!-- isi kurung [] nya hrus sama yang ditable DBnya-->
      <td><?php echo $row ['beritaclau']; ?></td>
      <td><?php echo $row ['kategoriberita0049']; ?></td>
      <td><?php echo $row ['event0049']; ?></td>
      <td width="5px">
        <a href="claudyaedit.php?ubah=<?php echo $row["berita0049"]?>" class="btn btn-success btn-sm" title="EDIT"> 
      <!-- apa yang di ambil dari destinasi kode dikirim ke destinasi edit.php-->
      
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg>
    </td>
    <td width="5px">  <!-- buat ngatur lebar jarak -->
    <a href="claudyahapus.php?hapus=<?php echo $row["berita0049"]?>" class="btn btn-danger btn-sm" title="HAPUS"> 
    <i class="bi bi-trash"></i>   <!-- kalau pakai opsi kyk gini , perlu terkoneksi internet baru bisa muncul krna kita mnggil linknya-->
    </td>
    </tr>
    <?php $nomor = $nomor + 1; ?>        <!-- kalo while ,operasi incrementnya dibawah, klo for dan do while diatas.-->
    <?php } ?>
 </tbody>
 </table>
 
<!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
<?php 
    $query = mysqli_query($connection, "SELECT * FROM claudya");
    $jumlahrecord = mysqli_num_rows($query);
    $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);
  ?>

<!-- TAMPILAN PADA HALAMAN PAGINATION INI DAPAT DIAMBIL DARI BOOTSTRAP 5 
		 PADA BAGIAN components -> pagination 
-->
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; echo $nomorhal?>">PERTAMA</a></li>
    <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++)
    { ?>
    <li class="page-item">
      <?php 
      if($nomorhal!=$halaman)
      { ?>  
      <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
      <?php }
      else { ?>
      <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
    <?php } ?>
    </li>
    <?php } ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?>">TERAKHIR</a></li>
  </ul>
</nav>

<!----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------->


 </div> <!-- penutup col-sm-10-->
</div> <!-- penutup tag row -->


</body>
<?php include "INCLUDE/board.php";?>
                    </div>
                </main>
                <?php include "INCLUDE/footer.php";?>
            </div>
        </div>
    <?php include "INCLUDE/jsscript.php";?>

    <?php ob_end_flush()?>
</html>