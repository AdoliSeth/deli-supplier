<?php
require('config/config.php');
require('config/db.php');

//  check for submit
if(isset($_POST['delete'])){
    echo "Deleted";

    //  get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM tbl WHERE id = {$delete_id}";

    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'cartfour.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

//  create query
$query = 'SELECT * FROM tbl';

// get result
$result = mysqli_query($conn, $query) ;

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


<?php include('inc/header.php') ?>


<!--<section>-->
<!--    <div class="container">-->
<!--        <h1>Cart</h1>-->
<!--        <div class="row">-->
<!--            --><?php //foreach($posts as $post):  ?>
<!--                <div class="col col-sm-4 col-md-4 col-lg-4 col-xl-4">-->
<!--                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">-->
<!--                        <div class="card-header">--><?php //echo $post['title'] ?><!--</div>-->
<!--                        <div class="card-body">-->
<!--                            <img style="width: 100%; height: 30vh" src="--><?php //echo $post['image'] ?><!--" class="img-responsive" > <br>-->
<!--                            <small class="card-title"> Ksh --><?php //echo $post['price'];?><!--</small>-->
<!--                            <p class="card-text">--><?php //echo $post['description']?><!--</p>-->
<!--                            <input type="text" name="quantity" class="form-control" value="1">-->
<!--                            <input type="hidden" name="hidden_title" class="--><?php //echo $posts['title']?><!--">-->
<!--                            <input type="hidden" name="hidden_price" class="--><?php //echo $posts['price']?><!--">-->
<!--                            <small>Posted on --><?php //echo $post['created_at'] ?><!-- by </small>-->
<!--                            <hr>-->
<!--                            <a class="btn btn-default" style="background-color: darkorange" href="--><?php //echo ROOT_URL;?><!--post.php?id=--><?php //echo $post['id'];?><!--">Buy Now</a>-->
<!--                            <a class="btn btn-default" style="background-color: darkorange" href="--><?php //echo ROOT_URL;?><!--cartthree.php?id=--><?php //echo $post['id'];?><!--">Add to Cart</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<div class="container">
    <h3>Order details</h3>
<!--        <div class="row"> -->
        <div class="table-responsive">
            <table class="table-bordered">
                <tr>
                    <th height="50px" width="20%">Title</th>
                    <th height="50px" width="10%">Price</th>
                    <th height="50px" width="20%">Quantity</th>
                    <th height="50px" width="15%">Total shopping</th>
                    <th height="50px" width="15%">Delivery fee</th>
                    <th height="50px" width="15%">Total</th>
                    <th height="50px" width="10%">Action</th>
                </tr>
            </table>
        </div>
<!--        </div>-->
        <div class="table-responsive"><br>
            <?php if (!empty($posts)) foreach($posts as $post):  ?>
                <div class="table-responsive">
                    <table class="table-bordered">
                        <tr>
                            <th height="50px" width="20%"><?php echo $post['title'] ?></th>
                            <th height="50px" width="10%"><?php echo $post['price'] ?></th>
                            <th height="50px" width="20%"><?php echo $post['quantity'] ?></th>
                            <th height="50px" width="14%"><?php
                                $mult = $post['price'] * $post['quantity']; echo $mult ?></th>
                            <th height="50px" width="15%"><?php
                                $deliveryfee = $post['price'] * $post['quantity'] * 0.1; echo $deliveryfee ?></th>
                            <th height="50px" width="15%"><?php echo $mult + $deliveryfee ?></th>
                            <th height="50px" width="5%">
                                <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                                    <input type="submit" name="delete" value="Remove" class="btn btn-danger">
                                </form>
                            </th>
                        </tr>

<!--                            <tr>-->
<!--                                <td colspan="3" align="right">Total</td>-->
<!--                                <td align="right">--><?php //if (!empty($total)) echo number_format($total,2); ?><!--</td>-->
<!--                                <td></td>-->
<!--                            </tr>-->
                    </table>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="table-responsive">
            <table class="table-bordered">
                <tr>
                    <th height="50px" width="79%">Total</th>
                    <th height="50px" width="15%">Price</th>
                    <th height="50px" width="5%">Action</th>

                </tr>
            </table>
        </div>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('inc/footer.php') ?>

