<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $UserID = $_SESSION['user']['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    if ($Ulasan == "") {
        echo '<script>alert("Data belum terisi")</script>';
    } else {
        $query = mysqli_query($connect, "UPDATE ulasanbuku SET BukuID='$BukuID', Ulasan='$Ulasan', Rating='$Rating' WHERE UlasanID='$id'");

        if ($query) {
            echo '<script>alert("Ubah data Berhasil!")</script>';
        } else {
            echo '<script>alert("Ubah data Gagal!")</script>';
        }
    }
}

$query = mysqli_query($connect, "SELECT * FROM ulasanbuku WHERE UlasanID='$id'");
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
    .rating-container {
        display: flex;
    }
    .star-icon {
        font-size: 30px;
        margin-right: 5px;
        cursor: pointer;
    }
    .star-icon.checked {
        color: #ffc107; /* Warna bintang yang dipilih */
    }
</style>

<div class="row mt-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Ubah Ulasan</div>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="floatingSelect">Select Buku</label>
                        <select name="BukuID">
                            <?php 
                            $b = mysqli_query($connect, "SELECT * FROM buku ORDER BY Judul ASC");
                            while ($buku = mysqli_fetch_array($b)) {
                                $selected = ($data['BukuID'] == $buku['BukuID']) ? 'selected' : '';
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-3">Ulasan</label>
                        <textarea class="form-control" id="input-3" name="Ulasan"><?php echo $data['Ulasan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input-3">Rating</label>
                        <div class="rating-container">
                            <?php 
                            for ($i = 1; $i <= 5; $i++) {
                                $checked = ($data['Rating'] == $i) ? 'checked' : '';
                            ?>
                            <input type="checkbox" name="Rating" value="<?php echo $i; ?>" <?php echo $checked; ?> style="display: none;">
                            <i class="zmdi zmdi-star-circle star-icon <?php echo $checked ? 'checked' : ''; ?>" onclick="setRating(<?php echo $i; ?>)"></i>
                            <?php } ?>
                        </div>
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
