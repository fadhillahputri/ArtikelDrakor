<?php
require 'admin/function.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home - DramaKoreaSpot</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style type="text/css">
        .tentang {
            text-align: justify;
        }
        </style>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="http://localhost/WEB_Teori/">DramaKoreaSpot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://localhost/WEB_Teori/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <!-- Page header with logo and tagline-->
        <header class="py-3 bg-light border-bottom mb-4">
            <div class="container" style="background-image: url('admin/gambar/korean.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;height: 250px;">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">WELCOME TO OUR BLOG!</h1>
                    <p class="lead mb-0"><b>Information, Reviews and Latest Korean Drama Updates</b></p>
                </div>
            </div>
        </header>

        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php
                    $sql = "SELECT 
                    kontributor.id_kontributor,
                    kontributor.id_kategori,
                    artikel.tanggal,
                    artikel.judul,
                    artikel.isi,
                    penulis.nama_penulis,
                    kategori.nama_kategori,
                    artikel.gambar
                    FROM 
                        kontributor
                    JOIN 
                        artikel ON kontributor.id_artikel = artikel.id_artikel
                    JOIN 
                        penulis ON kontributor.id_penulis = penulis.id_penulis
                    JOIN 
                        kategori ON kontributor.id_kategori = kategori.id_kategori
                    ORDER BY id_kontributor DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $nomor = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $nomor++;
                            $data_tanggal = $row['tanggal'];
                            $data_judul = $row['judul'];
                            $data_kategori = $row['nama_kategori'];
                            $data_id_kategori = $row['id_kategori'];
                            $data_penulis = $row['nama_penulis'];
                            $data_gambar = $row['gambar'];
                            $data_id_kontributor = $row['id_kontributor'];
                            $data_idkategori = $row['id_kategori'];
                            $data_isi = $row['isi'];
                            $data_potongan_artikel = potong_artikel($data_isi, 250);
                    ?>
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="admin/<?php echo $data_gambar; ?>" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $data_tanggal; ?></div>
                            <h2 class="card-title"><?php echo $data_judul; ?></h2>
                            <p class="card-text"><?php echo $data_potongan_artikel; ?></p>
                            <a class="btn btn-primary" href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>">Read more →</a>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                    <?php
                    $sql_post = "SELECT 
                    kontributor.id_kontributor,
                    kontributor.id_kategori,
                    artikel.tanggal,
                    artikel.judul,
                    artikel.isi,
                    penulis.nama_penulis,
                    kategori.nama_kategori,
                    artikel.gambar
                    FROM 
                        kontributor
                    JOIN 
                        artikel ON kontributor.id_artikel = artikel.id_artikel
                    JOIN 
                        penulis ON kontributor.id_penulis = penulis.id_penulis
                    JOIN 
                        kategori ON kontributor.id_kategori = kategori.id_kategori
                    WHERE kontributor.id_kontributor < (SELECT MAX(kontributor.id_kontributor) FROM kontributor)
                    ORDER BY kontributor.id_kontributor DESC LIMIT 6";
                    $result_post = mysqli_query($conn, $sql_post);
                    $nomor = 0;
                    if (mysqli_num_rows($result_post) > 0) {
                        while($row = mysqli_fetch_assoc($result_post)) {
                            $nomor++;
                            $data_tanggal = $row['tanggal'];
                            $data_judul = $row['judul'];
                            $data_kategori = $row['nama_kategori'];
                            $data_id_kategori = $row['id_kategori'];
                            $data_penulis = $row['nama_penulis'];
                            $data_gambar = $row['gambar'];
                            $data_id_kontributor = $row['id_kontributor'];
                            $data_isi = $row['isi'];
                            $data_potongan_artikel = potong_artikel($data_isi, 100);
                    ?>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="admin/<?php echo $data_gambar; ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $data_tanggal; ?></div>
                                    <h2 class="card-title h4"><?php echo $data_judul; ?></h2>
                                    <p class="card-text"><?php echo $data_potongan_artikel; ?></p>
                                    <a class="btn btn-primary" href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>">Read more →</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                    </div>
                </div>
                
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <form action="search.php" method="GET">
            <div class="input-group">
                <input class="form-control" type="text" name="query" placeholder="Enter keywords!" aria-label="Enter search term..." aria-describedby="button-search" required />
                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
            </div>
        </form>
    </div>
</div>

                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="list-group">
                                    <?php 
                                        $sql = "SELECT 
                                            id_kategori,
                                            nama_kategori,
                                            keterangan
                                        FROM 
                                            kategori
                                        ORDER BY
                                            id_kategori DESC
                                            ";
                                        $result = mysqli_query($conn, $sql);
                                        $nomor = 0;
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $nomor++;
                                                $data_nama = $row['nama_kategori'];
                                                $data_keterangan = $row['keterangan'];
                                                $data_id_kategori = $row['id_kategori'];
                                    ?>
                                        <a href="kategori.php?id_kategori=<?php echo $data_id_kategori;?>" class="list-group-item list-group-item-action"><?php echo $data_nama; ?></a>
                                    <?php
                                            }
                                        }else{

                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">About</div>
                        <div class="card-body tentang">Welcome to DramaKoreaSpot, your ultimate source for all things related to Korean dramas! 
                            Our blog is dedicated to providing you with the latest information, detailed reviews, and timely updates on your favorite K-dramas. Whether you're a long-time fan or new to the world of Korean entertainment, DramaKoreaSpot is here to guide you through the best dramas, introduce you to the stars, and keep you informed about the latest trends and news. Join our community of drama enthusiasts and 
                            dive into the captivating world of Korean storytelling with us!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; DramaKoreaSpot</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
