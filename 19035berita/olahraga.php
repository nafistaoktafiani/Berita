<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Berita</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Top Header End -->


        <!-- Header Start -->
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="index.php" class="nav-item nav-link active">Beranda</a>
                            <a href="olahraga.php" class="nav-item nav-link">Olahraga</a>
                            <a href="teknologi.php" class="nav-item nav-link">Teknologi</a>
                            <a href="fashion.php" class="nav-item nav-link">Fashion</a>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <!-- <a href="#"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a> -->
                        <a href="news-website-templates/../admin/login-admin.php"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login sebagai admin</small></a>
                        <div class="dropdown">
                            <!-- <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->


<div class="row">
    <?php
    include 'koneksi.php'; // Pastikan koneksi database sesuai

    $query = "SELECT * FROM olahraga ORDER BY id DESC"; // Sesuaikan nama tabel dan kolom
    $query_run = mysqli_query($conn, $query);

    if ($query_run && mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $judul = htmlspecialchars($row['judul']);
            $deskripsi = htmlspecialchars($row['deskripsi']);
            $foto = htmlspecialchars($row['foto']); // Nama file gambar
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="guide-item">
                    <div class="guide-img">
                        <div class="guide-img-efects">
                        <img src="http://localhost/news-website-templates/images/olahraga/<?php echo htmlspecialchars($foto); ?>" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                    </div>
                    <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                            <h4 class="mt-3"><?php echo $judul; ?></h4>
                            <p class="mb-0"><?php echo $deskripsi; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Tidak ada data ditemukan.</p>";
    }
    ?>
</div>

 <!-- Footer Start -->
 <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Berita</h3>
                            <ul>
    <li><a href="index.php">Beranda</a></li>
    <li><a href="olahraga.php">Olahraga</a></li>
    <li><a href="teknologi.php">Teknologi</a></li>
    <li><a href="Fashion.php">Fashion</a></li>
</ul>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Alamat</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>274 Gelang, Rakit, Banjarnegara</p>
                                <p><i class="fa fa-envelope"></i>nafista@hotnews.com</p>
                                <p><i class="fa fa-phone"></i>+62 236-897-3675</p>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Newsletter</h3>
                            <div class="newsletter">
                                <p>
                                Menyajikan informasi yang akurat dan terkini dari seluruh penjuru dunia
                                </p>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->


        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>


        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
