<?php
require ('config/config.php');
require ('config/db.php');
//  create query
$query = 'SELECT * FROM generalshops';

// get result
$result = mysqli_query($conn, $query) ;

//fetch data
if (!empty($result)) {
    $generalshops = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//free result
if (!empty($result)) {
    mysqli_free_result($result);
}

//close the connection
mysqli_close($conn);

?>


<?php include ('inc/header.php') ?>


<!--<section>-->
<div class="container">
    <h1>General Shops</h1>
    <div class="row">
        <?php foreach($generalshops as $generalshop):  ?>
            <div class="col col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><?php echo $generalshop['shop_name'] ?></div>
                    <div class="card-body">
                        <img style="width: 100%; height: 30vh" src="<?php echo $generalshop['image'] ?>" class="img-responsive" > <br>
                        <p class="card-title"><?php echo $generalshop['location'];?></p>
                        <p class="card-text"><?php echo $generalshop['description']?></p>
                        <!--                            <input type="text" name="quantity" class="form-control" value="1">-->
                        <!--                            <input type="hidden" name="hidden_title" class="--><?php //echo $posts['title']?><!--">-->
                        <!--                            <input type="hidden" name="hidden_price" class="--><?php //echo $posts['price']?><!--">-->
                        <!--                            <small>Posted on --><?php //echo $post['created_at'] ?><!-- by </small>-->
                        <hr>
                        <a class="btn btn-default" style="background-color: darkorange" href="<?php echo ROOT_URL;?>generalshopaproducts.php?id=<?php echo $generalshop['id'];?>">View General shop A products</a>
                        <br>
                        <br>
                        <a class="btn btn-default" style="background-color: darkorange" href="<?php echo ROOT_URL;?>generalshopbproducts.php?id=<?php echo $generalshop['id'];?>">View General shop B products</a>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--</section>-->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>

