<?php
// proses menampilkan data kerusakan berdasarkan basis pengetahuan yang dipilih
// mengambil id dari parameter
$idpengetahuan=$_GET['id'];

$sql = "SELECT basis_pengetahuan.idpengetahuan,basis_pengetahuan.idkerusakan,kerusakan.nmkerusakan,kerusakan.keterangan,basis_pengetahuan.solusi
        FROM basis_pengetahuan INNER JOIN kerusakan
        ON basis_pengetahuan.idkerusakan=kerusakan.idkerusakan WHERE idpengetahuan='$idpengetahuan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// proses update
if(isset($_POST['update'])){
    $idgejala=$_POST['idgejala'];
    $solusi=$_POST['solusi'];

    $sql = "UPDATE basis_pengetahuan SET solusi='$solusi' WHERE idpengetahuan='$idpengetahuan'";
    $conn->query($sql);
        
    //proses simpan detail basis pengetahuan
    if($idgejala!=Null){
        $jumlah = count($idgejala);
        $i=0;
        while($i < $jumlah){
            $idgejalane=$idgejala[$i];
            $sql = "INSERT INTO detail_basis_pengetahuan VALUES ($idpengetahuan,'$idgejalane')";
            mysqli_query($conn,$sql);
            $i++;
        }
    }
    header("Location:?page=pengetahuan");
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Update Data Basis Pengetahuan</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama kerusakan</label>
                        <input type="text" class="form-control" value="<?php echo $row['nmkerusakan']; ?>" name="nmkerusakan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="<?php echo $row['keterangan'] ?>" name="ket" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Solusi</label>
                        <input type="text" class="form-control" value="<?php echo $row['solusi'] ?>" name="solusi" required>
                    </div>
                    
                    <!-- tabel data gejala gejala -->
                    <div class="form-group">
                        <label for="">Pilih gejala-gejala berikut :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30px"></th>
                                    <th width="30px">No.</th>
                                    <th width="700px">Nama Gejala</th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $sql = "SELECT*FROM gejala ORDER BY nmgejala ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {

                                        $idgejala=$row['idgejala'];

                                        // cek ke tabel detail basis pengetahuan
                                        $sql2 = "SELECT * FROM detail_basis_pengetahuan WHERE idpengetahuan='$idpengetahuan' AND idgejala='$idgejala'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            // jika ditemukan maka tampilkan datanya checklist mati hapus aktif
                                ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" class="check-item" disabled="disabled"></td>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                        <td align="center">
                                            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pengetahuan&action=hapus_gejala&idpengetahuan=<?php echo $idpengetahuan ?>&idgejala=<?php echo $idgejala ?>">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }else{
                                        // jika tidak ditemukan maka checklist aktif hapus mati
                                ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" class="check-item" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>"></td>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                        <td align="center">
                                            <i class="fas fa-window-close"></i>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=pengetahuan">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
