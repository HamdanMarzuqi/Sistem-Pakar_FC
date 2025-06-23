<?php
//mengambil id dari parameter
$idgejala = $_GET['id'];

if (isset($_POST['update'])) {
    $kodegejala = $_POST['kodegejala'];
    $nmgejala = $_POST['nmgejala'];

    // proses update
    $sql = "UPDATE gejala SET nmgejala='$nmgejala',kodegejala='$kodegejala' WHERE idgejala='$idgejala'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}

$sql = "SELECT * FROM gejala WHERE idgejala='$idgejala'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST">
                <div class="card card-custom">
                    <div class="card-header card-header-custom"><strong>Update Data Gejala</strong></div>
                    <div class="card-body">
                    <div class="form-group">
                            <label for="">Kode Gejala</label>
                            <input type="text" class="form-control" name="kodegejala" value="<?php echo $row['kodegejala'] ?>" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Gejala</label>
                            <input type="text" class="form-control" name="nmgejala" value="<?php echo $row['nmgejala'] ?>" maxlength="200" required>
                        </div>
                        <input class="btn btn-primary btn-custom" type="submit" name="update" value="Update">
                        <a class="btn btn-danger btn-custom" href="?page=gejala">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>