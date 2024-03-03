<?php

$id = $_GET['id'];
if(isset($_POST['Judul'])) {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];

    $query = mysqli_query($connect, "UPDATE buku SET Judul='$Judul', Penulis='$Penulis', Penerbit='$Penerbit', TahunTerbit='$TahunTerbit' WHERE BukuID='$id' ");
    if($query) {
        echo "<script>alert('Ubah Data Berhasil!')</script>";
    }else{
        echo "<script>alert('Ubah Data Gagal!')</script>";
    }
}

$query = mysqli_query($connect, "SELECT*FROM buku WHERE BukuID='$id'");
$data = mysqli_fetch_array($query);
?>


<div class="row mt-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
            <div class="card-title">Ubah Buku</div>
            <hr>
                <form method="post">
                <div class="form-group">
                    <label for="input-3">Judul</label>
                    <input type="text" class="form-control" id="input-3" name="Judul" value="<?php echo $data['Judul'] ?>">
                </div>

                <div class="form-group">
                    <label for="input-3">Penulis</label>
                    <input type="text" class="form-control" id="input-3" name="Penulis" value="<?php echo $data['Penulis'] ?>">
                </div>

                <div class="form-group">
                    <label for="input-3">Penerbit</label>
                    <input type="text" class="form-control" id="input-3" name="Penerbit" value="<?php echo $data['Penerbit'] ?>">
                </div>

                <div class="form-group">
                    <label for="input-3">Tahun Terbit</label>
                    <input type="text" class="form-control" id="input-3" name="TahunTerbit" value="<?php echo $data['TahunTerbit'] ?>">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Submit</button>
                </div>
                </form>
        </div>
    </div>
</div>