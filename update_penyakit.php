<?php
//mengambil id dari parameter
$idpenyakit = $_GET['id'];

//Langkah proses update
if (isset($_POST['update'])) {

    //mengambil data dari form
    $kodepenyakit = $_POST['kodepenyakit'];
    $nmpenyakit = $_POST['nmpenyakit'];
    $ket = $_POST['ket'];
    $solusi = $_POST['solusi'];

    // proses update
    $sql = "UPDATE penyakit SET kodepenyakit='$kodepenyakit',nmpenyakit='$nmpenyakit',keterangan='$ket',solusi='$solusi' WHERE idpenyakit='$idpenyakit'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}

$sql = "SELECT * FROM penyakit WHERE idpenyakit='$idpenyakit'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST">
                <div class="card card-custom">
                    <div class="card-header card-header-custom"><strong>Update Data Penyakit</strong></div>
                    <div class="card-body">
                        <!-- keterangan update data penyakit -->
                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" class="form-control" name="kodepenyakit" value="<?php echo $row['kodepenyakit'] ?>" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penyakit</label>
                            <input type="text" class="form-control" name="nmpenyakit" value="<?php echo $row['nmpenyakit'] ?>" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" class="form-control" name="ket" value="<?php echo $row['keterangan'] ?>" maxlength="600" required>
                        </div>
                        <div class="form-group">
                            <label for="">Rekomendasi</label>
                            <input type="text" class="form-control" name="solusi" value="<?php echo $row['solusi'] ?>" maxlength="600" required>
                        </div>
                        <!-- tombol update -->
                        <input class="btn btn-primary btn-custom" type="submit" name="update" value="Update">
                        <!-- tombol batal -->
                        <a class="btn btn-danger btn-custom" href="?page=penyakit">Batal</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>