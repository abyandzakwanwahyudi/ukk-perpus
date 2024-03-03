<?php

if (isset($_POST['Judul'])) {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    if ($Judul == "" || $Penulis == "" || $Penerbit == "" || $TahunTerbit == "") {
        echo '<script>alert("Semua data harus diisi")</script>';
    } else {
        $query = mysqli_query($connect, "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit) VALUES ('$Judul', '$Penulis', '$Penerbit', '$TahunTerbit')");

        if ($query) {
            echo '<script>alert("Tambah data Berhasil!")</script>';
        } else {
            echo '<script>alert("Tambah data Gagal!")</script>';
        }
    }
}

?>

<div class="row mt-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambah Buku</div>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="Judul">
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="Penulis">
                    </div>

                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="Penerbit">
                    </div>

                    <div class="form-group">
                        <label for="tahunTerbit">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahunTerbit" name="TahunTerbit">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
