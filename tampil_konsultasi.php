<?php
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['proses'])) {

    //mengambil data dari form
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $nmpasien = $_POST['nmpasien'];
    $tgl = date("Y/m/d");

    //proses simpan konsultasi
    $sql = "INSERT INTO konsultasi VALUES (null,'$tgl','$nmpasien','$umur','$alamat')";
    mysqli_query($conn, $sql);

    //mengambil idgejala
    $idgejala = $_POST['idgejala'];

    //proses mengambil data konsultasi
    $sql = "SELECT * FROM konsultasi ORDER BY idkonsultasi DESC";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $idkonsultasi = $row['idkonsultasi'];

    //proses simpan detail konsultasi
    $jumlah = count($idgejala);
    $i = 0;
    //menyimpan gejala yang dicentang
    while ($i < $jumlah) {
        $idgejalane = $idgejala[$i];
        $sql = "INSERT INTO detail_konsultasi VALUES ($idkonsultasi,'$idgejalane')";
        mysqli_query($conn, $sql);
        $i++;
    }

    //mengambil data dari tabel penyakit untuk dicek di basis aturan
    $sql = "SELECT*FROM penyakit";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $idpenyakit = $row['idpenyakit'];
        $nmpenyakit = $row['nmpenyakit'];
        $jyes = 0;

        //mencari jumlah gejala di basis aturan berdasarkan penyakit
        $sql2 = "SELECT COUNT(idpenyakit) AS jml_gejala
        FROM basis_aturan INNER JOIN detail_basis_aturan 
        ON basis_aturan.idaturan=detail_basis_aturan.idaturan
        WHERE idpenyakit='$idpenyakit'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jml_gejala = $row2['jml_gejala'];

        //mencari gejala pada basis aturan
        $sql3 = "SELECT idpenyakit, idgejala
        FROM basis_aturan INNER JOIN detail_basis_aturan 
        ON basis_aturan.idaturan=detail_basis_aturan.idaturan
        WHERE idpenyakit='$idpenyakit'";
        $result3 = $conn->query($sql3);
        while ($row3 = $result3->fetch_assoc()) {

            $idgejalane = $row3['idgejala'];

            //membandingkan apakah yg dipilih pada konsultasi sesuai
            $sql4 = "SELECT idgejala FROM detail_konsultasi 
        WHERE idkonsultasi='$idkonsultasi' AND idgejala='$idgejalane'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $jyes += 1;
            }
        }

        //mencari presentase (DARI MANA/LITERASI DARI MANA)
        if ($jml_gejala > 0) {
            $peluang = round(($jyes / $jml_gejala) * 100, 2);
        } else {
            $peluang = 0;
        }

        //simpan data detail penyakit
        if ($peluang > 0) {
            $sql = "INSERT INTO detail_penyakit VALUES ($idkonsultasi,'$idpenyakit','$peluang')";
            mysqli_query($conn, $sql);
        }

        header("Location:?page=konsultasi&action=hasil&idkonsultasi=$idkonsultasi");

    }
}
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
                <div class="card card-custom">
                    <div class="card-header card-header-custom"><strong>Konsultasi</strong></div>
                    <div class="card-body">
                        <!-- Mengambil dari tabel penyakit -->
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nmpasien" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Umur</label>
                            <input type="text" class="form-control" name="umur" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat" maxlength="255" required>
                        </div>

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
                        <input class="btn btn-primary btn-custom" type="submit" name="proses" value="Proses">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    function validasiForm() {

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