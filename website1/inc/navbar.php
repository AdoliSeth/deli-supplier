<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <a class="navbar-brand" href="#">Deli</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--">Home</a>-->
<!--            </li>-->
<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--addpost.php">Add post</a>-->
<!--            </li>-->
<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--addshops.php">Add shop</a>-->
<!--            </li>-->
<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--shops.php">Shops</a>-->
<!--            </li>-->
<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--addcategory.php">Add Category</a>-->
<!--            </li>-->
<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--cartthree.php">Cartthree</a>-->
<!--            </li>-->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?php echo ROOT_URL ?>categories.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: midnightblue">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>categories.php">Categories</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>supermarkets.php">Supermarkets</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>groceries.php">Groceries</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>liquorstores.php">Liquor stores</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>generalshops.php">General shops</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>restaurants.php">Restaurants</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addcategory.php">Add Category</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?php echo ROOT_URL ?>categories.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: midnightblue">
                    Add Shop
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addsupermarket.php">Add Supermarket</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addgrocery.php"">Add Grocery</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addliquorstore.php"">Add Liquor store</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addgeneralshop.php"">Add General shop</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addrestaurant.php"">Add Restaurant</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?php echo ROOT_URL ?>categories.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: midnightblue">
                    View
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>supermarketaproducts.php">Supermarket A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>supermarketbproducts.php">Supermarket B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>groceryaproducts.php">Grocery A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>grocerybproducts.php">Grocery B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>liquorstoreaproducts.php">Liquor store A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>liquorstorebproducts.php">Liquor store B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>generalshopaproducts.php">General shop A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>generalshopbproducts.php">General shop B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>restaurantaproducts.php">Restaurant A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>restaurantbproducts.php">Restaurant B Products</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?php echo ROOT_URL ?>categories.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: midnightblue">
                    Add products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addsupermarketaproducts.php">Add Supermarket A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addsupermarketbproducts.php">Add Supermarket B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addgroceryaproducts.php">Add Grocery A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addgrocerybproducts.php">Add Grocery B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addliquorstoreaproducts.php">Add Liquor store A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addliquorstorebproducts.php">Add Liquor store B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addgeneralshopaproducts.php">Add General shop A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addgeneralshopbproducts.php">Add General shop B Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addrestaurantaproducts.php">Add Restaurant A Products</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>addrestaurantbproducts.php">Add Restaurant B Products</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

<!--            <li >-->
<!--                <a class="nav-link" href="--><?php //echo ROOT_URL ?><!--supermarketcategory.php">Supermarket Category</a>-->
<!--            </li>-->
            <li >
                <a class="nav-link" href="<?php echo ROOT_URL ?>cartfour.php">Cart</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL ?>login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL ?>logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL ?>signup.php">Signup</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
