<?php
require 'function.php';
require 'ceksession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ARTIKEL</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HALAMAN UTAMA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="artikel.php">
                    <i class="bi bi-file-text"></i>
                    <span>Artikel</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="kategori.php">
                <i class="bi bi-bookmark-star"></i>
                    <span>Kategori</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="penulis.php">
                <i class="bi bi-people"></i>
                    <span>Penulis</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="logout.php">
                <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>Logged in as:</strong> <?php echo $_SESSION["email"];?></p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">KATEGORI</h1>
                    <p class="mb-4">Kelola Kategori Disini</p>

                    <!-- Data Tabel -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button class="btn btn-primary" name="btn_kategori_baru" id="btn_kategori_baru" data-toggle="modal" data-target="#ModalKategori">
                            Kategori Baru
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead> 
                                <tbody>
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
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $data_nama; ?></td>
                                        <td><?php echo $data_keterangan; ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" name="btn_ubah_kategorinih" data-toggle="modal" data-target="#modalUbahKategori<?php echo $data_id_kategori; ?>">Ubah</button>
                                            <button class="btn btn-danger btn-sm" name="btn_hapus_kategori" data-toggle="modal" data-target="#modalHapusKategori<?php echo $data_id_kategori; ?>">Hapus</button>
                                        </td>
                                    </tr>

                                    <!-- The Modal Form Ubah Kategori-->
                                    <div class="modal fade" data-backdrop="static" id="modalUbahKategori<?php echo $data_id_kategori; ?>">
                                            <div class="modal-dialog modal-l">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Tambah Kategori</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3 mt-3">
                                                            <label for="nama" class="form-label">Nama Kategori:</label>
                                                            <input type="text" class="form-control" id="nama" value="<?php echo $data_nama; ?>" name="nama">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan">Keterangan: </label>
                                                            <textarea class="form-control" rows="5" id="keterangan" name="keterangan"><?php echo $data_keterangan; ?></textarea>
                                                        </div>
                                                        <input type = "hidden" name="id_kategori_update" value="<?php echo $data_id_kategori; ?>">
                                                        <div class="mb-3 mt-3 d-flex justify-content-end gap-3">
                                                            <button class="btn btn-primary" name="btn_ubah_kategori">Ubah</button>
                                                            <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form> 
                                                </div>           
                                            </div>
                                            </div>
                                        </div>

                                   <!-- Modal Hapus Kategori -->
                                    <div class="modal fade" id="modalHapusKategori<?php echo $data_id_kategori; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Kategori</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="POST">
                                                    <div class="modal-body mb-3">
                                                        Apakah anda yakin menghapus kategori <b><?php echo $data_nama; ?></b> dari data artikel?
                                                        <div class="mb-3 mt-3 d-flex justify-content-end row-gap-3">
                                                            <button class="btn btn-danger" name="btn_hapus_kategori">Hapus</button>
                                                            <input type="hidden" name="id_hapus_kategori" value="<?php echo $data_id_kategori; ?>">
                                                            <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                            } 
                                        } else {
                                            echo "0 results";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
    
    <!-- The Modal Form Kategori-->
    <div class="modal fade" data-backdrop="static" id="ModalKategori">
        <div class="modal-dialog modal-l">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Kategori</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="nama" class="form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Kategori" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan">Keterangan: </label>
                        <textarea class="form-control" rows="5" id="keterangan" placeholder="Penjelasan Kategori" name="keterangan"></textarea>
                    <div class="mb-3 mt-3 d-flex justify-content-end gap-3">
                        <button class="btn btn-primary" name="btn_simpan_kategori">Simpan</button>
                        <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form> 
            </div>           
        </div>
        </div>
    </div>
</body>

</html>