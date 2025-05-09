<?php
// mengambil id dari parameter
$idkasus=$_GET['id'];

// hapus basis kasus
$sql = "DELETE FROM kasus WHERE idkasus='$idkasus'";
$conn->query($sql);

// hapus detail basis kasus
$sql = "DELETE FROM detail_kasus WHERE idkasus='$idkasus'";
$conn->query($sql);

$conn->close();

header("Location:?page=kasus");
?>