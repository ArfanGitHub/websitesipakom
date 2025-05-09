<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Kasus</strong></div>
  <div class="card-body">
    <a class="btn btn-primary mb-2" href="?page=kasus&action=tambah">Tambah</a>
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="20px">No.</th>
        <th width="60px">Nama Kasus</th>
        <th width="100px">Nama Kerusakan</th>
        <th width="200px">Keterangan</th>
        <th width="200px">Solusi</th>
        <th width="100px"></th>
      </tr>
    </thead>
    <tbody>
    <?php
        $no=1;
        $sql = "SELECT kasus.idkasus,kasus.idkerusakan,
                        kerusakan.nmkerusakan,kerusakan.keterangan,kasus.solusi 
                FROM kasus INNER JOIN kerusakan
                ON kasus.idkerusakan=kerusakan.idkerusakan ORDER BY idkasus ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo "Kasus " . $row['idkasus']; ?></td>
            <td><?php echo $row['nmkerusakan']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td><?php echo $row['solusi']; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=kasus&action=detail&id=<?php echo $row['idkasus']; ?>">
                    <i class="fas fa-list"></i>
                </a>
                <a class="btn btn-warning" href="?page=kasus&action=update&id=<?php echo $row['idkasus']; ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=kasus&action=hapus&id=<?php echo $row['idkasus']; ?>">
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