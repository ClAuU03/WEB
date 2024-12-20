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
                        <h1 class="mt-4">Dashboard Pusat Oleh-Oleh</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php 
	include "include/config.php";
?>


<body>

<div class="col-sm-1"></div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h3 class="display-5">Daftar Oleh-Oleh</h3>
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
				<th>Keterangan Oleh-Oleh</th>
				<th>Foto Oleh-Oleh</th>
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

				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>

	
</div>


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    </html>