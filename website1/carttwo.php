<?php
session_start();
require ('config/config.php');
require ('config/db.php');

if (isset($_POST['add_to_cart'])){
    if (isset($_SESSION["shopping_cart"])){
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)){
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_title' => $_POST["hidden_title"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }else{
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    }else{
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_title' => $_POST["hidden_title"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["shopping_cart"] as $keys => $values){
            if (!empty($item_id)) {
                if ($values["$item_id"] == $_GET["id"]){
                    if (!empty($shopping_cart)) {
                        unset($_SESSION["$shopping_cart"][$keys]);
                    }
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
}

?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <!-- Required meta tags -->-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!---->
<!--    <!-- Bootstrap CSS -->-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<!---->
<!--    <title>Hello, world!</title>-->
<!--</head>-->

<?php include ('inc/header.php') ?>

<body>
<br>
<div class="container" style="width: 700px">
    <h3 align="center">Shopping cart</h3> <br>
    <?php
    //  create query
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    // get result
    if (!empty($conn)) {
        $result = mysqli_query($conn, $query) ;
    }

    //fetch data
    if (!empty($result)) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //free result
    if (!empty($result)) {
        mysqli_free_result($result);
    }

    //close the connection
//    mysqli_close($conn);

    ?>

<!--    <div class="col-md-4">-->
<!--        <form method="post" action="index.php?action=add&id=--><?php //echo $row['id'];?><!--">-->
<!--            <div>-->
<!--                <img src="--><?php //echo $row['image']?><!--" alt="" class="img-responsive"> <br>-->
<!--                <h4 class="text-info">--><?php //echo $row['title']?><!--</h4>-->
<!--                <h4 class="text-danger">--><?php //echo $row['price']?><!--</h4>-->
<!--                <input type="text" name="quantity" class="form-control" value="1"/>-->
<!--                <input type="hidden" name="hidden_title" value="--><?php //echo $row['title']?><!--"/>-->
<!--                <input type="hidden" name="hidden_price" value="--><?php //echo $row['price']?><!--"/>-->
<!--                <input class="btn btn-default" type="submit" name="add_to_cart" value="Add to Cart" style="background-color: darkorange" href="">-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->


    <div class="row">

        <?php foreach($row as $post):  ?>
            <div class="col col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <form method="post" action="index.php?action=add&id=<?php echo $row['id'];?>">
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
                        <br>
                        <input class="btn btn-default" type="submit" name="add_to_cart" value="Add to Cart" style="background-color: darkorange" href="">
                    </div>
                </div>
                </form>
            </div>
        <?php endforeach; ?>

    </div>



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
                <td><a href="index.php?action=delete&id <?php echo $values['item_id']; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>

            <?php
            if (!empty($values['item_quantity'])) {
                if (!empty($values['item_price'])) {
                    $total = $total + ($values['item_quantity'] * $values['item_price']);
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
<br>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
<!--</body>-->
<!--</html>-->

<?php include ('inc/footer.php') ?>