<div class="container mt-3">
  <div class="card card-custom">
    <div class="card-header card-header-custom"><strong>Data Penyakit Jantung</strong></div>
    <div class="card-body">
      <a class="btn btn-success mb-2" href="?page=penyakit&action=tambah">Tambah</a>
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th width="10px">No.</th>
            <th width="10px">Kode</th>
            <th width="140px">Nama Penyakit Jantung</th>
            <th width="250px">Deskripsi</th>
            <th width="250px">Rekomendasi</th>
            <th width="100px"></th>
          </tr>
        </thead>

        
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT*FROM penyakit ORDER BY kodepenyakit ASC";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['kodepenyakit']; ?></td>
              <td><?php echo $row['nmpenyakit']; ?></td>
              <td><?php echo $row['keterangan']; ?></td>
              <td><?php echo $row['solusi']; ?></td>
              <td align="center">
                <!-- edit -->
                <a class="btn btn-warning" href="?page=penyakit&action=update&id=<?php echo $row['idpenyakit']; ?>">
                  <i class="fas fa-pen"></i>

                </a>
                <!-- hapus -->
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=penyakit&action=hapus&id=<?php echo $row['idpenyakit']; ?>">
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