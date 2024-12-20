<!DOCTYPE html>
<html>
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
    include "INCLUDE/config.php";
    if(isset ($_POST['edit']))    //harus sama dengan name.
    { //BIAR G BINGUNG DISAMAIN SAMA ATRIBUT DI DATABASE
        $destinasiKODE =$_POST["kodedestinasi"];        //harus sama dengan name
        $destinasiNAMA =$_POST["namadestinasi"];
        $destinasiKET =$_POST["ketdestinasi"];
        $kategoriKODE =$_POST["kodekategori"];
        $namafile = $_FILES['file']['name'];
		    $file_tmp = $_FILES["file"]["tmp_name"];

        $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

       // PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
       if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
       {
			  move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
        //mysqli_query($connection, "insert into destinasi values ('$destinasiKODE','$destinasiNAMA','$kategoriKODE')");  // tanda petiknya gaboleh 2 , hrus 1 
        mysqli_query ($connection, "UPDATE destinasi set destinasiNAMA = '$destinasiNAMA', destinasiKET = '$destinasiKET',
        kategoriKODE = '$kategoriKODE' , destinasiFOTO = '$namafile'    
        where destinasiKODE ='$destinasiKODE' ");   //kalau untuk dlm query tanda petik hrs 1 aja
        header("location: destinasi.php");
    }
  }

    $datakategori =mysqli_query($connection, "select * from kategoriwisata");
//menerima kiriman data dari destinasi.php
    $kodedestinasi = $_GET['ubah'];  //'ubah'nya harus sama yg di file destinasi.php 
    $editdestinasi = mysqli_query ($connection, "select * from destinasi
              where destinasiKODE = '$kodedestinasi'"); 
              $rowedit = mysqli_fetch_array ($editdestinasi);
              /*nnti data yang di ambil akan dicek apakah sama dengan kode destinasi yang di table, klo iya maka 
              diambil di $rowedit */

    $editkategori = mysqli_query ($connection, "select * from destinasi, kategoriwisata
          where destinasiKODE = '$kodedestinasi' and destinasi.kategoriKODE = kategoriwisata.kategoriKODE");  //kategoriKODE ditabel destinasi harus sama dengan kategoriKODE di tabel kategori
    //yang diedit di $editkategori itu tabel kategoridestinasi, bukan kategoriwisata
    $rowedit2 = mysqli_fetch_array ($editkategori);
?>

<head>
        <title>DESTINASIEDIT</title>
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

<form method="POST" enctype="multipart/form-data">


    <div class="mb-3 row">          <!-- mb = marginbottom , memberi jarak 3 baris, max sampai 5 baris-->
    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kodedestinasi" id="kodedestinasi"
      value="<?php echo $rowedit ["destinasiKODE"];?>" readonly>      <!-- name: variabel yang akan disimpan kedalam table -->
        <!-- readonly buat gabisa diubah -->
    </div>
  </div>

  <div class="mb-3 row">
    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="namadestinasi" id="namadestinasi"
      value="<?php echo $rowedit ["destinasiNAMA"];?>">      <!-- name: variabel yang akan disimpan kedalam table -->
    </div>
  </div>

  <div class="mb-3 row">
    <label for="ketdestinasi" class="col-sm-2 col-form-label">Keterangan Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ketdestinasi" id="ketdestinasi"
      value="<?php echo $rowedit ["destinasiKET"];?>">      <!-- name: variabel yang akan disimpan kedalam table -->
    </div>
  </div>

  <div class="mb-3 row">
    <label for="kodekategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
    <div class="col-sm-10">
    <select class="form-control" id="kodekategori" name="kodekategori">
  <!--        <option>Kategori Wisata </option> -->
  <option value="<?php echo $rowedit["kategoriKODE"];?>">
    <?php echo $rowedit ['kategoriKODE'];?>
    <?php echo $rowedit2 ['kategoriNAMA'];?>
</option>
        <?php while($row = mysqli_fetch_array($datakategori)) 
        { ?>
        <option value="<?php echo $row ["kategoriKODE"]?>">
        <?php echo $row["kategoriKODE"]?>
        <?php echo $row["kategoriNAMA"]?>
        </option>
        <?php }?>
        </select>
    </div>
  </div>

  <div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Foto Destinasi</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file" value="<?php echo $rowedit ["destinasiFOTO"];?>">
				<p class="help-block">Field ini digunakan untuk unggah file,wajib di isi (HARUS JPG)</p>
			</div>
		</div>


  <div class="form-group row">      <!-- membuat input kedalam 1 grup-->
<div class="col-sm-2">
</div>
<div class="col-sm-10" > 
    
  <input type="submit" class="btn btn-secondary" value="UBAH" name="edit">
<input type="reset" class="btn btn-success" value="Batal" name="Batal">
  
</div>      
</div> <!-- penutup form-group row -->

</form>


<div class="mt-3 row"> </div>

<div class="jumbotron">
        <h2 class="display-5">Hasil entri data destinasi wisata</h2> 
</div>
<div class="mb-3 row"> </div>


<!-- membuat form pencarian data -->
<form method = "POST">

    <div class="form-group row mb-2">    <!-- kyk bikin div container -->        
    <label for = "search" class="col-sm-3">Nama Destinasi </label>
     <div class="col-sm-6">
          <input type ="text" name="search" class="form-control" id="search"
          value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
          placeholder="Cari nama destinasi">        
      </div>
          <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
    </div>
</form>
<!-- akhir dari pencarian -->



<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Destinasi</th>
      <th scope="col">Nama Destinasi</th>
      <th scope="col">Keterangan Destinasi</th>
      <th scope="col">Kode Kategori</th>
      <th scope="col">Foto Destinasi</th>
      <th colspan="2" style="text-align: center"> Aksi     <!-- colspan buat menggabungkan 2 kolom jadi 1 -->
    </tr>  
  </thead>
  <tbody>

<?php  
//$query =mysqli_query($connection, "select * from destinasi");

if (isset($_POST["kirim"])) 
{
  $search = $_POST ["search"];
  $query =mysqli_query ($connection, "select destinasi. * from destinasi
        where destinasiNAMA like '%".$search."%'");

}
else {
  $query =mysqli_query ($connection, "select destinasi. * from destinasi");

}
    $nomor = 1;
    while ($row = mysqli_fetch_array($query))
    {
?>
    <tr>
      <td><?php echo $nomor; ?></td>     <!-- php dipake untuk menampilkan datanya -->
      <td><?php echo $row ['destinasiKODE']; ?></td>        <!-- isi kurung [] nya hrus sama yang ditable DBnya-->
      <td><?php echo $row ['destinasiNAMA']; ?></td>
      <td><?php echo $row ['destinasiKET']; ?></td>
      <td><?php echo $row ['kategoriKODE']; ?></td>
      <td>
						<?php if(is_file("images/".$row['destinasiFOTO']))
						{ ?>
							<img src="images/<?php echo $row['destinasiFOTO']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>


      <td width="5px">
        <a href="destinasiedit.php?ubafoto=<?php echo $row["destinasiKODE"]?>" class="btn btn-success btn-sm" title="EDIT"> 
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg>
    </td>
    <td width="5px">  <!-- buat ngatur lebar jarak -->
    <a href="destinasihapus.php?hapus=<?php echo $row["destinasiKODE"]?>" class="btn btn-danger btn-sm" title="EDIT"> 
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