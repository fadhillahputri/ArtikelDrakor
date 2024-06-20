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
    <title>About - DramaKoreaSpot</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
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
    <header class="py-3 bg-light border-bottom mb-4">
        <div class="container" style="background-image: url('admin/gambar/korean.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;height: 250px;">
            <div class="text-center my-5">
                <h1 class="fw-bolder">ABOUT US</h1>
                <p class="lead mb-0"><b>Learn more about DramaKoreaSpot</b></p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body tentang">
                        <h2>About DramaKoreaSpot</h2>
                        <p style="text-align: justify;">
                            Welcome to DramaKoreaSpot, your ultimate source for all things related to Korean dramas! Our blog is dedicated to providing you with the latest information, detailed reviews, and timely updates on your favorite K-dramas. Whether you're a long-time fan or new to the world of Korean entertainment, DramaKoreaSpot is here to guide you through the best dramas, introduce you to the stars, and keep you informed about the latest trends and news.
                        </p>
                        <p style="text-align: justify;">
                            Dive into the mesmerizing world of Korean storytelling with us. At DramaKoreaSpot, we celebrate the artistry, passion, and heart that go into creating your favorite dramas. We take pride in offering you insightful articles, exclusive behind-the-scenes looks, and heartfelt commentary that you won't find anywhere else. Our goal is to make sure you never miss a beat in the vibrant and ever-evolving K-drama landscape.
                        </p>
                        <p style="text-align: justify;">
                            Our mission is to build a community of drama enthusiasts who can share their love for Korean storytelling. We are committed to delivering high-quality content and fostering an engaging environment for all our readers. Thank you for visiting DramaKoreaSpot. We hope you enjoy your time here and become a part of our growing community!
                        </p>
                        <p style="text-align: justify;">
                            Stay tuned for regular updates and join us on this exciting journey. Whether you're here to discover new dramas, revisit old favorites, or simply connect with fellow fans, DramaKoreaSpot is the perfect place for you. Happy drama-watching!
                        </p>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
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
                                            id_kategori DESC";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $data_nama = $row['nama_kategori'];
                                                $data_id_kategori = $row['id_kategori'];
                                    ?>
                                        <a href="kategori.php?id_kategori=<?php echo $data_id_kategori;?>" class="list-group-item list-group-item-action"><?php echo $data_nama; ?></a>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Contact</div>
                    <div class="card-body tentang">
                        <p style="text-align: justify;">If you have any questions or comments, please don't hesitate to contact us. We value your feedback and look forward to hearing from you!</p>
                    </div>
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
