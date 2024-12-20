<!doctype html>
<?php ob_start(); //dipake untuk menghindari error "header already sent"
?>

<?php  include "INCLUDE/head.php"?>
    <body class="sb-nav-fixed">
    <?php include "INCLUDE/nav.php";?>
        <div id="layoutSidenav">
         <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
<?php

    include "include/config.php";
    if (isset($_POST['edit']))    //isset untuk mengetahui apakah ada atribut yang diisi//
    {
        $mahasiswaKODE = $_POST["mahasiswakode"];     
        $mahasiswaNAMA = $_POST["mahasiswanama"];
        $mahasiswaJURUSAN = $_POST["mahasiswajurusan"];
        $mahasiswaJK = $_POST["mahasiswajk"];
        $mahasiswaSTATUS = $_POST["statuskuliah"];

        /*jadi apapun yang dinputkan dalam form akan di tampung di mahasiswakode, 
        lalu hasil tersebut disimpan dalam $mahasiswaKODE
        
        apa yg sudah di terima di $mahasiswaKODE,NAMA,DLL kita simpan ke tabel nya (DB DALAM WEB)*/

        // mysqli_query($connection, "insert into mahasiswa values ('$mahasiswaKODE','$mahasiswaNAMA','$mahasiswaJURUSAN',
        // '$mahasiswaJK', '$mahasiswaSTATUS')");
        mysqli_query ($connection, "UPDATE mahasiswa set mahasiswaNAMA = '$mahasiswaNAMA',
        mahasiswaKODE = '$mahasiswaKODE', mahasiswaJURUSAN = '$mahasiswaJURUSAN' 
        , mahasiswaJK = '$mahasiswaJK' , mahasiswaSTATUS ='$mahasiswaSTATUS'
        where mahasiswaKODE ='$mahasiswaKODE' ");   //kalau untuk dlm query tanda petik hrs 1 aja
        header("location: mahasiswa.php");
        //mysqlinya harus sama dengan file confignya tadi, gaboleh beda
        //header maksudnya kalau sudah di entry/simpan, dipanggil lagi file formnya.
    }

          //menerima kiriman data dari inputkategori.php
          $kodemahasiswa = $_GET['ubah'];  //'ubah'nya harus sama yg di file mahasiswa.php
          $editmahasiswa = mysqli_query ($connection, "select * from mahasiswa
                    where mahasiswaKODE = '$kodemahasiswa'"); 
                    $rowedit = mysqli_fetch_array ($editmahasiswa);
                    /*nnti data yang di ambil akan dicek apakah sama dengan kode mahasiswa yang di table, klo iya maka 
                    diambil di $rowedit */
      
          $editmahasiswa = mysqli_query ($connection, "select * from mahasiswa
                where mahasiswaKODE = '$kodemahasiswa'");  
          $rowedit2 = mysqli_fetch_array ($editmahasiswa);


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
<div class="col-sm-10">
<form method= "POST">       <!--boleh post,get,request-->

  <div class="form-group row mb-3 row">
        <label for="mahasiswakode" class="col-sm-2 col-form-label">Kode Mahasiswa</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="mahasiswakode" name="mahasiswakode" 
        placeholder="Inputkan kode mahasiswa" value="<?php echo $rowedit ["mahasiswaKODE"];?>" readonly>
    </div>
  </div>

  <div class="form-group row mb-3 row">
        <label for="mahasiswanama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="mahasiswanama" name="mahasiswanama" 
        placeholder="Nama mahasiswa" value="<?php echo $rowedit ["mahasiswaNAMA"];?>">
    </div>
  </div>

  <div class="form-group row mb-3 row">
        <label for="mahasiswajurusan" class="col-sm-2 col-form-label">Jurusan</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="mahasiswajurusan" name="mahasiswajurusan" 
        placeholder="Jurusan mahasiswa" value="<?php echo $rowedit ["mahasiswaJURUSAN"];?>">
    </div>
  </div>

  <div class="form-group row mb-3 row">
        <label for="mahasiswajk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
        <select class="form-control" id="mahasiswajk" name="mahasiswajk">
        <option value="Laki-laki" <?php if ($rowedit["mahasiswaJK"] == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
        <option value="Perempuan" <?php if ($rowedit["mahasiswaJK"] == "Perempuan") echo "selected"; ?>>Perempuan</option>
    </select>
    </div>
  </div>

  <div class="form-group row mb-3 row">
        <label for="statuskuliah" class="col-sm-2 col-form-label">Status Kuliah</label>
    <div class="col-sm-10">
        <select class="form-control" id="statuskuliah" name="statuskuliah">
        <option value="Aktif" <?php if ($rowedit["mahasiswaSTATUS"] == "Aktif") echo "selected"; ?>>Aktif</option>
        <option value="Tidak Aktif" <?php if ($rowedit["mahasiswaSTATUS"] == "Tidak Aktif") echo "selected"; ?>>Tidak Aktif</option>
    </select>
    </div>
  </div>
      <!--label for dan id itu saling berhubungan jadi namanya harus sama-->
      <!--col sm 2 itu mengatur lebar nya , jadi mengisi 2 kolom , dari 12 kolom layar website-->
<div class="form-group row">      <!-- membuat input kedalam 1 grup-->
<div class="col-sm-2">
</div>
<div class="col-sm-10" > 

<input type="submit" class="btn btn-secondary" value="EDIT" name="edit">
<input type="reset" class="btn btn-success" value="Batal" name="batal">

</div>
</div>
</form>
    <!--ini akhir kerja saya-->
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

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


      <th colspan="2" style="text-align: center"> Aksi     <!-- colspan buat menggabungkan 2 kolom jadi 1 -->
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



      <td width="5px">
        <a href="mahasiswaedit.php?ubah=<?php echo $row["mahasiswaKODE"]?>" class="btn btn-success btn-sm" title="EDIT"> 
      <!-- apa yang di ambil dari kategori kode dikirim ke mahasiswa edit.php-->
      
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg>
    </td>
    <td width="5px">  <!-- buat ngatur lebar jarak -->
    <a href="mahasiswahapus.php?hapus=<?php echo $row["mahasiswaKODE"]?>" class="btn btn-danger btn-sm" title="HAPUS"> 
    <i class="bi bi-trash"></i>   <!-- kalau pakai opsi kyk gini , perlu terkoneksi internet baru bisa muncul krna kita mnggil linknya-->
    </td>

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
