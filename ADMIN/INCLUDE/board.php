<?php

    include "config.php";  

    $sqldestinasi = mysqli_query($connection, "SELECT *FROM destinasi");
    $jumlahdestinasi = mysqli_num_rows($sqldestinasi);
    $sqlwisata = mysqli_query($connection, "SELECT *FROM kategoriwisata");
    $jumlahwisata = mysqli_num_rows($sqlwisata);
    $sqlmahasiswa = mysqli_query($connection, "SELECT *FROM mahasiswa");
    $jumlahmahasiswa = mysqli_num_rows($sqlmahasiswa);
    $sqlhotel = mysqli_query($connection, "SELECT *FROM hotel");
    $jumlahhotel = mysqli_num_rows($sqlhotel);
    $sqloleholeh = mysqli_query($connection, "SELECT *FROM oleholeh");
    $jumlaholeholeh = mysqli_num_rows($sqloleholeh);
    $sqlrestorant = mysqli_query($connection, "SELECT *FROM restorant ");
    $jumlahrestorant  = mysqli_num_rows($sqlrestorant );
    $sqltravel = mysqli_query($connection, "SELECT *FROM travel ");
    $jumlahtravel  = mysqli_num_rows($sqltravel );    
    $sqlberita = mysqli_query($connection, "SELECT *FROM claudya ");
    $jumlahberita  = mysqli_num_rows($sqlberita );
    $sqlprovinsi = mysqli_query($connection, "SELECT *FROM provinsi ");
    $jumlahprovinsi  = mysqli_num_rows($sqlprovinsi );
    $sqlmasakan = mysqli_query($connection, "SELECT *FROM khas ");
    $jumlahmasakan  = mysqli_num_rows($sqlmasakan );

?>

<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Destinasi Wisata: <?php echo $jumlahdestinasi?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftardestinasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Kategori Wisata: <?php echo $jumlahwisata?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarkategoriwisata.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Mahasiswa: <?php echo $jumlahmahasiswa?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarmahasiswa.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Hotel: <?php echo $jumlahhotel?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarhotel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Jumlah PusatOlehOleh: <?php echo $jumlaholeholeh?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftaroleh.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Restorant: <?php echo $jumlahrestorant?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarresto.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Jumlah Travel: <?php echo $jumlahtravel?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftartravel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Jumlah Berita: <?php echo $jumlahberita?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarberita.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-white text-black mb-4">
                                    <div class="card-body">Jumlah Provinsi: <?php echo $jumlahprovinsi?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-black stretched-link" href="daftarprovinsi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Khas Daerah: <?php echo $jumlahmasakan?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarkhas.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            </div>