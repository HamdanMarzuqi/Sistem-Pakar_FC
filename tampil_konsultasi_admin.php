
<div class="container mt-3">
  <div class="card card-custom">
    <div class="card-header card-header-custom"><strong>Data Hasil Konsultasi</strong></div>
    <div class="card-body">
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th width="10px">No.</th>
            <th width="400px">Nama</th>
            <th width="100px">Umur</th>
            <th width="400px">Alamat</th>
            <th width="200px">Tanggal Konsultasi</th>
            <th width="100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT * FROM konsultasi ORDER BY tanggal DESC";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['umur']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
              <td><?php echo $row['tanggal']; ?></td>
              <td align="center">
                <!-- detail keterangan -->
                <a class="btn btn-primary" href="?page=konsultasi_admin&action=detail&id=<?php echo $row['idkonsultasi']; ?>">
                  <i class="fas fa-list"></i>
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