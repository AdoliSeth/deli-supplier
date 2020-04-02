<?php
session_start();
require ('config/config.php');
require ('config/db.php');

//creating shopping cart


?>
<!--end of shopping cart-->



<?php
//  create query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';

// get result
if (!empty($conn)) {
    $result = mysqli_query($conn, $query) ;
}

//fetch data
if (!empty($result)) {
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//free result
if (!empty($result)) {
    mysqli_free_result($result);
}

//close the connection
mysqli_close($conn);

?>

<?php include ('inc/cheader.php') ?>

<section>
   <div class="container">
       <h1>Posts</h1>
        <div class="row">
            <?php foreach($posts as $post):  ?>
                <div class="col col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header"><?php echo $post['title'] ?></div>
                        <div class="card-body">
                            <img style="width: 100%; height: 30vh" src="<?php echo $post['image'] ?>" class="img-responsive" > <br>
                            <small class="card-title"> Ksh <?php echo $post['price'];?></small>
                            <p class="card-text"><?php echo $post['description']?></p>
                            <input type="text" name="quantity" class="form-control" value="1"/>
                            <input type="hidden" name="hidden_title" value="<?php echo $post['title']?>"/>
                            <input type="hidden" name="hidden_price" value="<?php echo $post['price']?>"/>
                            <small>Posted on <?php echo $post['created_at'] ?> by </small>
                            <hr>
                            <a class="btn btn-default" style="background-color: darkorange" href="<?php echo ROOT_URL;?>cpost.php?id=<?php echo $post['id'];?>">View Product</a>
                            <input class="btn btn-default" type="submit" name="add_to_cart" value="Add to Cart" style="background-color: darkorange" href="">
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!--cart table-->
<div class="container">
<div style="clear: both"></div> <br>
<h3>Order details</h3>
<div class="table-responsive">
    <table class="table-bordered">
        <tr>
            <th width="40%">Title</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php

        if (!empty($_SESSION["shopping_cart"])){
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values);
        }

        ?>

        <tr>
            <td><?php if (!empty($values["item_title"])) {
                    echo $values["item_title"];
                } ?></td>
            <td><?php if (!empty($values["item_quantity"])) {
                    echo $values["item_quantity"];
                } ?></td>
            <td><?php if (!empty($values["item_price"])) {
                    echo $values["item_price"];
                } ?></td>
            <td>
                <?php if (!empty($values['item_quantity'])) {
                    if (!empty($values['item_price'])) {
                        echo number_format($values['item_quantity'] * $values['item_price'], 2);
                    }

                } ?>

            </td>
            <td><a href="cindex.php?action=delete&id <?php echo $values['item_id']; ?>"><span class="text-danger">Remove</span></a></td>
        </tr>

        <?php
        if (!empty($values['item_quantity'])) {
            if (!empty($values['item_price'])) {
                $total = $total + ($values['item_quantity'] * $posts['item_price']);
            }
        }

        ?>

        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right"><?php if (!empty($total)) {
                    echo number_format($total,2);
                } ?></td>
            <td></td>
        </tr>

    </table>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('inc/footer.php') ?>

