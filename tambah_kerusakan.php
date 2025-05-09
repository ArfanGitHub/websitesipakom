<?php

if(isset($_POST['simpan'])){

    // mengambil data dari form
    $nmkerusakan=$_POST['nmkerusakan'];
    $ket=$_POST['ket'];
	
	//proses simpan
        $sql = "INSERT INTO kerusakan VALUES (Null,'$nmkerusakan','$ket')";
        if ($conn->query($sql) === TRUE) {
            header("Location:?page=kerusakan");
        }
    }

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Kerusakan</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Kerusakan</label>
                            <input type="text" class="form-control" name="nmkerusakan" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="ket" maxlength="200" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=kerusakan">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>