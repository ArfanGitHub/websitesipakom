<!-- Letakkan proses login disini -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
<!-- bootstrap css -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- datatables css -->
<link rel="stylesheet" href="assets/css/datatables.min.css">
<!--font awesome css-->
<link rel="stylesheet" href="assets/css/all.css">
<!--background-->
<link href="css/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <a class="navbar-brand" href="#">SAMSI COMPUTER</a>
</nav>
<!-- validasi login gagal, letakkan disini -->

<div class="cover" style="background-image:url(bgsamsi.jpg);
    background-size: cover;
    height: 100vh;">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form method="POST">
                <div class="card border-dark">
                    <div class="card-header bg-primary text-light border-dark">
                        <strong>HALAMAN LOGIN</strong>
                    </div>
                    <div class="card-body border">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" autocomplete="off" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>