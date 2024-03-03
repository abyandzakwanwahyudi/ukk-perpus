<?php

if (isset($_POST['submit'])) {
    $UserID = $_SESSION['user']['UserID'];
    $BukuID = $_POST['BukuID'];
    $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
    $TanggalPengembalian = $_POST['TanggalPengembalian'];
    $StatusPeminjaman = "Dipinjam";
    if ($UserID == "" || $BukuID == "") {
        echo '<script>alert("Data belum terisi")</script>';
    } else {
        $query = mysqli_query($connect, "INSERT INTO peminjaman(UserID,BukuID,TanggalPeminjaman,TanggalPengembalian,StatusPeminjaman) values('$UserID', '$BukuID', '$TanggalPeminjaman', '$TanggalPengembalian', '$StatusPeminjaman')");

        if ($query) {
            echo '<script>alert("Tambah data Berhasil!")</script>';
        } else {
            echo '<script>alert("Tambah data Gagal!")</script>';
        }
    }
}

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
            <div class="card-title">Vertical Form</div>
            <hr>
                <form method="post">
                <div class="form-group">
                <label for="floatingSelect">Select Buku</label>
                    <select name="BukuID">
                        <option value=""></option>
                        <?php 
                            $b = mysqli_query($connect, "SELECT*FROM buku ORDER BY Judul ASC");
                                while ($buku = mysqli_fetch_array($b)) {
                        ?>
                        <option value="<?php echo $buku['BukuID'] ?>"><?php echo $buku['Judul'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-3">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="input-3" name="TanggalPeminjaman">
                </div>

                <div class="form-group">
                    <label for="input-3">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="input-3" name="TanggalPengembalian">
                </div>
                    <div class="form-group py-2">
                    <div class="icheck-material-white">
                <input type="checkbox" id="user-checkbox1" checked=""/>
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