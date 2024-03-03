
<h1 class="h3 mb-3">Halaman Dashboard</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Welcome</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['user']['Role'])) {
                ?>
                    <table class="table">
                        <tr>
                            <td width="150">Username</td>
                            <td width="1">:</td>
                            <td><?php echo $_SESSION['user']['Username']; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Role</td>
                            <td width="1">:</td>
                            <td><?php echo $_SESSION['user']['Role']; ?></td>
                        </tr>
                        <tr>
                            <td width="150">Tanggal Login</td>
                            <td width="1">:</td>
                            <td><?php echo date('d-m-Y H:i:s'); ?></td>
                        </tr>
                    </table>
                <?php
                } ?>
        </div>
    </div>
    <?php if($_SESSION['user']['Role'] == "admin") { ?>
      <?php 
    $totalUsers = 0;
    $totalBooks = 0;
    $totalCategories = 0;
    $totalReviews = 0;

    $query_users = mysqli_query($connect, "SELECT COUNT(*) AS total_users FROM user WHERE Role = 'user'");
    $row_users = mysqli_fetch_assoc($query_users);
    $totalUsers = $row_users['total_users'];

    $query_books = mysqli_query($connect, "SELECT COUNT(*) AS total_books FROM buku");
    $row_books = mysqli_fetch_assoc($query_books);
    $totalBooks = $row_books['total_books'];

    $query_categories = mysqli_query($connect, "SELECT COUNT(*) AS total_categories FROM kategoribuku");
    $row_categories = mysqli_fetch_assoc($query_categories);
    $totalCategories = $row_categories['total_categories'];

    $query_reviews = mysqli_query($connect, "SELECT COUNT(*) AS total_reviews FROM ulasanbuku");
    $row_reviews = mysqli_fetch_assoc($query_reviews);
    $totalReviews = $row_reviews['total_reviews'];
?>

<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">User <span class="float-right"><i class="fa fa-user" aria-hidden="true"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Total Users <span class="float-right"><?php echo $totalUsers; ?> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">Books <span class="float-right"><i class="fa fa-book" aria-hidden="true"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Total Books <span class="float-right"><?php echo $totalBooks; ?> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">Categories <span class="float-right"><i class="fa fa-list" aria-hidden="true"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Total Categories <span class="float-right"><?php echo $totalCategories; ?> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0">Reviews <span class="float-right"><i class="fa fa-comments" aria-hidden="true"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Total Reviews <span class="float-right"><?php echo $totalReviews; ?> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
	

<?php } ?>

</div>

	
	  
	