<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar Using Bootstrap 5</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">

</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="#">Logo</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Portofolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" class="login-button">Login</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" 
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- end Navbar -->

    <!-- hero section -->
    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Responsive Navbar</h1>
            <h2>Bootstrap 5</h1>
        
        </div>
    </section>

    <!-- end hero section -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>





<!-- ini navbar asli -->
<nav class="navbar bg-success navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="?page=gejala">Gejala</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=penyakit">Penyakit</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?page=aturan">Basis Aturan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="#">Konsultasi</a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link " href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- ini welcome asli -->
<h1 class="text-center">SELAMAT DATANGGGGG</h1>
<h3 class="text-center">SISTEM PAKAR DETEKSI PENYAKIT JANTUNG METODE FORWARD CHAINING</h3>
<H3 class="text-center">RS MUHAMMADIYAH LAMONGAN</H3>
<h1><img src="RSMLa.png" width="1150px;"></h1>



<!-- ini bootstrap JS asli -->
<script src="assets/js/bootstrap.min.js"></script>



<!-- ini chosen select css asli -->
<link rel="stylesheet" href="assets/css/bootstrap-chosen.css">





<!-- ini tampil_gejala.php yang asli -->
<div class="card">
  <div class="card-header bg-success text-white border-dark"><strong>Data Gejala</strong></div>
  <div class="card-body">
    <a class="btn btn-success mb-2" href="?page=gejala&action=tambah">Tambah</a>
    <table class="table table-hover" id="myTable">
      <thead>
        <tr>
          <th width="10px">No.</th>
          <th width="700px">Nama Gejala</th>
          <th width="100"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT*FROM gejala ORDER BY nmgejala ASC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nmgejala']; ?></td>
            <td align="center">
              <!-- edit -->
              <a class="btn btn-warning" href="?page=gejala&action=update&id=<?php echo $row['idgejala']; ?>">
                <i class="fas fa-pen"></i>

              </a>
              <!-- hapus -->
              <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=gejala&action=hapus&id=<?php echo $row['idgejala']; ?>">
                <i class="fas fa-times-circle"></i>

            </td>
          </tr>
        <?php
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>






<!-- ini index.php asli -->
<?php
// koneksi database
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPPJFC_coba2</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatables css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- Chosen select css -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  
<!-- navbar -->
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
                            <a class="nav-link mx-lg-2" href="?page=konsultasi">Konsultasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="?page=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="?page=users" class="login-button">Users</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" 
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- hero section -->
    <section class="hero-section">
    <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Deteksi Penyakit Jantung</h1>
            <h2>RS Muhammadiyah Lamongan</h1>
        
        </div>
    </section>

    <!-- end hero section -->

<!-- container -->
<div class="container">

<!-- setting menu (action= tambah dan edit, page= utk halaman--> 
<?php
$page = isset($_GET['page']) ? $_GET['page'] : "";
$action = isset($_GET['action']) ? $_GET['action'] : "";

if ($page==""){
    include "welcome.php";
}elseif ($page=="gejala"){
    if ($action==""){
        include "tampil_gejala.php";
    }elseif ($action=="tambah"){
        include "tambah_gejala.php";
    }elseif ($action=="update"){
        include "update_gejala.php";
    }else{
        include "hapus_gejala.php";
    }
  }elseif ($page=="penyakit"){
    if ($action==""){
        include "tampil_penyakit.php";
    }elseif ($action=="tambah"){
        include "tambah_penyakit.php";
    }elseif ($action=="update"){
        include "update_penyakit.php";
    }else{
        include "hapus_penyakit.php";
    }
  }elseif ($page=="aturan"){
    if ($action==""){
        include "tampil_aturan.php";
    }elseif ($action=="tambah"){
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
  } else {
    include "NAMA_HALAMAN";
  }
  ?>

</div>

<!-- jquery -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- datatables js -->
<script src="assets/js/datatables.min.js"></script>
<script>
      $(document).ready(function() {
            $('#myTable').DataTable();
      } );
  </script>

<!-- Font Awesome js -->
<script src="assets/js/all.js"></script>
<!-- Chosen js -->
<script src="assets/js/chosen.jquery.min.js"></script>
  <script>
    $(function() {
      $('.chosen').chosen();
    });
  </script>


</body>
</html>



<!-- style.css yang asli -->
.navbar {
    background-color: green;
    height: 80px;
    margin: 20px;
    border-radius: 16px;
    padding: 0.5rem;
}

.navbar-brand {
    font-weight: 500;
    color: #fff;
    font-size: 24px;
    transition: 0.3s color;
}

.login-button {
    background-color: #fff;
    color: #009970;
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 50px;
    text-decoration: none;
    transition: 0.3s background-color;
}

.login-button:hover {
    background-color: #001bb3;
}

.navbar-toggler {
    border: none;
    font-size: 1.25rem;
}

.navbar-toggler:focus,
.btn-close:focus {
    box-shadow: none;
    outline: none;
}

.nav-link {
    color: #666777;
    font-weight: 500;
    position: relative;
}

.nav-link:hover,
.nav-link.active {
    color: #000;
}

@media (min-width: 991px) {
    .nav-link::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%);
        width: 0;
        height: 2px;
        background-color: #009970;
        visibility: hidden;
        transition: 0.3s ease-in-out;
    }

    .nav-link:hover::before,
    .nav-link:active::before {
        width: 100%;
        visibility: visible;
    }
}


<!-- style css tampil_aturan.php -->

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
    }

    .card-custom {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-10px);
    }

    .card-header-custom {
        background-image: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        padding: 15px;
        text-align: center;
    }

    .form-group label {
        font-weight: 700;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-custom {
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 700;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background-color: #6a11cb;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2575fc;
    }

    .btn-danger {
        background-color: #fc4a1a;
        border: none;
    }

    .btn-danger:hover {
        background-color: #f7b733;
    }

    .btn-custom+.btn-custom {
        margin-left: 10px;
    }
</style>

<!-- ini style css tambah_gejala.php -->
body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
    }

    .card-custom {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-10px);
    }

    .card-header-custom {
        background-image: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        padding: 15px;
        text-align: center;
    }

    .form-group label {
        font-weight: 700;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-custom {
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 700;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background-color: #6a11cb;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2575fc;
    }

    .btn-danger {
        background-color: #fc4a1a;
        border: none;
    }

    .btn-danger:hover {
        background-color: #f7b733;
    }

    .btn-custom+.btn-custom {
        margin-left: 10px;
    }
</style>






<!-- ini tambah aturan yang asli -->
<?php

if (isset($_POST['simpan'])) {

    #mengambil data dari form
    $nmpenyakit = $_POST['nmpenyakit'];

    // validasi nama penyakit jantung
    $sql = "SELECT basis_aturan.idaturan,basis_aturan.idpenyakit,penyakit.nmpenyakit 
                   FROM basis_aturan INNER JOIN penyakit 
                   ON basis_aturan.idpenyakit=penyakit.idpenyakit WHERE nmpenyakit='$nmpenyakit'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data basis pengetahuan penyakit Jantung tersebut sudah ada</strong>
        </div>
<?php
    } else {

        //pengambilan data penyakit jantung
        $sql = "SELECT * FROM penyakit WHERE nmpenyakit='$nmpenyakit'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idpenyakit = $row['idpenyakit'];

        //proses simpan basis pengetahuan
        $sql = "INSERT INTO basis_aturan VALUES (null,'$idpenyakit')";
        mysqli_query($conn, $sql);

        //mengambil idgejala
        $idgejala = $_POST['idgejala'];

        //proses mengambil data pengetahuan/aturan
        $sql = "SELECT * FROM basis_aturan ORDER BY idaturan DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idaturan = $row['idaturan'];

        //proses simpan detail basis pengetahuan
        $jumlah = count($idgejala);
        $i = 0;
        while ($i < $jumlah) {
            $idgejalane = $idgejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ($idaturan,'$idgejalane')";
            mysqli_query($conn, $sql);
            $i++;
        }
        header("Location:?page=aturan");
    }
}
?>


<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
                <div class="card card-custom">
                    <div class="card">
                        <div class="card-header card-header-custom"><strong>Tambah Data Basis Pengetahuan</strong></div>
                        <div class="card-body">
                            <!-- Mengambil dari tabel penyakit -->
                            <div class="form-group">
                                <label for="">Nama Penyakit Jantung</label>
                                <select class="form-control chosen" data-placeholder="Pilih nama penyakit" name="nmpenyakit">
                                    <option value=""></option>
                                    <?php
                                    $sql = "SELECT * FROM penyakit ORDER BY nmpenyakit ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['nmpenyakit']; ?>"><?php echo $row['nmpenyakit']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <!-- Mengambil dari tabel gejala penyakit jantung-->
                                <div class="label-form">
                                    <label for="">Macam-macam gejala yang dirasakan:</label>
                                    <table class="table table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th width="20px"></th>
                                                <th width="20px">No.</th>
                                                <th width="400px">Nama Gejala</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = "SELECT*FROM gejala ORDER BY nmgejala ASC";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="customSwitch<?php echo $row['idgejala']; ?>" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>">
                                                            <label class="custom-control-label" for="customSwitch<?php echo $row['idgejala']; ?>"></label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row['nmgejala']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- tombol simpan -->
                                <input class="btn btn-primary btn-custom" type="submit" name="simpan" value="Simpan">
                                <!-- tombol batal -->
                                <a class="btn btn-danger btn-custom" href="?page=aturan">Batal</a>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validasiForm() {
        //memvalidasi nama penyakit jantung (antisipasi sudah diisi atau belum)
        var nmpenyakit = document.forms["Form"]["nmpenyakit"].value;

        if (nmpenyakit == "") {
            alert("Pilih nama penyakit");
            return false;
        }

        //memvalidasi gejala yang belum dipilih
        var checkbox = document.getElementsByName('<?php echo 'idgejala[]'; ?>');

        var isChecked = false;

        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                isChecked = true;
                break;
            }
        }

        //jika belum ada yang dicheck
        if (!isChecked) {
            alert('Pilih setidaknya satu gejala !!');
            return false;
        }

        return true;
    }
</script>



<!-- Ini bagian navbar yang di update -->
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
                                <a class="nav-link mx-lg-2" href="?page=aturan">Basis Pengetahuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=">Konsultasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=gejala">Gejala</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="?page=penyakit">Penyakit</a>
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
                <a href="?page=users" class="login-button">Users</a>
            <?php
            }
            ?>

            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>



    <?php
                        if ($_SESSION['role'] !== "Pasien") {
                        ?>
                        

                            
                        <?php
                        } else {
                        ?>
                            
                        }
                       

            <?php
            if ($_SESSION['role'] !== "Pasien") {
            ?>
                
            }
            ?>


<!-- Ini login yg asli -->
<div class="container-fluid" style="margin-top:150px">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form method="POST">
                <div class="card border-dark">
                    <div class="card-header bg-info text-light border-dark">
                        <strong>LOGIN</strong>
                    </div>
                    <div class="card-body border">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Ini login yg fix -->
<div class="container-fluid" style="margin-top:150px">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form method="POST">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <strong>LOGIN</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" required>
                        </div>
                        <input type="submit" class="btn btn-primary btn-custom" name="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Ini proses login di halaman login -->
<?php
session_start();
require "config.php"; // Pastikan file konfigurasi Anda mengatur koneksi ke database

if (isset($_POST["submit"])) {
    // Mengambil data dari form login
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Mengenkripsi password dengan md5

    // Mengecek username dan password di database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";

        // Ketika berhasil akan diarahkan ke indeks
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php?msg=n");
        exit();
    }
}
$conn->close();
?>


<!-- ini formulir login di halaman login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Logo RSML -->
    <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">
</head>
<body>

<!-- validasi jika Login gagal -->
<?php 
if (isset($_GET['msg']) && $_GET['msg'] == "n") {
?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Login Gagal</strong>
    </div>
<?php
}
?>

<style>
.gradient-custom-2 {
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
    .gradient-form {
        height: 100vh !important;
    }
}

@media (min-width: 769px) {
    .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
    }
}
</style>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <img src="assets/css/Fix.jpg" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                </div>

                <form method="POST" action="login.php">
                  <p>Please login to your account</p>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example11" class="form-control" name="username" placeholder="Username" required />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" placeholder="Password" required />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" class="btn btn-primary btn-custom" name="submit" value="Login">
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>





<!-- Navbar paling fix -->
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






<!-- Hasil konsultasi yang salah terosss (TAPI KEKNYA DI BAGIAN YANG PRESENTASE) -->
<!-- proses menampilkan data hasil proses konsultasi pasien -->
<?php
//mengambil id dari parameter
$idkonsultasi = $_GET['idkonsultasi'];

$sql = "SELECT * FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan halaman hasil konsul pasien -->
<div class="container mt-4">
<div class="row">
     <div class="col-sm-12">
          <form action="" method="POST">
               <div class="card card-custom">
                         <div class="card-header card-header-custom"><strong>Hasil Konsultasi</strong></div>
                         <div class="card-body">

                              <div class="form-group">
                                   <label for="">Nama Pasien</label>
                                   <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama" readonly>
                              </div>

                              <!-- tabel gejala gejala penyakit jantung -->
                              <label for="">Gejala yang dirasakan :</label>
                              <table class="table table-hover">
                                   <thead>
                                        <tr>
                                             <th width="40px">No.</th>
                                             <th width="700px">Nama Gejala</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT detail_konsultasi.idkonsultasi,detail_konsultasi.idgejala,gejala.nmgejala
                                                FROM detail_konsultasi INNER JOIN gejala 
                                                ON detail_konsultasi.idgejala=gejala.idgejala WHERE idkonsultasi='$idkonsultasi'";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $row['nmgejala']; ?></td>
                                          </tr>
                                        <?php
                                          }
                                        ?>
                                   </tbody>
                             </table>

                             <!-- Hasil konsultasi (tabel mirip tampilan tabel gejala diatasnya) -->
                             <label for="">Hasil konsultasi penyakit:</label>
                              <table class="table table-hover">
                                   <thead>
                                        <tr>
                                             <th width="40px">No.</th>
                                             <th width="700px">Nama Penyakit Jantung</th>
                                             <th width="700px">Presentase</th>
                                             <th width="700px">Rekomendasi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT detail_penyakit.idkonsultasi,detail_penyakit.idpenyakit,penyakit.nmpenyakit,
                                                       penyakit.solusi,detail_penyakit.persentase
                                                FROM detail_penyakit INNER JOIN penyakit
                                                ON detail_penyakit.idpenyakit=penyakit.idpenyakit WHERE idkonsultasi='$idkonsultasi' --ini untuk foreign key nya
                                                ORDER BY persentase DESC";  //agar presentase terbesar dipaling atas
                                        $result = $conn->query($sql);

                                        // Pengecekan hasil query (INI OPSI KALO MASI EROR TAPI GA MASUK DATABASE HUHU)
                                        if (!$result) {
                                            die("Kesalahan query: " . $conn->error);
                                        }

                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $row['nmpenyakit']; ?></td>
                                          <td><?php echo $row['persentase'] . "%"; ?></td>
                                          <td><?php echo $row['solusi']; ?></td>
                                          </tr>
                                        <?php
                                          }
                                          $conn->close(); //close digunakan ketika proses pada website telah selesai semua
                                        ?>
                                   </tbody>
                             </table>
                         </div>
                    </div>
               </div>
          </form>
     </div>



<!-- Tampil users -->
<div class="container mt-3">
  <div class="card card-custom">
    <div class="card-header card-header-custom"><strong>Data Users</strong></div>
    <div class="card-body">
      <a class="btn btn-success mb-2" href="?page=users&action=tambah">Tambah</a>
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th width="30px">No.</th>
            <th width="200px">Username</th>
            <th width="200px">Role</th>
            <th width="100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT*FROM users ORDER BY username ASC"; //dari nama tabel di database phpmyadmin
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['role']; ?></td>
              <td align="center">
                <!-- hapus -->
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=users&action=hapus&id=<?php echo $row['idusers']; ?>">
                  <i class="fas fa-times-circle"></i>

              </td>
            </tr>
          <?php
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>





<!-- Login asli-->
<!-- PROSES LOGIN -->
<?php
session_start();
require "config.php"; // Pastikan file konfigurasi Anda mengatur koneksi ke database

if (isset($_POST["submit"])) {
    // Mengambil data dari form login
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Mengenkripsi password dengan md5

    // Mengecek username dan password di database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";

        // Ketika berhasil akan diarahkan ke indeks
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php?msg=n");
        exit();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Logo RSML -->
    <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">
</head>
<body>

<!-- validasi jika Login gagal -->
<?php 
if (isset($_GET['msg']) && $_GET['msg'] == "n") {
?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Login Gagal</strong>
    </div>
<?php
}
?>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-4 mx-md-4">
                <div class="text-center">
                  <img src="assets/css/Fix.jpg" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Selamat datang, silakan registrasi terlebih dahuluu</h4>
                </div>

                <form method="POST" action="login.php">
                  <p>Please login to your account</p>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example11" class="form-control" name="username" placeholder="Username" required />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" placeholder="Password" required />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" class="btn btn-primary btn-custom" name="submit" value="Login">
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>




<!-- login CHATGPT -->
<?php
session_start();
require "config.php"; // Pastikan file konfigurasi Anda mengatur koneksi ke database

if (isset($_POST["submit"])) {
    // Mengambil data dari form login
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Mengenkripsi password dengan md5

    // Mengecek username dan password di database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";

        // Ketika berhasil akan diarahkan ke indeks
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php?msg=n");
        exit();
    }
}

if (isset($_POST["register"])) {
    // Mengambil data dari form registrasi
    $new_username = $_POST["new_username"];
    $phone = $_POST["phone"];
    $new_password = md5($_POST["new_password"]); // Mengenkripsi password dengan md5

    // Menyimpan data ke database
    $sql = "INSERT INTO users (username, phone, password) VALUES ('$new_username', '$phone', '$new_password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?msg=registered");
        exit();
    } else {
        header("Location: login.php?msg=failed");
        exit();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Logo RSML -->
    <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">
</head>
<body>

<!-- validasi jika Login gagal -->
<?php 
if (isset($_GET['msg']) && $_GET['msg'] == "n") {
?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Login Gagal</strong>
    </div>
<?php
} elseif (isset($_GET['msg']) && $_GET['msg'] == "registered") {
?>
    <div class="alert alert-success" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Registrasi Berhasil</strong>
    </div>
<?php
} elseif (isset($_GET['msg']) && $_GET['msg'] == "failed") {
?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Registrasi Gagal</strong>
    </div>
<?php
}
?>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-4 mx-md-4">
                <div class="text-center">
                  <img src="assets/css/Fix.jpg" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Selamat datang, silakan registrasi terlebih dahulu</h4>
                </div>

                <form method="POST" action="login.php">
                  <p>Please login to your account</p>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example11" class="form-control" name="username" placeholder="Username" required />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" placeholder="Password" required />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" class="btn btn-primary btn-custom" name="submit" value="Login">
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#registerModal">Create new</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Create New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="login.php">
          <div class="form-group">
            <label for="new_username">Username</label>
            <input type="text" class="form-control" id="new_username" name="new_username" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="form-group">
            <label for="new_password">Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>



<!-- Login yang liat diyutup -->
<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $role = $_POST['role'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'admin'){

         $_SESSION['admin_name'] = $row['username'];
         header('location:admin_page.php');

      }elseif($row['role'] == 'user'){

         $_SESSION['user_name'] = $row['username'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Masukkan Email Anda">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Belum memiliki akun? <a href="register_form.php">registrasi sekarang</a></p>
   </form>

</div>

</body>
</html>


<!-- index yang udah fix sebelumnya -->
<?php
session_start();

// koneksi database
include "config.php";

if(!isset($_SESSION['username'])){
    header('location:login.php');
 }
 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakarku_coba</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatables css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- Chosen select css -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Logo RSML -->
    <link rel="shortcut icon" type="image/png/jpeg" href="assets/css/RSMLamongann.jpeg">

</head>

<!-- navbar -->
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


    <!-- hero section -->
    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Deteksi Dini Penyakit Jantung</h1>
            <h2>RS Muhammadiyah Lamongan</h1>

        </div>
    </section>
    <!-- end hero section -->

    <!-- Mengecek login -->
    <?php
    if ($_SESSION['status'] != "y") {
        header("Location:login.php");
    }
    ?>

    <!-- container -->
    <div class="container">

        <!-- setting menu (action= tambah dan edit, page= utk halaman-->
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

    <!-- jquery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- datatables js -->
    <script src="assets/js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- Font Awesome js -->
    <script src="assets/js/all.js"></script>
    <!-- Chosen js -->
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
        $(function() {
            $('.chosen').chosen();
        });
    </script>


</body>

</html>



STYLE CSS
/*ini bagian register & login */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: rgb(51, 112, 10);
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:rgb(51, 112, 10);
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: rgb(51, 112, 10);
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #60e071;
   color:rgb(51, 112, 10);
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background:rgb(51, 112, 10) ;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:rgb(51, 112, 10);
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: rgb(51, 112, 10);
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
/*ini bagian navbar */
.navbar {
    background: linear-gradient(to right, #009970, #007c6e); /* Gradasi warna hijau */
    height: 80px;
    margin: 20px;
    border-radius: 16px;
    padding: 0.5rem;
}

.navbar-brand {
    font-weight: 500;
    color: #fbff00; /* Warna teks kuning */
    font-size: 24px;
    transition: 0.3s color;
}

.login-button {
    background-color: #ffffff; /* Warna background putih */
    color: #009970; /* Warna teks hijau */
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 50px;
    text-decoration: none;
    transition: 0.3s background-color, 0.3s color; /* Efek transisi pada hover */
}

.login-button:hover {
    background-color: #001bb3; /* Warna background pada hover */
    color: #fff; /* Warna teks pada hover */
}

.navbar-toggler {
    border: none;
    font-size: 1.25rem;
}

.navbar-toggler:focus,
.btn-close:focus {
    box-shadow: none;
    outline: none;
}

.nav-link {
    color: #fff; /* Warna teks putih */
    font-weight: 500;
    position: relative;
}

.nav-link:hover,
.nav-link.active {
    color: #000; /* Warna teks hitam */
}

@media (min-width: 991px) {
    .nav-link::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%);
        width: 0;
        height: 2px;
        background-color: #fff; /* Warna garis bawah putih */
        visibility: hidden;
        transition: 0.3s ease-in-out;
    }

    .nav-link:hover::before,
    .nav-link:active::before {
        width: 100%;
        visibility: visible;
    }
}


/* ini bagian card */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f8f9fa;
}

.card-custom {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.card-custom:hover {
    transform: translateY(-10px);
}

.card-header-custom {
    background-image: linear-gradient(to right, #6a11cb, #2575fc);
    color: white;
    padding: 15px;
    text-align: center;
}

.form-group label {
    font-weight: 700;
}

.form-control {
    border-radius: 10px;
}

.btn-custom {
    border-radius: 50px;
    padding: 10px 20px;
    font-weight: 700;
    transition: background-color 0.3s;
}

.btn-success {
    background-color: #6a11cb;
    border: none;
  }

.btn-primary {
    background-color: #6a11cb;
    border: none;
}

.btn-primary:hover {
    background-color: #2575fc;
}

.btn-danger {
    background-color: #fc4a1a;
    border: none;
}

.btn-danger:hover {
    background-color: #f7b733;
}

.btn-custom+.btn-custom {
    margin-left: 10px;
}


/*ini style login */
.gradient-custom-2 {
    background: linear-gradient(to right, #388E3C, #689F38, #7CB342, #9CCC65); /* Gradien hijau yang sedikit lebih tua */
}

@media (min-width: 768px) {
    .gradient-form {
        height: 100vh !important;
    }
}

@media (min-width: 769px) {
    .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
    }
}
