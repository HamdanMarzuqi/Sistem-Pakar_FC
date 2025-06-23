
<div class="container mt-3">
  <div class="card card-custom">
    <div class="card-header card-header-custom"><strong>Data Basis Pengetahuan</strong></div>
    <div class="card-body">
      <a class="btn btn-success mb-2" href="?page=aturan&action=tambah">Tambah</a>
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th width="10px">No.</th>
            <th width="20px">Kode</th>
            <th width="200px">Nama Penyakit Jantung</th>
            <th width="400px">Deskripsi</th>
            <th width="100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT basis_aturan.idaturan,basis_aturan.idpenyakit,
                    penyakit.kodepenyakit,penyakit.nmpenyakit,penyakit.keterangan FROM basis_aturan INNER JOIN penyakit 
                    ON basis_aturan.idpenyakit=penyakit.idpenyakit ORDER BY kodepenyakit ASC";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['kodepenyakit']; ?></td>
              <td><?php echo $row['nmpenyakit']; ?></td>
              <td><?php echo $row['keterangan']; ?></td>
              <td align="center">
                <!-- detail keterangan -->
                <a class="btn btn-primary" href="?page=aturan&action=detail&id=<?php echo $row['idaturan']; ?>">
                  <i class="fas fa-list"></i>
                </a>
                
                <!-- hapus -->
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus&id=<?php echo $row['idaturan']; ?>">
                  <i class="fas fa-times-circle"></i>
                </a>
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