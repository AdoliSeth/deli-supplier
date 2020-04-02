<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['delete'])){
    echo "Deleted";

    //  get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM posts WHERE id = {$delete_id}";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

//  get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

//  create query
$query = 'SELECT * FROM posts WHERE id = '.$id;

// get result
$result = mysqli_query($conn, $query) ;

//fetch data
if (!empty($result)) {
    $posts = mysqli_fetch_assoc($result);
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
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);


    $query = "INSERT INTO posts(title, image, description, price) VALUES('$title', '$image', '$description', '$price')";

    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . 'testcart.php');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }

}

?>

<br>
<?php include ('inc/header.php') ?>

<div class="container">
    <h1>Posts</h1>
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><?php echo $posts['title'] ?></div>
            <div class="card-body">
                <img style="width: 100%; height: 30vh" src="<?php echo $posts['image'] ?>" class="img-responsive" >
                <small class="card-title"><?php echo $posts['price'];?></small>
                <p class="card-text"><?php echo $posts['description']?></p>
                <small>Posted on <?php echo $posts['created_at'] ?> by </small>
                <hr>
                <a name="submit" value="Submit" type="submit" class="btn btn-default" style="background-color: darkorange" href="<?php echo ROOT_URL;?>testcart.php?id=<?php echo $posts['id'];?>">Buy Now</a>
                <a href=" editpost.php ?id=<?php echo $posts['id']; ?>" class="btn btn-default" style="background-color: green">Edit post</a>
                <hr>
                <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $posts['id']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
                <a href="<?php echo ROOT_URL;?>" class="btn btn-success">Back</a>
            </div>
        </div>
</div>


    <div class="container">
        <a href="<?php echo ROOT_URL;?>" class="btn btn-default">Back</a>
            <h1><?php echo $posts['title'] ?></h1>
            <small>Created on <?php echo $posts['created_at'] ?> by </small>
            <small><?php echo $posts['description']?></small>
            <p><?php echo $posts['price'];?></p>
            <hr>
            <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_id" value="<?php echo $posts['id']; ?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
            <a href=" editpost.php ?id=<?php echo $posts['id']; ?>" class="btn btn-default">Edit post</a>

    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>

