<!-- proses menampilkan data basis aturan -->
<?php
//mengambil id dari parameter
$idaturan = $_GET['id'];

$sql = "SELECT basis_aturan.idaturan,basis_aturan.idpenyakit,
               penyakit.nmpenyakit,penyakit.keterangan
        FROM basis_aturan 
        INNER JOIN penyakit 
        ON basis_aturan.idpenyakit=penyakit.idpenyakit 
        WHERE basis_aturan.idaturan='$idaturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- halaman detail aturan -->
<div class="container mt-4">
<div class="row">
     <div class="col-sm-12">
          <form action="" method="POST">
               <div class="card card-custom">
                         <div class="card-header card-header-custom"><strong>Detail Basis Pengetahuan</strong></div>
                         <div class="card-body">

                              <div class="form-group">
                                   <label for="">Nama Penyakit Jantung</label>
                                   <input type="text" class="form-control" value="<?php echo $row['nmpenyakit'] ?>" name="nama" readonly>
                              </div>
                              <div class="form-group">
                                   <label for="">Keterangan</label>
                                   <input type="text" class="form-control" value="<?php echo $row['keterangan'] ?>" name="ket" readonly>
                              </div>

                              <!-- tabel gejala gejala penyakit jantung -->
                              <label for="">Gejala Gejala Penyakit Jantung yang diderita :</label>
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
                                        $sql = "SELECT detail_basis_aturan.idaturan,detail_basis_aturan.idgejala,gejala.kodegejala,gejala.nmgejala 
                                                FROM detail_basis_aturan 
                                                INNER JOIN gejala 
                                                ON detail_basis_aturan.idgejala=gejala.idgejala 
                                                WHERE detail_basis_aturan.idaturan='$idaturan'";
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
                                          $conn->close();
                                        ?>
                                   </tbody>
                              </table>


                              <a class="btn btn-danger" href="?page=aturan">Kembali</a>
                         </div>
                    </div>
               </div>
          </form>
     </div>
</div>