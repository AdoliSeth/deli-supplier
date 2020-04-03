<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['submit'])){
    echo "Submitted";

    //  get form data
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);



    $query = "INSERT INTO categories(category, image, description) VALUES('$category', '$image', '$description')";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'categories.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }


}



?>

<?php include ('inc/header.php') ?>
<div class="container">
    <h1>Add Categories</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="font-weight: bold; color: orange">
        <fieldset>
            <div class="form-group">
                <label style="color: darkorange" for="">Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label style="color: darkorange" for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea type="body" name="description" class="form-control"></textarea>
            </div>
            <button class="btn btn-warning btn-block" name="submit" value="Submit" type="submit">Add Category</button>
        </fieldset>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>



