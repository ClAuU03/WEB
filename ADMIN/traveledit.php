<!DOCTYPE html>
<html lang="en">
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
                        <h1 class="mt-4">Dashboard Travel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php 
	include "include/config.php";
	if(isset($_POST['edit']))
	{
		$travelKODE= $_POST['inputkode'];
		$beritaKODE = $_POST['kodeberita'];
		$travelKENDARAAN = $_POST['inputkendaraan'];
        $namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			// mysqli_query($connection, "insert into travel values ('$travelKODE', '$destinasiKODE', 
            // '$travelKENDARAAN','$namafile')");
            mysqli_query ($connection, "UPDATE travel set berita0049 = '$beritaKODE',
            travelKENDARAAN = '$travelKENDARAAN' , travelFOTO = '$namafile'  
            where travelKODE ='$travelKODE' ");   //kalau untuk dlm query tanda petik hrs 1 aja
			header("location:travel.php");
		}

	}

	$databerita = mysqli_query($connection, "select * from claudya");
    $kodetravel = $_GET['ubah'];  //'ubah'nya harus sama yg di file destinasi.php 
    $edittravel = mysqli_query ($connection, "select * from travel
    where travelKODE = '$kodetravel'"); 
    $rowedit = mysqli_fetch_array ($edittravel);
    /*nnti data yang di ambil akan dicek apakah sama dengan kode destinasi yang di table, klo iya maka 
    diambil di $rowedit */
    $editberita= mysqli_query ($connection, "select * from travel,claudya
    where travelKODE = '$kodetravel' and travel.berita0049 = claudya.berita0049");  //kategoriKODE ditabel destinasi harus sama dengan kategoriKODE di tabel kategori
    //yang diedit di $editkategori itu tabel kategoridestinasi, bukan kategoriwisata
    $rowedit2 = mysqli_fetch_array ($editberita);
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-5">Input data Travel</h2>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="kodetravel" class="col-sm-3 col-form-label mb-sm-3">Kode Travel</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="kodetravel" name="inputkode" 
                placeholder="Kode Travel" maxlength="4" value="<?php echo $rowedit ["travelKODE"];?>" readonly>
			</div>
		</div>

        <div class="form-group row">
    <label for="kodeberita" class="col-sm-3 col-form-label mb-sm-3 ">Berita</label>
    <div class="col-sm-9">
    <select class="form-control" id="kodeberita" name="kodeberita" value="<?php echo $rowedit ["berita0049"];?>">
        <option>Berita</option>
        <?php while($row = mysqli_fetch_array($databerita)) 
        { ?>
        <option value="<?php echo $row ["berita0049"]?>">
        <?php echo $row["berita0049"]?>
        <?php echo $row["beritaclau"]?>
        </option>
        <?php }?>
        </select>
    </div>
  </div>

  <div class="form-group row">
		<label for="kendaraantravel" class="col-sm-3 col-form-label mb-sm-3">Kendaraan Travel</label>
		<div class="col-sm-9">
    <select class="form-control" id="kendaraantravel" name="inputkendaraan">
        <option value = "Bus" <?php if ($rowedit["travelKENDARAAN"] == "Bus") echo "selected"; ?>> Bus</option>
        <option value = "Pesawat"  <?php if ($rowedit["travelKENDARAAN"] == "Pesawat") echo "selected"; ?> > Pesawat</option>
        <option value = "Taksi"  <?php if ($rowedit["travelKENDARAAN"] == "Taksi") echo "selected"; ?> > Taksi</option>
        <option value = "Kereta Api"  <?php if ($rowedit["travelKENDARAAN"] == "Kereta Api") echo "selected"; ?>> Kereta Api</option>
    </select>
            </div>
		</div>



		<div class="form-group row">
			<label for="file" class="col-sm-3 col-form-label">Foto Travel</label>
			<div class="col-sm-9">
				<input type="file" id="file" name="file" value="<?php echo $rowedit ["travelFOTO"];?>" >
				<p class="help-block">Field ini digunakan untuk unggah file,wajib di isi (HARUS JPG)</p>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-3"></div>
			<div class="col-sm-9">
            <input type="submit" class="btn btn-secondary" value="UBAH" name="edit">
<input type="reset" class="btn btn-success" value="Batal" name="Batal">
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
				<h3 class="display-5">Daftar Travel</h3>
			</div>
		</div>

<!-- membuat form pencarian data -->
		<form method = "POST">

<div class="form-group row mb-2">    <!-- kyk bikin div container -->        
<label for = "search" class="col-sm-3">Cari </label>
<div class="col-sm-6">
	  <input type ="text" name="search" class="form-control" id="search"
	  value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
	  placeholder="Kendaraan Travel">        
</div>
	  <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
</div>
</form>
<!-- akhir dari pencarian -->

	<table class="table table-hover table-primary">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Travel</th>
				<th>Berita</th>
				<th>Kendaraan Travel</th>
				<th>Foto Travel</th>
				<th colspan="2" style="text-align: center">Action</th> 
			</tr>			
		</thead>

		<tbody>
			<?php 
			// $query = mysqli_query($connection, "select * from hotel");
			if (isset($_POST["kirim"])) 
{
  $search = $_POST ['search'];
  $query =mysqli_query ($connection, "select travel. * from travel
        where travelKENDARAAN like '%".$search."%'");

}
else {
  $query =mysqli_query ($connection, "select travel. * from travel");

}
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['travelKODE'];?></td>
					<td><?php echo $row['berita0049'];?></td>
					<td><?php echo $row['travelKENDARAAN'];?></td>  
					<td>
						<?php if(is_file("images/".$row['travelFOTO']))
						{ ?>
							<img src="images/<?php echo $row['travelFOTO']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

					<td width="5px">
						<a href="traveledit.php?ubah=<?php echo $row['travelKODE']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
					</td>
					<td>
						<a href="travelhapus.php?hapus=<?php echo $row['travelKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
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
	</div>

	<div class="col-sm-1"></div>

	
</div>

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