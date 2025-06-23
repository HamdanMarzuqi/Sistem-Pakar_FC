<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakarku_coba</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="#">PakarKu</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PakarKu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <?php
                        if ($_SESSION['role'] !== "Pasien") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=gejala">Gejala</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=penyakit">Penyakit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=aturan">Basis Pengetahuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=konsultasi_admin">Konsultasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=logout">Logout</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=konsultasi">Konsultasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=logout">Logout</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <?php
            if ($_SESSION['role'] !== "Pasien") {
            ?>
                <a href="?page=users" class="login-button">Info Login</a>
            <?php
            }
            ?>

            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Deteksi Dini Penyakit Jantung</h1>
            <h2>RS Muhammadiyah Lamongan</h2>
        </div>
    </section>

    <div class="container">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page == "") {
            include "welcome.php";
        } elseif ($page == "gejala") {
            if ($action == "") {
                include "tampil_gejala.php";
            } elseif ($action == "tambah") {
                include "tambah_gejala.php";
            } elseif ($action == "update") {
                include "update_gejala.php";
            } else {
                include "hapus_gejala.php";
            }
        } elseif ($page == "penyakit") {
            if ($action == "") {
                include "tampil_penyakit.php";
            } elseif ($action == "tambah") {
                include "tambah_penyakit.php";
            } elseif ($action == "update") {
                include "update_penyakit.php";
            } else {
                include "hapus_penyakit.php";
            }
        } elseif ($page == "aturan") {
            if ($action == "") {
                include "tampil_aturan.php";
            } elseif ($action == "tambah") {
                include "tambah_aturan.php";
            } elseif ($action == "detail") {
                include "detail_aturan.php";
            } elseif ($action == "update") {
                include "update_aturan.php";
            } elseif ($action == "hapus_gejala") {
                include "hapus_detail_aturan.php";
            } else {
                include "hapus_aturan.php";
            }
        } elseif ($page == "konsultasi") {
            if ($action == "") {
                include "tampil_konsultasi.php";
            } else {
                include "hasil_konsultasi.php";
            }
        } elseif ($page == "konsultasi_admin") {
            if ($action == "") {
                include "tampil_konsultasi_admin.php";
            } else {
                include "detail_konsultasi_admin.php";
            }
        } elseif ($page == "users") {
            if ($action == "") {
                include "tampil_users.php";
            } elseif ($action == "hapus") {
                include "hapus_users.php";
            }
        } else {
            include "logout.php";
        }
        ?>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="assets/js/all.js"></script>
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
        $(function() {
            $('.chosen').chosen();
        });
    </script>
</body>

</html>