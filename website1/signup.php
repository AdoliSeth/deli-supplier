<?php
require ('config/config.php');
require ('config/db.php');

//  check for submit
if(isset($_POST['submit'])){
    echo "Submitted";

    //  get form data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);


    $query = "INSERT INTO users(fullname, username, email, phone, password, user_type) VALUES('$fullname', '$username', '$email', '$phone', '$password', '$user_type')";
    
    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'login.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }


}



?>

<?php include ('inc/header.php') ?>


<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="customerimage.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="vendorimage.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="deliveryimage.jpeg" class="d-block w-100" alt="...">
        </div>
        <br>
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div id="form-section">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" style="font-weight: bold;color: orange">
                            <fieldset>

                                <div class="form-group">
                                    <label for="">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password2" class="form-control" required>
                                </div>
                                <div class="input-group">
                                    <span>
                                        Supplier <input type="radio" name="user_type" value="supplier">
                                    </span>
                                    <span>
                                        Customer <input type="radio" checked name="user_type" value="customer">
                                    </span>
                                    <span>
                                        Deliverer <input type="radio" checked name="user_type" value="customer">
                                    </span>

                                </div>
                                <br>
                                <div class="col-auto my-1">
                                    <button class="btn btn-warning btn-block" name="submit" value="Submit" type="submit">Signup</button>
                                </div>
                    </div>

                    </fieldset>
                    </form>

                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3"></div>
        </div>
    </div>
</div>
</div>

<?php include ('inc/footer.php') ?>