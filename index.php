<!DOCTYPE html>
<html lang="en">
  <?php 
      include "admin/INCLUDE/config.php";
      $sqldestinasi = mysqli_query($connection, "SELECT *FROM destinasi");
      $jumlahdestinasi = mysqli_num_rows($sqldestinasi);
      $hotelinfo = mysqli_query ($connection, "select * from 
      hotel,provinsi where hotel.provinsiKODE = provinsi.provinsiKODE");
      $kategori = mysqli_query ($connection, "select * from kategoriwisata");
      $hotel = mysqli_query ($connection, "select * from hotel");
      $provinsi = mysqli_query ($connection, "select * from provinsi");
      $restorant = mysqli_query ($connection, "select * from restorant,khas where restorant.khasKODE = 
      khas.khasKODE");     
      $travel = mysqli_query ($connection, "select * from travel,claudya where
      travel.berita0049 = claudya.berita0049");
      $destinasi = mysqli_query ($connection, "select * from 
      destinasi,kategoriwisata where destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
      $destinasiinfo = mysqli_query ($connection, "select * from 
      destinasi,kategoriwisata where destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
      $oleholeh = mysqli_query ($connection, "select * from 
      oleholeh,provinsi where oleholeh.provinsiKODE = provinsi.provinsiKODE");
      $uasclaudya = mysqli_query ($connection, "select * from 
      claudyauas,destinasi where claudyauas.destinasiKODE = destinasi.destinasiKODE");
  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Other meta tags and stylesheets -->
    <!-- Your existing code -->
</head>

</head>
<body>
<div class="container-fluid" style="background-color: #2c3e50;" >
    <!-- container itu gede, jadi container-fluid dipakai untuk membuat lebih kecil/menyisakan ruang di sisinya -->
<!-- membuat menu -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2c3e50;">

  <div class="container-fluid ">
    <a class="navbar-brand" href="#"  style="color: white; font-size: 30px">Travel With Us</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color: white">
        <li class="nav-item" >
          <a class="nav-link active" aria-current="page" href="index.php"  style="color: white">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"  style="color: white">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" 
          aria-expanded="false"  style="color: white">
            Kategori Wisata 
          </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if(mysqli_num_rows($kategori)>0)
            { while($row= mysqli_fetch_array ($kategori))
              {   ?>
                <li><a class="dropdown-item"  
                href="indexdetail.php?detail=<?php echo urlencode($row["kategoriKODE"])?>"><?php echo $row["kategoriNAMA"]?></a></li>
           <?php  }
            }?> 
            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>  -->
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
           aria-expanded="false"  style="color: white">
            Hotel
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if(mysqli_num_rows($provinsi)>0)
            { while($row= mysqli_fetch_array ($provinsi))
              {   ?>
                <li><a class="dropdown-item" 
                href="indexdetailhotel.php?detail=<?php echo urlencode($row["provinsiKODE"])?>"><?php echo $row ["provinsiNAMA"] ?><span>-</span> <?php echo $row ["provinsiIBUKOTA"]?></a></li>
           <?php  }
            }?> 
            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>  -->
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" 
          aria-expanded="false"  style="color: white">
            Restorant
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if(mysqli_num_rows($restorant)>0)
            { while($row= mysqli_fetch_array ($restorant))
              {   ?>
                <li><a class="dropdown-item" 
                href="indexdetailresto.php?detail=<?php echo urlencode($row["khasKODE"])?>"><?php echo $row["khasDAERAH"]?></a></li>
           <?php  }
            }?> 
            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>  -->
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" 
          aria-expanded="false"  style="color: white">
            UAS
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if(mysqli_num_rows($uasclaudya)>0)
            { while($row= mysqli_fetch_array ($uasclaudya))
              {   ?>
                <li><a class="dropdown-item" 
                href="indexUAS.php?detail=<?php echo urlencode($row["claudyaID"])?>"><?php echo $row["destinasiNAMA"]?></a></li>
           <?php  }
            }?> 
            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>  -->
          </ul>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"  style="color: white">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- akhir menu--> 

<!-- membuat slider -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>

  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="admin/images/travel4.png" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1><b>TRAVEL WITH US </b></h1>
        </div>
    </div>


    <div class="carousel-item">
    <img src="admin/images/travel2.png" class="d-block w-100" alt="Foto Tidak Ada ">
      <div class="carousel-caption">
      <h1><b>STAY WITH US </b></h1>
        </div>
    </div>

    <div class="carousel-item">
      <img src="admin/images/travel3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption ">
        <h1><b>EAT WITH US </b></h1>
        </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- akhir slider -->

<!-- membuat berita -->
<div class="container" style="margin-top: 20px;">
<div class="row">
<div class="col-sm-8"  style="background: #2f3640" >         <!-- sm untuk kalo dibuka di hape , untuk menyesuaikan ukuran kolom di hape -->
    <?php 
      if (mysqli_num_rows($destinasi)>0)
      {
         while ($row=mysqli_fetch_array($destinasi))
         {   ?>
    <div class="d-flex">
      
    <img style="width: 200px; height: 100%;"src="admin/images/<?php echo $row["destinasiFOTO"]?>" alt="No Image">
        <div class="flex-shrink-0">
        <!-- height: 100% ngikutin widthnya -->
        </div> <!--penutup flexshrink -->
        <div class="flex-grow-1" style="margin-left: 20px; color: white;">
            <h2><?php echo $row["destinasiNAMA"]?> <small class="text-muted" style="font-size: 15px;">
              <i style="color: #f9ca24"><?php echo $row ["kategoriNAMA"]?></i></small></h2>
            <p><?php echo substr($row ["destinasiKET"],0,150)?> ...</p>
            <a href="readmoreindex.php?detail=<?php echo urlencode($row["destinasiKODE"])?>" class="btn btn-warning btn-outline-light">Read More </a>
        </div> <!--penutup flex-grow-->
    </div>  <!--penutup d-flex-->
    <div class="mb-5 row"> </div>

    <?php }
      }
    ?>
</div> <!--penutup col 9 -->
<div class="col-sm-1"></div>

    <div class ="col-sm-3">
    <div class="card" style="width: 18rem; background: #f5f6fa;">
    <img style ="width: 285px; height: 100%;" img src="admin/images/RESTAURANT.png" class="card-img-top" 
    alt="..." >
    <div class="card-body">
    <h5 class="card-title">RESTAURANT</h5>
    <p class="card-text">Tersedia bermacam macam daftar restoran terenak yang dapat kunjungi.</p>
    <a href="indexrestorant.php" class="btn btn-warning btn-outline-light">More</a>
  </div>
</div>  

<div class="card" style="width: 18rem; background: #f5f6fa; margin-top: 20px;">
    <img style ="width: 285px; height: 100%;" img src="admin/images/HOTEL.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">HOTEL</h5>
    <p class="card-text">Tersedia bermacam macam daftar Hotel yang terjamin menyediakan tempat yang nyaman dan layak untuk para tamunya.</p>
    <a href="indexhotel.php" class="btn btn-warning btn-outline-light">More</a>
  </div>
</div>  


    </div> <!-- penutup col 3 -->


</div> <!--penutup row-->
</div><!--penutup container-->


<!-- akhir berita -->

<!--gallery -->
<!-- Carousel wrapper -->
<div
  id="carouselMultiItemExample"
  class="carousel slide carousel-dark text-center"
  data-mdb-ride="carousel"
>
  <!-- Controls -->
  <div class="d-flex justify-content-center mb-4">
    <button
      class="carousel-control-prev position-relative"
      type="button"
      data-mdb-target="#carouselMultiItemExample"
      data-mdb-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next position-relative"
      type="button"
      data-mdb-target="#carouselMultiItemExample"
      data-mdb-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- Inner -->
<div class="carousel-inner py-4" style="background: #c8d6e5; margin-top: 40px;";>

<h1 class="card-title" style="margin-bottom: 40px;">Jasa Travel</h1>
  <?php 
  
    if (mysqli_num_rows($travel) > 0) {
        $count = 0; // Tambahkan variabel hitungan
        $itemRow = 3;
        while ($row = mysqli_fetch_array($travel)) {
            if ($count % $itemRow == 0) { // Baris baru setiap tiga gambar
              echo'<div class="carousel-item';
              echo $count == 0 ? 'active': '';
              echo '"><div class="container"><div class="row">';
             }?>
                <!-- Single item -->
                <div class="col-lg-4">
                  <div class="card" style="background:#f5f6fa;">
                    <img
                      src="admin/images/<?php echo $row["travelFOTO"]?>"
                      class="card-img-top"
                      alt="Waterfall"
                      style="height:100%;"
                    />
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row["travelKENDARAAN"]?></h5>
                      <p class="card-text"><?php echo $row ["kategoriberita0049"]?>
                      </p>
                      <a href="detailstravel.php?detail=<?php echo urlencode($row["travelKODE"])?>" class="btn btn-warning btn-outline-light">Details</a>
                    </div>
                  </div>
                </div>
  <?php
            $count++;
            if ($count % $itemRow == 0) { // Tutup baris setiap tiga gambar
              echo'</div></div></div>';
            }
          }
        // Tutup item carousel jika jumlah data tidak habis dibagi 3
        if ($count % $itemRow != 0) {
          echo'</div></div></div>';
        }
    }
  ?>
</div>

  <!-- Inner -->

  <!-- Inner -->
<!-- Carousel wrapper -->
<!-- akhir gallery-->


<!-- Author 1 - Bootstrap Brain Component -->
<section class="py-5" style="background: #3c6382";>
  <div class="container overflow-hidden bsb-author-1";>
    <div class="row justify-content-center gy-4 gy-md-0">
      <div class="col-12 col-md-3 col-xl-2 d-flex align-items-center justify-content-center">
        <img class="img-fluid rounded-circle author-avatar" loading="lazy" src="admin/images/profile.jpg" alt="Elio Evander">
      </div>
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 d-flex align-items-center justify-content-center">
        <div class="text-center text-md-start author-content" style="color: #ffffff";>
          <h5 class="text-light fs-7" >Article written by</h5>
          <h2 class="fs-2 mb-3">Claudya Christine</h2>
          <p class="mb-3">NIM 825220049, Kelas SI A</p>
          <p class="mb-0">
 
          </p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5";>

  <footer class="text-white text-center text-lg-start bg-dark">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row mt-4">
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">About company</h5>

          <p>
            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
            voluptatum deleniti atque corrupti.
          </p>

          <p>
            Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
            molestias.
          </p>

          <div class="mt-4">
            <!-- Facebook -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
            <!-- Dribbble -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-dribbble"></i></a>
            <!-- Twitter -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
            <!-- Google + -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google-plus-g"></i></a>
            <!-- Linkedin -->
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4 pb-1">Search something</h5>

          <div class="form-outline form-white mb-4">
            <input type="text" id="formControlLg" class="form-control form-control-lg" />
            <label class="form-label" for="formControlLg">Search</label>
          </div>

          <ul class="fa-ul" style="margin-left: 1.65em;">
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Warsaw, 00-967, Poland</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">contact@example.com</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 48 234 567 88</span>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Opening hours</h5>

          <table class="table text-center text-white">
            <tbody class="fw-normal">
              <tr>
                <td>Mon - Thu:</td>
                <td>8am - 9pm</td>
              </tr>
              <tr>
                <td>Fri - Sat:</td>
                <td>8am - 1am</td>
              </tr>
              <tr>
                <td>Sunday:</td>
                <td>9am - 10pm</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>

</div>
<!-- End of .container -->


</div> <!--penutup container fluid -->


</body>
<!--script menu -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--akhir dari script menu-->



</html>