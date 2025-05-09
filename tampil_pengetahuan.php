<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Basis pengetahuan</strong></div>
  <div class="card-body">
    <a class="btn btn-primary mb-2" href="?page=pengetahuan&action=tambah">Tambah</a>
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="20px">No.</th>
        <th width="150px">Nama kerusakan</th>
        <th width="220px">Keterangan</th>
        <th width="220px">Solusi</th>
        <th width="100px"></th>
      </tr>
    </thead>
    <tbody>
    <?php
        $no=1;
        $sql = "SELECT basis_pengetahuan.idpengetahuan,basis_pengetahuan.idkerusakan,
                        kerusakan.nmkerusakan,kerusakan.keterangan,basis_pengetahuan.solusi 
                FROM basis_pengetahuan INNER JOIN kerusakan
                ON basis_pengetahuan.idkerusakan=kerusakan.idkerusakan ORDER BY nmkerusakan ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nmkerusakan']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td><?php echo $row['solusi']; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=pengetahuan&action=detail&id=<?php echo $row['idpengetahuan']; ?>">
                    <i class="fas fa-list"></i>
                </a>
                <a class="btn btn-warning" href="?page=pengetahuan&action=update&id=<?php echo $row['idpengetahuan']; ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pengetahuan&action=hapus&id=<?php echo $row['idpengetahuan']; ?>">
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