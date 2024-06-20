<?php
require 'admin/function.php';
$query = $_GET['query'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Search Results - DramaKoreaSpot</title>
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
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mt-4">Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
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
                WHERE artikel.judul LIKE '%$query%' OR artikel.isi LIKE '%$query%' OR penulis.nama_penulis LIKE '%$query%'
                ORDER BY id_kontributor DESC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $data_tanggal = $row['tanggal'];
                        $data_judul = $row['judul'];
                        $data_penulis = $row['nama_penulis'];
                        $data_gambar = $row['gambar'];
                        $data_id_kontributor = $row['id_kontributor'];
                        $data_id_kategori = $row['id_kategori'];
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
                } else {
                    echo "<p>No results found for your search query.</p>";
                }
                ?>
            </div>
            <!-- Sidebar widgets-->
            <div class="col-lg-4">
                <!-- Categories widget and other widgets-->
                <!-- ... -->
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
