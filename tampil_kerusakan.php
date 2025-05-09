<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Kerusakan</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=kerusakan&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="50px">No</th>
        <th width="200px">Nama Kerusakan</th>
        <th width="500px">Keterangan</th>
        <th width="80px"></th>
      </tr>
    </thead>
    <tbody>
			<!-- proses menampilkan data -->
<?php
     $no=1;
     $sql = "SELECT * FROM kerusakan ORDER BY nmkerusakan ASC";
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
?>
     <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nmkerusakan']; ?></td>
        <td><?php echo $row['keterangan']; ?></td>
        <td align="center">
            <a class="btn btn-warning" href="?page=kerusakan&action=update&id=<?php echo $row['idkerusakan']; ?>">
            <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=kerusakan&action=hapus&id=<?php echo $row['idkerusakan']; ?>">
            <i class="fas fa-window-close"></i>
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