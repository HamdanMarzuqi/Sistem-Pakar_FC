<div class="container mt-3">
  <div class="card card-custom">
    <div class="card-header card-header-custom"><strong>Data Users</strong></div>
    <div class="card-body">
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th width="30px">No.</th>
            <th width="200px">Username</th>
            <th width="200px">Email</th>
            <th width="200px">Role</th>
            <th width="100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT*FROM users ORDER BY username ASC"; //dari nama tabel di database phpmyadmin
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['role']; ?></td>
              <td align="center">
                <!-- hapus -->
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=users&action=hapus&id=<?php echo $row['idusers']; ?>">
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