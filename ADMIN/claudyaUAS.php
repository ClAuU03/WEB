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
                        <h1 class="mt-4">Dashboard Claudya UAS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$idclaudya= $_POST['inputid'];
		$kotaclaudya = $_POST['inputkota'];
		$kodedestinasi = $_POST['inputkode'];

			mysqli_query($connection, "insert into claudyauas values ('$idclaudya', '$kotaclaudya', 
            '$kodedestinasi')");
			header("location:claudyaUAS.php");
		

	}

	$datadestinasi = mysqli_query($connection, "select * from destinasi");
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-5">Input data</h2>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="idbuatclaudya" class="col-sm-3 col-form-label mb-sm-3">ID Claudya</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="idclaudya" name="inputid" placeholder="id" maxlength="4">
			</div>
		</div>

		<div class="form-group row">
			<label for="kotabuatclaudya" class="col-sm-3 col-form-label mb-sm-3">Kota Claudya</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="kotabuatclaudya" name="inputkota" placeholder="Kota">
			</div>
		</div>

		<div class="form-group row">
    <label for="kodebuatdestinasi" class="col-sm-3 col-form-label mb-sm-3">Destinasi</label>
    <div class="col-sm-9">
    <select class="form-control" id="kodebuatdestinasi" name="inputkode">
        <option>Destinasi</option>
        <?php while($row = mysqli_fetch_array($datadestinasi)) 
        { ?>
        <option value="<?php echo $row ["destinasiKODE"]?>">
        <?php echo $row["destinasiKODE"]?>
        <?php echo $row["destinasiNAMA"]?>
        </option>
        <?php }?>
        </select>
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
				<h3 class="display-5">Claudya UAS</h3>
			</div>
		</div>

<!-- membuat form pencarian data -->
		<form method = "POST">

<div class="form-group row mb-2">    <!-- kyk bikin div container -->        
<label for = "search" class="col-sm-3">Cari </label>
<div class="col-sm-6">
	  <input type ="text" name="search" class="form-control" id="search"
	  value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];}?>"
	  placeholder="Nama Kota">        
</div>
	  <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
</div>
</form>
<!-- akhir dari pencarian -->

	<table class="table table-hover table-primary">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Kota</th>
				<th>Destinasi</th>
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
  $query =mysqli_query ($connection, "select claudyauas. * from claudyauas
        where claudyaKOTA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
// --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- 
//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
}
else {
  $query =mysqli_query ($connection, "select claudyauas. * from claudyauas limit $mulaitampilan, $jumlahtampilan");
//	pada bagian ini tambhan --- limit $mulaitampilan, $jumlahtampilan ---	
}
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor;?></td>
					<!-- pad bagian ini ganti dengan $mulaitampilan + $nomor -->
<!-- ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN -------------- -->  
					<td><?php echo $row['claudyaID'];?></td>
					<td><?php echo $row['claudyaKOTA'];?></td>  
                    <td><?php echo $row['destinasiKODE'];?></td>  
				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
	
<!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
<?php 
    $query = mysqli_query($connection, "SELECT * FROM claudyauas");
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