<?php
// mengambil id dari parameter
$idpengetahuan=$_GET['idpengetahuan'];
$idgejala=$_GET['idgejala'];

$sql = "DELETE FROM detail_basis_pengetahuan WHERE idpengetahuan='$idpengetahuan' AND idgejala='$idgejala'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=pengetahuan");
}
$conn->close();
?>