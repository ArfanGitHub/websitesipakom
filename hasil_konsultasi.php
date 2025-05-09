<!-- proses menampilkan data hasil konsultasi -->
<?php 
// mengambil id dari parameter
$idkonsultasi=$_GET['idkonsultasi'];

$sql = "SELECT * FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan halaman Hasil konsultasi -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Hasil Konsultasi</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama_barang'] ?>" name="nama" readonly>
                        </div>

                        <!-- tabel gejala-gejala -->
                        <label for=""><b>Gejala-Gejala Kerusakan Yang Dipilih:</b></label>
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
                            $sql = "SELECT detail_konsultasi.idkonsultasi,detail_konsultasi.idgejala,gejala.nmgejala
                                    FROM detail_konsultasi INNER JOIN gejala 
                                    ON detail_konsultasi.idgejala=gejala.idgejala WHERE idkonsultasi='$idkonsultasi'";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmgejala']; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                        </table>

                        <!-- hasil konsultasi Kerusakannya -->
                        <label for=""><b>Hasil Konsultasi Kerusakan Metode Forward Chaining:</b></label>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="150px">Nama Kerusakan</th>
                            <th width="100px">Persentase</th>
                            <th width="700px">Solusi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_kerusakan_fc.idkonsultasi,detail_kerusakan_fc.idkerusakan,kerusakan.nmkerusakan,
                                            basis_pengetahuan.solusi,detail_kerusakan_fc.persentase
                                    FROM detail_kerusakan_fc INNER JOIN kerusakan  
                                    ON detail_kerusakan_fc.idkerusakan=kerusakan.idkerusakan 
                                    INNER JOIN basis_pengetahuan ON detail_kerusakan_fc.idkerusakan=basis_pengetahuan.idkerusakan WHERE idkonsultasi='$idkonsultasi'
                                    ORDER BY persentase DESC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmkerusakan']; ?></td>
                                <td><?php echo $row['persentase'] . "%"; ?></td>
                                <td><?php echo $row['solusi']; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                        </table>

                        <!-- hasil konsultasi Kerusakannya -->
                        <label for=""><b>Hasil Konsultasi Kerusakan Metode Case Base Reasoning:</b></label>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="130px">Nama Kasus</th>
                            <th width="180px">Nama Kerusakan</th>
                            <th width="100px">Persentase</th>
                            <th width="700px">Solusi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_kerusakan_cbr.idkonsultasi,kasus.idkasus,detail_kerusakan_cbr.idkerusakan,kerusakan.nmkerusakan,
                                            kasus.solusi,detail_kerusakan_cbr.persentase
                                    FROM detail_kerusakan_cbr INNER JOIN kerusakan  
                                    ON detail_kerusakan_cbr.idkerusakan=kerusakan.idkerusakan 
                                    INNER JOIN kasus ON detail_kerusakan_cbr.idkerusakan=kasus.idkerusakan WHERE idkonsultasi='$idkonsultasi'
                                    ORDER BY persentase DESC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo "Kasus " . $row['idkasus']; ?></td>
                                <td><?php echo $row['nmkerusakan']; ?></td>
                                <td><?php echo $row['persentase'] . "%"; ?></td>
                                <td><?php echo $row['solusi']; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                        </table>

                        <!-- hasil konsultasi Kerusakannya -->
                        <label for=""><b>Hasil Perbandingan Konsultasi:</b></label>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="200px">Nama Kerusakan</th>
                            <th width="200px">Persentase FC</th>
                            <th width="200px">Persentase CBR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT 
                                        kerusakan.nmkerusakan, 
                                        detail_kerusakan_fc.persentase AS persen_fc, 
                                        detail_kerusakan_cbr.persentase AS persen_cbr
                                    FROM 
                                        detail_kerusakan_fc
                                    JOIN 
                                        detail_kerusakan_cbr
                                        ON detail_kerusakan_fc.idkonsultasi = detail_kerusakan_cbr.idkonsultasi
                                        AND detail_kerusakan_fc.idkerusakan = detail_kerusakan_cbr.idkerusakan
                                    JOIN 
                                        kerusakan
                                        ON detail_kerusakan_fc.idkerusakan = kerusakan.idkerusakan
                                    WHERE detail_kerusakan_fc.idkonsultasi='$idkonsultasi'
                                    ORDER BY GREATEST(detail_kerusakan_fc.persentase, detail_kerusakan_cbr.persentase) DESC;";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmkerusakan']; ?></td>
                                <td><?php echo $row['persen_fc'] . "%"; ?></td>
                                <td><?php echo $row['persen_cbr'] . "%"; ?></td>
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
        </form>
    </div>
</div>




