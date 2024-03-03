<?php
if (isset($_POST['UserID'])) {
    $UserID = $_POST['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    
    // Periksa apakah data yang diperlukan sudah terisi
    if ($UserID == "" || $BukuID == "" || $Ulasan == "" || empty($Rating)) {
        echo '<script>alert("Data belum terisi")</script>';
    } else {
        // Lakukan pengecekan atau validasi lainnya sesuai kebutuhan

        $query = mysqli_query($connect, "INSERT INTO ulasanbuku(UserID,BukuID,Ulasan,Rating) values('$UserID', '$BukuID', '$Ulasan', '$Rating')");

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

    .rating-container {
        display: flex;
    }

    .star-icon {
        font-size: 30px; 
        margin-right: 5px;
        cursor: pointer;
    }

    .star-icon.checked {
        color: #ffc107; 
    }

</style>

<div class="row mt-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambah Ulasan</div>
                <hr>
                <form method="post">
                    <?php
                    // Periksa peran user untuk menampilkan atau menyembunyikan select user
                    if ($_SESSION['user']['Role'] == 'admin' || $_SESSION['user']['Role'] == 'petugas') {
                    ?>
                        <div class="form-group">
                            <label for="floatingSelect">Select Username</label>
                            <select name="UserID">
                                <option value=""></option>
                                <?php
                                $u = mysqli_query($connect, "SELECT * FROM user");
                                while ($user = mysqli_fetch_array($u)) {
                                    echo '<option value="' . $user['UserID'] . '">' . $user['Username'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    } else {
                        // Jika rolenya bukan admin atau petugas, gunakan ID pengguna dari sesi
                        $UserID = $_SESSION['user']['UserID'];
                        echo '<input type="hidden" name="UserID" value="' . $UserID . '">';
                    }
                    ?>

                    <div class="form-group">
                        <label for="floatingSelect">Select Buku</label>
                        <select name="BukuID">
                            <option value=""></option>
                            <?php
                            $b = mysqli_query($connect, "SELECT * FROM buku ORDER BY Judul ASC");
                            while ($buku = mysqli_fetch_array($b)) {
                                echo '<option value="' . $buku['BukuID'] . '">' . $buku['Judul'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-3">Ulasan</label>
                        <textarea class="form-control" id="input-3" name="Ulasan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="input-3">Rating</label>
                        <div class="rating-container">
                            <?php 
                            for ($i = 1; $i <= 5; $i++) {
                                $checked = ($i == 1) ? 'checked' : ''; // Untuk menandai bintang pertama sebagai bintang terpilih secara default
                            ?>
                            <input type="checkbox" name="Rating" value="<?php echo $i; ?>" <?php echo $checked; ?> style="display: none;">
                            <i class="zmdi zmdi-star-circle star-icon <?php echo $checked ? 'checked' : ''; ?>" onclick="setRating(<?php echo $i; ?>)"></i>
                            <?php } ?>
                        </div>
                    </div>





                    <div class="form-group py-2">
                        <div class="icheck-material-white">
                            <input type="checkbox" id="user-checkbox1" checked="" />
                            <label for="user-checkbox1">I Agree Terms & Conditions</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setRating(rating) {
        const stars = document.querySelectorAll('.star-icon');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('checked');
                star.previousElementSibling.checked = true;
            } else {
                star.classList.remove('checked');
                star.previousElementSibling.checked = false;
            }
        });
    }
</script>
