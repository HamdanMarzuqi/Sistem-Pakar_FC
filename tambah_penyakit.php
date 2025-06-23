<?php

if (isset($_POST['simpan'])) {

    //data diambil dari form
    $kodepenyakit = $_POST['kodepenyakit'];
    $nmpenyakit = $_POST['nmpenyakit'];
    $ket = $_POST['ket'];
    $solusi = $_POST['solusi'];

    //proses menyimpan
    $sql = "INSERT INTO penyakit VALUES (Null,'$kodepenyakit','$nmpenyakit','$ket','$solusi')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}
?>


<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST">
                <div class="card card-custom">
                    <div class="card-header card-header-custom"><strong>Tambah Data Penyakit</strong></div>
                    <div class="card-body">
                        <!-- keterangan tambah data penyakit -->
                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" class="form-control" name="kodepenyakit" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penyakit Jantung</label>
                            <input type="text" class="form-control" name="nmpenyakit" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" class="form-control" name="ket" maxlength="600" required>
                        </div>
                        <div class="form-group">
                            <label for="">Rekomendasi</label>
                            <input type="text" class="form-control" name="solusi" maxlength="600" required>
                        </div>
                        <!-- tombol simpan -->
                        <input class="btn btn-primary btn-custom" type="submit" name="simpan" value="Simpan">
                        <!-- tombol batal -->
                        <a class="btn btn-danger btn-custom" href="?page=penyakit">Batal</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>