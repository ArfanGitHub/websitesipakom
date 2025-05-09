<?php

$idkerusakan=$_GET['id'];

$sql = "DELETE FROM kerusakan WHERE idkerusakan='$idkerusakan'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=kerusakan");
}
$conn->close();
?>