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

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pusat Oleh-Oleh</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head> 

<?php 
	include "include/config.php";
	if(isset($_POST['edit']))
	{
		$kodeoleh = $_POST['inputkode'];
		$namaoleh = $_POST['inputnama'];
		$provinsikode = $_POST['inputprovinsi'];
		$ketoleh = $_POST['inputket'];
		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			// mysqli_query($connection, "insert into oleholeh value ('$kodeoleh', '$namaoleh', '$provinsikode','$ketoleh','$namafile')");
            mysqli_query($connection, "UPDATE oleholeh SET olehNAMA ='$namaoleh', provinsiKODE= '$provinsikode' , olehKET='$ketoleh', olehFOTO = '$namafile'
            WHERE olehKODE = '$kodeoleh' ");

            header("location:oleholeh.php");
		}

	}
	$dataprovinsi= mysqli_query($connection, "select * from provinsi");
    $kodeoleholeh = $_GET['ubah'];  
    $editoleh = mysqli_query ($connection, "select * from oleholeh
              where olehKODE = '$kodeoleholeh'"); 
              $rowedit = mysqli_fetch_array ($editoleh);

    $editprovinsi= mysqli_query ($connection, "select * from oleholeh,provinsi
          where olehKODE = '$kodeoleholeh' and oleholeh.provinsiKODE = provinsi.provinsiKODE"); 
    $rowedit2 = mysqli_fetch_array ($editprovinsi);
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Input data Oleh-oleh</h1>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="kodeoleh" class="col-sm-2 col-form-label">Kode Oleh-Oleh</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodeoleh" name="inputkode" 
                placeholder="Kode Photo" maxlength="4" value="<?php echo $rowedit ["olehKODE"];?>" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="namaoleh" class="col-sm-2 col-form-label">Nama Oleh-Oleh</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namaoleh" name="inputnama" 
                placeholder="Nama Photo" value="<?php echo $rowedit ["olehNAMA"];?>">
			</div>
		</div>

		<div class="form-group row">
    <label for="kodeprov" class="col-sm-2 col-form-label mb-sm-3">Asal Oleh-Oleh</label>
    <div class="col-sm-9">
    <select class="form-control" id="kodeprov" name="inputprovinsi" value="<?php echo $rowedit ["provinsiKODE"];?>">
        <option>Asal</option>
        <?php while($row = mysqli_fetch_array($dataprovinsi)) 
        { ?>
        <option value="<?php echo $row ["provinsiKODE"]?>">
        <?php echo $row["provinsiKODE"]?>
        <?php echo $row["provinsiNAMA"]?>
        </option>
        <?php }?>
        </select>
    </div>
  </div>

  <div class="form-group row">
			<label for="ketoleh" class="col-sm-2 col-form-label">Keterangan Oleh-Oleh</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="ketoleh" name="inputket" 
                placeholder="Nama Photo" value="<?php echo $rowedit ["olehKET"];?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Foto Oleh-Oleh</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file" value="<?php echo $rowedit ["olehFOTO"];?>">
				<p class="help-block">Field ini digunakan untuk unggah file,wajib di isi (HARUS JPG)</p>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
            <input type="submit" name="edit" class="btn btn-primary" value="UBAH">
			<input type="reset" name="Batal" class="btn btn-secondary" value="Batal">
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
				<h1 class="display-4">Daftar Oleh-Oleh</h1>
			</div>
		</div>

<!-- membuat form pencarian data -->
		<form method = "POST">

<div class="form-group row mb-2">    <!-- kyk bikin div container -->        
<label for = "search" class="col-sm-3">Cari </label>
<div class="col-sm-6">
	  <input type ="text" name="search" class="form-control" id="search"
	  value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
	  placeholder="Nama Oleh-Oleh">        
</div>
	  <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
</div>
</form>
<!-- akhir dari pencarian -->

	<table class="table table-hover table-primary">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Oleh-Oleh</th>
				<th>Nama Oleh-Oleh</th>
				<th>Asal</th>  
				<th>Foto Oleh-Oleh</th>
				<th>Keterangan Oleh-Oleh</th>  
				<th colspan="2" style="text-align: center">Action</th> 
			</tr>			
		</thead>

		<tbody>
			<?php 
			// $query = mysqli_query($connection, "select * from oleholeh");
			if (isset($_POST["kirim"])) 
{
  $search = $_POST ['search'];
  $query =mysqli_query ($connection, "select oleholeh. * from oleholeh
        where olehNAMA like '%".$search."%'");

}
else {
  $query =mysqli_query ($connection, "select oleholeh. * from oleholeh");

}
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['olehKODE'];?></td>
					<td><?php echo $row['olehNAMA'];?></td>
					<td><?php echo $row['provinsiKODE'];?></td>  
					<td><?php echo $row['olehKET'];?></td>  
					<td>
						<?php if(is_file("images/".$row['olehFOTO']))
						{ ?>
							<img src="images/<?php echo $row['olehFOTO']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

					<td width="5px">
						<a href="olehedit.php?ubah=<?php echo $row['olehKODE']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
					</td>
					<td>
						<a href="olehhapus.php?hapus=<?php echo $row['olehKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
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


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <?php include "INCLUDE/board.php";?>
                    </div>
                </main>
                <?php include "INCLUDE/footer.php";?>
            </div>
        </div>
    <?php include "INCLUDE/jsscript.php";?>

    <?php ob_end_flush()?>

	</html>