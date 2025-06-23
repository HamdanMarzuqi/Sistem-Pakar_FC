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
                                                <th width="10px">No.</th>
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