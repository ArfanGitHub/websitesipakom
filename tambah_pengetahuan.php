<?php

if(isset($_POST['simpan'])){

    // mengambil data dari form
    $nmkerusakan=$_POST['nmkerusakan'];
    $solusi=$_POST['solusi'];
	
    // validasi nama kerusakan
    $sql = "SELECT basis_pengetahuan.idpengetahuan,basis_pengetahuan.idkerusakan,kerusakan.nmkerusakan
                FROM basis_pengetahuan INNER JOIN kerusakan 
                ON basis_pengetahuan.idkerusakan=kerusakan.idkerusakan WHERE nmkerusakan='$nmkerusakan'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data basis pengetahuan kerusakan tersebut sudah ada</strong>
            </div>
        <?php
    }else{

        // mengambil data kerusakan
        $sql = "SELECT * FROM kerusakan WHERE nmkerusakan='$nmkerusakan'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idkerusakan=$row['idkerusakan'];

	    //proses simpan basis pengetahuan
        $sql = "INSERT INTO basis_pengetahuan VALUES (Null,'$idkerusakan','$solusi')";
        mysqli_query($conn,$sql);

        // mengambil idgejala
        $idgejala=$_POST['idgejala'];

        // proses mengambil data pengetahuan
        $sql = "SELECT * FROM basis_pengetahuan ORDER BY idpengetahuan DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idpengetahuan=$row['idpengetahuan'];

        //proses simpan detail basis pengetahuan
        $jumlah = count($idgejala);
        $i=0;
        while($i < $jumlah){
            $idgejalane=$idgejala[$i];
            $sql = "INSERT INTO detail_basis_pengetahuan VALUES ($idpengetahuan,'$idgejalane')";
            mysqli_query($conn,$sql);
            $i++;
        }
        header("Location:?page=pengetahuan");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Basis Pengetahuan</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Kerusakan</label>
                        <select class="form-control chosen" data-placeholder="Pilih Nama kerusakan" name="nmkerusakan">
                            <option value=""></option>
                            <?php
                                $sql = "SELECT * FROM kerusakan ORDER BY nmkerusakan ASC";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['nmkerusakan']; ?>"><?php echo $row['nmkerusakan']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Solusi</label>
                        <input type="text" class="form-control" name="solusi" maxlength="200" required>
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

                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                    <a class="btn btn-danger" href="?page=pengetahuan">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm()
    {
        // validasi nama kerusakan
        var nmkerusakan = document.forms["Form"]["nmkerusakan"].value;

        if(nmkerusakan=="")
        {
            alert("Pilih nama kerusakan");
            return false;
        }

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
