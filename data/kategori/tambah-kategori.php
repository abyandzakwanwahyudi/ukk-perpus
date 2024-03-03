<?php

if (isset($_POST['NamaKategori'])) {
    $NamaKategori = $_POST['NamaKategori'];
    if ($NamaKategori == "") {
        echo '<script>alert("Data belum terisi")</script>';
    } else {
        $query = mysqli_query($connect, "INSERT INTO kategoribuku(NamaKategori) values('$NamaKategori')");

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
            <div class="card-title">Tambah Kategori</div>
            <hr>
                <form method="post">
                <div class="form-group">
                    <label for="input-3">Nama Kategori</label>
                    <input type="text" class="form-control" id="input-3" name="NamaKategori">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Submit</button>
                </div>
                </form>
        </div>
    </div>
</div>