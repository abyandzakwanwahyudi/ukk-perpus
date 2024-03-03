<?php


$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM kategoribuku WHERE KategoriID=$id");

if($query) {
    echo "<script>alert('Hapus data Berhasil!'); location.href='dashboard.php?page=data/kategori/kategori-table';</script>";
}else{
    echo "<script>alert('Hapus data Gagal!'); location.href='dashboard.php?page=data/kategori/kategori-table';</script>";
}

?>





