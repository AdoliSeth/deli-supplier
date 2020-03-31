<?php
require ('config/config.php');
require ('config/db.php');
?>

session_start()

<?php include ('inc/header.php') ?>

<div class="container" style="width: 700px">
    <h3 align="center">Shopping cart</h3><br>
    <?php $query = "SELECT * FROM posts ORDER BY id ASC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result));
    }

    ?>
</div>

<div class="col-md-4"></div>




<?php include ('inc/footer.php') ?>