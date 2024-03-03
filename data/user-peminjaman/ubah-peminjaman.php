<?php

$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $BukuID = $_POST['BukuID'];
    $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
    $TanggalPengembalian = $_POST['TanggalPengembalian'];
    $StatusPeminjaman = $_POST['StatusPeminjaman'];

    $query = mysqli_query($connect, "UPDATE peminjaman SET BukuID='$BukuID', TanggalPeminjaman='$TanggalPeminjaman', TanggalPengembalian='$TanggalPengembalian', StatusPeminjaman='$StatusPeminjaman' WHERE PeminjamanID='$id'");


    if ($query) {
        echo '<script>alert("Ubah data Berhasil!")</script>';
    } else {
        echo '<script>alert("Ubah data Gagal!")</script>';
    }
}


$query = mysqli_query($connect, "SELECT*FROM peminjaman WHERE PeminjamanID='$id'");
$data = mysqli_fetch_array($query);

?>

<style>
    /* Style for select */
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        color: black;
    }

    select option {
        background-color: white;
        color: black;
    }
</style>

<div class="row mt-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Ubah Peminjaman</div>
                <hr>
                <form method="post">
                <div class="form-group">
                <label for="floatingSelect">Pilih Buku</label>
                <select name="BukuID">
                        <?php 
                            $b = mysqli_query($connect, "SELECT * FROM buku ORDER BY Judul");
                            while ($buku = mysqli_fetch_array($b)) {
                                $selected = ($data['BukuID'] == $buku['BukuID']) ? 'selected' : '';
                        ?>
                                <option <?php echo $selected; ?> value="<?php echo $buku['BukuID'] ?>"><?php echo $buku['Judul']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                    


                    <div class="form-group">
                        <label for="input-3">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="input-3" name="TanggalPeminjaman" value="<?php echo $data['TanggalPeminjaman']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="input-3">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="input-3" name="TanggalPengembalian" value="<?php echo $data['TanggalPengembalian']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="input-3">Status Peminjaman</label>
                        <select name="StatusPeminjaman">
                            <option <?php if ($data['StatusPeminjaman'] == 'Dipinjam') echo 'selected' ?>>Dipinjam</option>
                            <option <?php if ($data['StatusPeminjaman'] == 'Dikembalikan') echo 'selected' ?>>Dikembalikan</option>
                        </select>
                    </div>
                    

                    <div class="form-group py-2">
                        <div class="icheck-material-white">
                            <input type="checkbox" id="user-checkbox1" checked="" />
                            <label for="user-checkbox1">I Agree Terms & Conditions</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
