<!-- proses menampilkan data basis kasus -->
<?php 
// mengambil id dari parameter
$idkasus=$_GET['id'];

$sql = "SELECT kasus.idkasus,kasus.idkerusakan,
                kerusakan.nmkerusakan,kerusakan.keterangan,kasus.solusi
        FROM kasus INNER JOIN kerusakan ON kasus.idkerusakan=kerusakan.idkerusakan
        WHERE kasus.idkasus='$idkasus'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan halaman detail -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Detail Halaman Kasus</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Nama Kerusakan</label>
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
                            $sql = "SELECT detail_kasus.idkasus,detail_kasus.idgejala,gejala.nmgejala
                                    FROM detail_kasus INNER JOIN gejala 
                                    ON detail_kasus.idgejala=gejala.idgejala WHERE detail_kasus.idkasus='$idkasus'";
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

                        <a class="btn btn-danger" href="?page=kasus">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>