<!-- proses menampilkan data hasil proses konsultasi pasien -->
<?php
//mengambil id dari parameter
$idkonsultasi = $_GET['id']; //karena yg di tampil_konsultasi juga id

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
                                             <th width="20px">Kode</th>
                                             <th width="700px">Nama Gejala</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT detail_konsultasi.idkonsultasi,detail_konsultasi.idgejala,gejala.kodegejala,gejala.nmgejala
                                                FROM detail_konsultasi INNER JOIN gejala 
                                                ON detail_konsultasi.idgejala=gejala.idgejala WHERE idkonsultasi='$idkonsultasi'";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $row['kodegejala']; ?></td>
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
                                             <th width="20px">Kode</th>
                                             <th width="300px">Nama Penyakit Jantung</th>
                                             <th width="50px">Presentase</th>
                                             <th width="700px">Rekomendasi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT detail_penyakit.idkonsultasi, detail_penyakit.idpenyakit, penyakit.kodepenyakit, 
                                                penyakit.nmpenyakit, penyakit.solusi, detail_penyakit.persentase
                                                FROM detail_penyakit INNER JOIN penyakit
                                                ON detail_penyakit.idpenyakit = penyakit.idpenyakit WHERE detail_penyakit.idkonsultasi='$idkonsultasi'
                                                ORDER BY persentase DESC";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $row['kodepenyakit']; ?></td>
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
</div>