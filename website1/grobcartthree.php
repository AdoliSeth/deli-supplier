<?php
require ('config/config.php');
require ('config/db.php');

//  get ID
if (!empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
}

//  create query
if (!empty($id)) {
    $query = 'SELECT * FROM groproductsb WHERE id = '.$id;
}

// get result
if (isset($query)) {
    $result = mysqli_query($conn, $query) ;
}

//fetch data
if (!empty($result)) {
    $posts = mysqli_fetch_assoc($result);
}

//free result
if (!empty($result)) {
    mysqli_free_result($result);
}

//close the connection
//mysqli_close($conn);

//  check for submit
if(isset($_POST['submit'])){
    echo "Submitted";

    //  get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    $query = "INSERT INTO tbl(title, image, price, quantity) VALUES('$title', '$image', '$price', '$quantity')";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'cartfour.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }


}



?>

<?php include ('inc/header.php') ?>
<div class="container">
    <h1>Add Posts</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="font-weight: bold; color: orange">
        <fieldset>
            <div class="form-group">
                <label style="color: darkorange" for="">Product</label>
                <input type="text" name="title" class="form-control" value="<?php echo $posts['title'];?>">
            </div>
            <div class="form-group">
                <label style="color: darkorange" for="">Image</label>
                <input type="submit" name="image" class="form-control" value="<?php echo $posts['image'];?>" >
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $posts['price'];?>">
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="1">
            </div>
            <button class="btn btn-warning btn-block" name="submit" value="submit" type="submit">Proceed to cart</button>
        </fieldset>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>




