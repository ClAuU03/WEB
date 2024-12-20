<!DOCTYPE html>
<html lang="en">
<?php ob_start();   //dipake untuk menghindari error "header already sent"

?>
<?php  include "INCLUDE/head.php"?>
    <body class="sb-nav-fixed">
    <?php include "INCLUDE/nav.php";?>
        <div id="layoutSidenav">
         <?php include "INCLUDE/menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Provinsi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$kodeprovinsi= $_POST['inputkode'];
		$namaprovinsi= $_POST['inputnama'];
		$ibukotaprovinsi= $_POST['inputibukota'];
		$ketprovinsi= $_POST['inputket'];
        $namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			mysqli_query($connection, "insert into provinsi values ('$kodeprovinsi', '$namaprovinsi', 
            '$ibukotaprovinsi','$ketprovinsi','$namafile')");
			header("location:provinsi.php");
		}

	}

	$dataprovinsi= mysqli_query($connection, "select * from provinsi");
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-5">Input data Provinsi</h2>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="kodeprovinsi" class="col-sm-3 col-form-label mb-sm-3">Kode Provinsi</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="kodeprovinsi" name="inputkode" placeholder="Kode provinsi" maxlength="4">
			</div>
		</div>

		<div class="form-group row">
			<label for="namaprovinsi" class="col-sm-3 col-form-label mb-sm-3">Nama Provinsi</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="namaprovinsi" name="inputnama" placeholder="Nama Provinsi">
			</div>
		</div>

		<div class="form-group row">
			<label for="ibukotaprovinsi" class="col-sm-3 col-form-label mb-sm-3">IbuKota Provinsi</label>
			<div class="col-sm-9">
            <input type="text" class="form-control" id="ibukotaprovinsi" name="inputibukota" placeholder="Ibukota Provinsi">
			</div>
		</div>

		<div class="form-group row">
			<label for="ketprovinsi" class="col-sm-3 col-form-label mb-sm-3">Keterangan Provinsi</label>
			<div class="col-sm-9">
            <input type="text" class="form-control" id="ketprovinsi" name="inputket" placeholder="Keterangan Provinsi">
			</div>
		</div>

		<div class="form-group row">
			<label for="file" class="col-sm-3 col-form-label">Foto Provinsi</label>
			<div class="col-sm-9">
				<input type="file" id="file" name="file">
				<p class="help-block">Field ini digunakan untuk unggah file,wajib di isi (HARUS JPG)</p>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-3"></div>
			<div class="col-sm-9">
				<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
				<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">

			</div>
			
		</div>

		
	</form>

</div>

<div class="col-sm-1"></div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h3 class="display-5">Daftar Provinsi</h3>
			</div>
		</div>

<!-- membuat form pencarian data -->
		<form method = "POST">

<div class="form-group row mb-2">    <!-- kyk bikin div container -->        
<label for = "search" class="col-sm-3">Cari </label>
<div class="col-sm-6">
	  <input type ="text" name="search" class="form-control" id="search"
	  value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
	  placeholder="Nama Provinsi">        
</div>
	  <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
</div>
</form>
<!-- akhir dari pencarian -->

	<table class="table table-hover table-primary">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Provinsi</th>
				<th>Nama Provinsi</th>
				<th>Ibukota Provinsi</th>
				<th>Keterangan Provinsi</th>
				<th>Foto Provinsi</th>
				<th colspan="2" style="text-align: center">Action</th> 
			</tr>			
		</thead>

		<tbody>
<?php
// --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
$jumlahtampilan = 2;
$halaman = (isset($_GET['page']))? $_GET['page'] : 1;
$mulaitampilan = ($halaman - 1) * $jumlahtampilan;

// ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------- >

			// $query = mysqli_query($connection, "select * from hotel");
			if (isset($_POST["kirim"])) 
{
  $search = $_POST ['search'];
  $query =mysqli_query ($connection, "select provinsi. * from provinsi
        where provinsiNAMA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
// --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
}
else {
  $query =mysqli_query ($connection, "select provinsi. * from provinsi limit $mulaitampilan, $jumlahtampilan");
//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
}
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor;?></td>
					<!-- pad bagian ini ganti dengan $mulaitampilan + $nomor -->
<!-- ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN -------------- -->  
					<td><?php echo $row['provinsiKODE'];?></td>
					<td><?php echo $row['provinsiNAMA'];?></td>
					<td><?php echo $row['provinsiIBUKOTA'];?></td>  
					<td><?php echo $row['provinsiKET'];?></td>  

					<td>
						<?php if(is_file("images/".$row['provinsiFOTO']))
						{ ?>
							<img src="images/<?php echo $row['provinsiFOTO']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

					<td width="5px">
						<a href="provinsiedit.php?ubah=<?php echo $row['provinsiKODE']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
					</td>
					<td>
						<a href="provinsihapus.php?hapus=<?php echo $row['provinsiKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
 						<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>
					</td>

				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
	
<!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
<?php 
    $query = mysqli_query($connection, "SELECT * FROM provinsi");
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
	</div>

	<div class="col-sm-1"></div>

	
</div>


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
    $(document).ready(function()
    {
        $('#koderestorant').select2(
            {
                CloseOnSelect:true,
                allowClear:true,
                placeholder:"Pilih restorant"
    });
});

</script>
    <?php include "INCLUDE/board.php";?>
                    </div>
                </main>
                <?php include "INCLUDE/footer.php";?>
            </div>
        </div>
    <?php include "INCLUDE/jsscript.php";?>

    <?php ob_end_flush()?>

    </html>