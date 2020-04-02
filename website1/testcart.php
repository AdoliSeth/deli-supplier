<?php
require ('config/config.php');
require ('config/db.php');
?>

session_start();



<?php include ('inc/header.php') ?>

<div class="container" style="width: 700px">
    <h3 align="center">Shopping cart</h3><br>
    <?php $query = "SELECT * FROM posts ORDER BY id ASC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        while ($posts = mysqli_fetch_array($result));
    }

    ?>
</div>

    <div class="container">
        <h1>Posts</h1>
        <?php foreach($posts as $post):  ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php echo $post['title'] ?></div>
                <div class="card-body">
                    <img style="width: 100%; height: 30vh" src="<?php echo $post['image'] ?>" class="img-responsive" > <br>
                    <small class="card-title"><?php echo $post['price'];?></small>
                    <p class="card-text"><?php echo $post['description']?></p>
                    <small>Posted on <?php echo $post['created_at'] ?> by </small>
                    <hr>
                    <a class="btn btn-default" style="background-color: darkorange" href="<?php echo ROOT_URL;?>cpost.php?id=<?php echo $post['id'];?>">Buy Now</a>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden_name" class="<?php echo $posts['title']?>">
                    <input type="hidden" name="hidden_price" class="<?php echo $posts['price']?>">
                </div>
            </div>
        <?php endforeach; ?>
    </div>




<?php include ('inc/footer.php') ?>