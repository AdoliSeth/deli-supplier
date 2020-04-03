<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['delete'])){
    echo "Deleted";

    //  get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM categories WHERE id = {$delete_id}";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'category.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

//  get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

//  create query
$query = 'SELECT * FROM categories WHERE id = '.$id;

// get result
$result = mysqli_query($conn, $query) ;

//fetch data
if (!empty($result)) {
    $categories = mysqli_fetch_assoc($result);
}

//free result
if (!empty($result)) {
    mysqli_free_result($result);
}

//close the connection
mysqli_close($conn);

//  check for submit
if(isset($_POST['submit'])) {
    echo "Submitted";

//  get form data
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);



    $query = "INSERT INTO categories(category, image, description) VALUES('$category', '$image', '$description', )";

    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . 'supermarkets.php');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }

}

?>

<br>
<?php include ('inc/header.php') ?>

<div class="container">
    <h1></h1>
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header"><?php echo $categories['category'] ?></div>
        <div class="card-body">
            <img style="width: 100%; height: 30vh" src="<?php echo $categories['image'] ?>" class="img-responsive" >
            <p class="card-text"><?php echo $categories['description']?></p>
<!--            <small>Posted on --><?php //echo $supermarkets['created_at'] ?><!-- by </small>-->
            <hr>
            <a name="submit" value="Submit" type="submit" class="btn btn-default" style="background-color: darkorange" href="<?php echo ROOT_URL;?>supermarkets.php?id=<?php echo $categories['id'];?>">View</a>
<!--            <a href=" editpost.php ?id=--><?php //echo $categories['id']; ?><!--" class="btn btn-default" style="background-color: green">Edit post</a>-->
            <hr>
            <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_id" value="<?php echo $categories['id']; ?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
            <a href="<?php echo ROOT_URL. 'category.php';?>" class="btn btn-success">Back</a>
        </div>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>


