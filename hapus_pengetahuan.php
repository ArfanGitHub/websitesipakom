<?php
// mengambil id dari parameter
$idpengetahuan=$_GET['id'];

// hapus basis pengetahuan
$sql = "DELETE FROM basis_pengetahuan WHERE idpengetahuan='$idpengetahuan'";
$conn->query($sql);

// hapus detail basis pengetahuan
$sql = "DELETE FROM detail_basis_pengetahuan WHERE idpengetahuan='$idpengetahuan'";
$conn->query($sql);

$conn->close();

header("Location:?page=pengetahuan");
?>