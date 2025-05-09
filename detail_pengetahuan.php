<!-- proses menampilkan data basis pengetahuan -->
<?php 
// mengambil id dari parameter
$idpengetahuan=$_GET['id'];

$sql = "SELECT basis_pengetahuan.idpengetahuan,basis_pengetahuan.idkerusakan,
                kerusakan.nmkerusakan,kerusakan.keterangan,basis_pengetahuan.solusi
        FROM basis_pengetahuan INNER JOIN kerusakan ON basis_pengetahuan.idkerusakan=kerusakan.idkerusakan
        WHERE basis_pengetahuan.idpengetahuan='$idpengetahuan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan halaman detail -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Detail Halaman Basis Pengetahuan</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Nama kerusakan</label>
                            <input type="text" class="form-control" value="<?php echo $row['nmkerusakan'] ?>" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" value="<?php echo $row['keterangan'] ?>" name="ket" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Solusi</label>
                            <input type="text" class="form-control" value="<?php echo $row['solusi'] ?>" name="solusi" readonly>
                        </div>

                        <!-- tabel gejala-gejala -->
                        <label for="">Gejala-Gejala kerusakan :</label>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="700px">Nama Gejala</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_basis_pengetahuan.idpengetahuan,detail_basis_pengetahuan.idgejala,gejala.nmgejala
                                    FROM detail_basis_pengetahuan INNER JOIN gejala 
                                    ON detail_basis_pengetahuan.idgejala=gejala.idgejala WHERE detail_basis_pengetahuan.idpengetahuan='$idpengetahuan'";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmgejala']; ?></td>
                            </tr>
                        <?php
                            }
                            $conn->close();
                        ?>
                        </tbody>
                        </table>

                        <a class="btn btn-danger" href="?page=pengetahuan">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>