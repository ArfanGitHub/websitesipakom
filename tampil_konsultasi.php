<?php
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['proses'])){

    // mengambil data dari form
    $nmbarang=$_POST['nmbarang'];
    $tgl=date("Y/m/d");

    //proses simpan konsultasi
    $sql = "INSERT INTO konsultasi VALUES (Null,'$tgl','$nmbarang')";
    mysqli_query($conn,$sql);

    // mengambil idgejala
    $idgejala=$_POST['idgejala'];

    // proses mengambil data konsultasi
    $sql = "SELECT * FROM konsultasi ORDER BY idkonsultasi DESC";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $idkonsultasi=$row['idkonsultasi'];

    //proses simpan detail konsultasi
    $jumlah = count($idgejala);
    $i=0;
    while($i < $jumlah){
        $idgejalane=$idgejala[$i];
        $sql = "INSERT INTO detail_konsultasi VALUES ($idkonsultasi,'$idgejalane')";
        mysqli_query($conn,$sql);
        $i++;
    }

    // mengambil data dari tabel kerusakan untuk di cek di basis pengetahuan
    $sql = "SELECT*FROM kerusakan";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {

        $idkerusakan = $row['idkerusakan'];
        $jyes=0;

        // mencari jumlah gejala di basis pengetahuan berdasarkan kerusakan
        $sql2 = "SELECT COUNT(idkerusakan) AS jml_gejala 
                FROM basis_pengetahuan INNER JOIN detail_basis_pengetahuan
                ON basis_pengetahuan.idpengetahuan=detail_basis_pengetahuan.idpengetahuan
                WHERE idkerusakan='$idkerusakan'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jml_gejala=$row2['jml_gejala'];

        // mencari gejala pada basis pengetahuan
        $sql3 = "SELECT idkerusakan, idgejala 
            FROM basis_pengetahuan INNER JOIN detail_basis_pengetahuan
            ON basis_pengetahuan.idpengetahuan=detail_basis_pengetahuan.idpengetahuan
            WHERE idkerusakan='$idkerusakan'";
        $result3 = $conn->query($sql3);
        while($row3 = $result3->fetch_assoc()) {

            $idgejalane=$row3['idgejala'];

            // membandingkan apakah yang dipilih pada konsultasi sesuai
            $sql4 = "SELECT idgejala FROM detail_konsultasi 
                    WHERE idkonsultasi='$idkonsultasi' AND idgejala='$idgejalane'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $jyes+=1;
            }
        }

        // mencari persentase
        if($jml_gejala>0){
            $peluang = round(($jyes/$jml_gejala)*100,2);
        }else{
            $peluang = 0;
        }

        // simpan data detail kerusakan FC
        if($peluang>0){
            $sql = "INSERT INTO detail_kerusakan_fc VALUES ($idkonsultasi,'$idkerusakan','$peluang')";
            mysqli_query($conn,$sql);
        }

        $jyes2=0;
        // mencari jumlah gejala di kasus berdasarkan kerusakan
        $sql2 = "SELECT COUNT(idkerusakan) AS jml_gejala 
                FROM kasus INNER JOIN detail_kasus
                ON kasus.idkasus=detail_kasus.idkasus
                WHERE idkerusakan='$idkerusakan'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jml_gejala=$row2['jml_gejala'];

        // mencari gejala pada kasus
        $sql3 = "SELECT idkerusakan, idgejala 
            FROM kasus INNER JOIN detail_kasus
            ON kasus.idkasus=detail_kasus.idkasus
            WHERE idkerusakan='$idkerusakan'";
        $result3 = $conn->query($sql3);
        while($row3 = $result3->fetch_assoc()) {

            $idgejalane=$row3['idgejala'];

            // membandingkan apakah yang dipilih pada konsultasi sesuai
            $sql4 = "SELECT idgejala FROM detail_konsultasi 
                    WHERE idkonsultasi='$idkonsultasi' AND idgejala='$idgejalane'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $jyes2+=1;
            }
        }

        // mencari persentase
        if($jml_gejala>0){
            $peluang = round(($jyes2/$jml_gejala)*100,2);
        }else{
            $peluang = 0;
        }

        // simpan data detail kerusakan CBR
        if($peluang>0){
            $sql = "INSERT INTO detail_kerusakan_cbr VALUES ($idkonsultasi,'$idkerusakan','$peluang')";
            mysqli_query($conn,$sql);
        }

        header("Location:?page=konsultasi&action=hasil&idkonsultasi=$idkonsultasi");
    }
}

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Konsultasi Kerusakan</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" name="nmbarang" maxlength="50" required>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $sql = "SELECT*FROM gejala ORDER BY nmgejala ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td align="center"><input type="checkbox" class="check-item" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>"></td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nmgejala']; ?></td>
                                </tr>
                                <?php
                                    }
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <input class="btn btn-primary" type="submit" name="proses" value="Proses">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm()
    {

        // validasi gejala yang belum dipilih
        var checkbox=document.getElementsByName('<?php echo 'idgejala[]'; ?>');

        var isChecked=false;

        for(var i=0;i<checkbox.length;i++){
            if(checkbox[i].checked){
                isChecked = true;
                break;
            }
        }

        // jika belum ada yang di check
        if(!isChecked){
            alert('Pilih setidaknya satu gejala !!');
            return false;
        }

        return true;
    }

</script>
