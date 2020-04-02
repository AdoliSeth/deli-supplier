<?php
require ('config/config.php');
require ('config/db.php');

//steps
//1.grab user data from form
//if(isset($_POST['btn_login'])){
//    //2.clean data
//
//    if(isset($_POST['username'])){
//        $username =$_POST['username'];
//    }else{
//        $username_err = "Fill this field";
//    }
//
//    if(isset($_POST['password'])){
//        $password =$_POST['password'];
//    }else{
//        $password_err = "Fill this field";
//    }
//    /////////////////////////////////////////////////////
//       //4.check if user exists
////        4.1 hash password
//        $password = md5($password);
////        4,2 add user
////      use password and username to check if user exists
//    $sql ="SELECT `id`, `fullname`, `username`, `email`, `phone`, `password`, `user_type` FROM `users` WHERE username='$username' AND password='$password'";
//    $results = mysqli_query($conn, $sql);
//    if(mysqli_num_rows($results) > 0){
////        grab indiv data about user the from db
//        while($rows=mysqli_fetch_assoc($results)){
//            $id = $rows['id'];
//            $username = $rows['username'];
////            create session for user
//            session_start();
//            $_SESSION['kipande'] = $id;
//            $_SESSION['loggedin'] = true;
//            $_SESSION['username'] = $username;
//            $_user = $rows['user_type'];
//            if ($_user ==  'supplier'){
//                $_SESSION['aina_ya_mtumizi'] = true;
//            }else{
//                $_SESSION['aina_ya_mtumizi'] = false;
//            }
////            return user to index page
//
//            header("location:index.php");
//            exit();
//
//        }
////
//    }else{
////        wrong password or email
//        header("location:login.php");
//    }
//}


//  check for submit
if(isset($_POST['btn_login'])){
    echo "Logged in";

    //  get form data

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);



    $query = "SELECT `id`, `fullname`, `username`, `email`, `phone`, `password`, `user_type` FROM `users` WHERE username='$username' AND password='$password'";

    $results = mysqli_query($conn, $query);
    if(mysqli_num_rows($results) > 0){
//    if (mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'index.php');
    }else{
        header("location:login.php");
//        echo 'ERROR: '. mysqli_error($conn);
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

        <div class="container" style="color: orangered">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div id="form-section">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" style="font-weight: bold; color: orange">
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control" required>
                                </div>
                                <button class="btn btn-warning btn-block" name="btn_login">Login</button>
                            </fieldset>
                        </form>

                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3"></div>
            </div>
        </div>
    </div>
</div>



<?php
require 'inc/footer.php';
?>
