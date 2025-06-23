<?php

if (isset($_POST['simpan'])) {

    //data diambil dari form
    $kodegejala = $_POST['kodegejala'];
    $nmgejala = $_POST['nmgejala'];


    //proses menyimpan
    $sql = "INSERT INTO gejala VALUES ('Null','$kodegejala','$nmgejala')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST">
                <div class="card card-custom">
                    <div class="card-header card-header-custom"><strong>Tambah Data Gejala</strong></div>
                        <div class="card-body">
                            <!-- keterangan tambah data gejala -->
                            <div class="form-group">
                                <label for="kodegejala">Kode Gejala</label>
                                <input type="text" class="form-control" id="kodegejala" name="kodegejala" maxlength="200" required>
                            </div>
                            <div class="form-group">
                                <label for="nmgejala">Nama Gejala</label>
                                <input type="text" class="form-control" id="nmgejala" name="nmgejala" maxlength="200" required>
                            </div>
                            <!-- tombol simpan -->
                            <input class="btn btn-primary btn-custom" type="submit" name="simpan" value="Simpan">
                            <!-- tombol batal -->
                            <a class="btn btn-danger btn-custom" href="?page=gejala">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
