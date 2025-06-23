<div class="container mt-3">
  <div class="card card-custom">
    <div class="card-header card-header-custom"><strong>Data Gejala</strong></div>
    <div class="card-body">
      <a class="btn btn-success mb-2" href="?page=gejala&action=tambah">Tambah</a>
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th width="10px">No.</th>
            <th width="20px">Kode</th>
            <th width="700px">Nama Gejala</th>
            <th width="100"></th>
          </tr>
        </thead>

        
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT*FROM gejala ORDER BY kodegejala ASC";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['kodegejala']; ?></td>
              <td><?php echo $row['nmgejala']; ?></td>
              <td align="center">
                <!-- edit -->
                <a class="btn btn-warning" href="?page=gejala&action=update&id=<?php echo $row['idgejala']; ?>">
                  <i class="fas fa-pen"></i>

                </a>
                <!-- hapus -->
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=gejala&action=hapus&id=<?php echo $row['idgejala']; ?>">
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