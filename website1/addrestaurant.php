<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['submit'])){
    echo "Submitted";

    //  get form data
    $shop_name = mysqli_real_escape_string($conn, $_POST['shop_name']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);



    $query = "INSERT INTO restaurants(shop_name, image, location, description) VALUES('$shop_name', '$image', '$location', '$description')";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'restaurants.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }


}



?>

<?php include ('inc/header.php') ?>
<div class="container">
    <h1>Add Restaurant</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="font-weight: bold; color: orange">
        <fieldset>
            <div class="form-group">
                <label style="color: darkorange" for="">Shop name</label>
                <input type="text" name="shop_name" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: darkorange" for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <textarea type="text" name="location" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea type="body" name="description" class="form-control"></textarea>
            </div>
            <button class="btn btn-warning btn-block" name="submit" value="Submit" type="submit">Add Restaurant</button>
        </fieldset>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>





