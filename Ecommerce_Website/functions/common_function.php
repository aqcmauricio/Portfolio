<?php
    /* including connect file */
    include('./includes/connect.php');

    function getProducts(){
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php

        // condition to check isset or not
        if(!isset($_GET['category'])){
            if (!isset($_GET['brand'])) {
                $select_query = "SELECT * FROM `products` ORDER BY rand() lIMIT 0,9";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
                                </div>
                            </div>
                        </div>";
                }
            }
        }
    }

/* getting all products */
    function getAllProducts()
    {
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php

        // condition to check isset or not
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $select_query = "SELECT * FROM `products` ORDER BY rand()";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
                                </div>
                            </div>
                        </div>";
                }
            }
        }
    }

    /* Getting unique categories */
    function getUniqueCategories()
    {
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php

        // condition to check isset or not
        if (isset($_GET['category'])) {
            $category_id=$_GET['category'];
            $select_query = "SELECT * FROM `products` WHERE category_id='$category_id' ORDER BY rand() lIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            $num_rows=mysqli_num_rows($result_query);// validamos si hay productos habilitados
            if($num_rows==0){
                echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
            }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    /* Getting unique brands */
    function getUniqueBrands()
    {
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php

        // condition to check isset or not
        if (isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];
            $select_query = "SELECT * FROM `products` WHERE brand_id='$brand_id' ORDER BY rand() lIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            $num_rows = mysqli_num_rows($result_query); // validamos si hay productos habilitados
            if ($num_rows == 0) {
                echo "<h2 class='text-center text-danger'>This Brand is not Available for Service</h2>";
            }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }


    /* Displaying brands in sidenav */
    function getBrands(){
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php
        $select_brands = "Select * from `brands` ORDER BY 'brand_title'";
        $result_brands = mysqli_query($con, $select_brands);
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='nav-item'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                </li>";
        }
    }
    
    /* Displaying categories in sidenav */
    function getCategories(){
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php
        $select_categories = "Select * from `categories` ORDER BY 'category_title'";
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item'>
                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                </li>";
        }
    }

    /* searching products */
    function searchProduct(){
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php
        if (isset($_GET['search_data_product'])) {
            $search_data_value = $_GET['search_data'];
            $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%' ORDER BY rand()";
            $result_query = mysqli_query($con, $search_query);
            $num_rows = mysqli_num_rows($result_query); // validamos si hay productos habilitados
            if ($num_rows == 0) {
                echo "<h2 class='text-center text-danger'>No results match. No products found on this category.</h2>";
            }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    /* View details function */
    function viewDetails()
    {
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php

        // condition to check isset or not
        if (isset($_GET['product_id'])) {
            if (!isset($_GET['category'])) {
                if (!isset($_GET['brand'])) {
                    $product_id=$_GET['product_id'];
                    $select_query = "SELECT * FROM `products` WHERE product_id=$product_id ORDER BY rand()";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_image2 = $row['product_image2'];
                        $product_image3 = $row['product_image3'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                                    <div class='card'>
                                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$product_title</h5>
                                            <p class='card-text'>$product_description</p>
                                            <p class='card-text'>Price: $product_price/-</p>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                            <a href='index.php' class='btn btn-secondary'>Go home</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-8'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <h4 class='text-center text-info mb-5'>Related Products</h4>
                                    </div>
                                    <div class='col-md-6'>
                                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                    </div>
                                    <div class='col-md-6'>
                                        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }
        }
    }

    /* Get ip address function */
    function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    /* $ip = getIPAddress();
    echo 'User Real IP Address - ' . $ip;   */

    /* Cart function */
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $con; //convertimos a global la variable que fue definida en el archivo connect.php
            $ip = getIPAddress();
            $get_product_id=$_GET['add_to_cart'];
            $select_query= "SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id=$get_product_id";
            $result_query= mysqli_query($con, $select_query);
            $num_rows = mysqli_num_rows($result_query); // validamos si hay productos habilitados
            if ($num_rows > 0) {
                echo "<script>alert('This item is already added in your cart');</script>";
                echo "<script>window.open('index.php','_self');</script>";
            }else{
                $insert_query = "INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$ip',0)"; //la cantidad aumenta sólo cuando el usuario paga el producto
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item is added to cart');</script>";
                echo "<script>window.open('index.php','_self');</script>";
            }
        }
    }

    /* Function to get cart item numbers */
    function cartItem()
    {
        if (isset($_GET['add_to_cart'])) {
            global $con; //convertimos a global la variable que fue definida en el archivo connect.php
            $ip = getIPAddress();
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
            $result_query = mysqli_query($con, $select_query);
            $count_cart_items = mysqli_num_rows($result_query); // validamos si hay productos habilitados
        } else {
            global $con; //convertimos a global la variable que fue definida en el archivo connect.php
            $ip = getIPAddress();
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
            $result_query = mysqli_query($con, $select_query);
            $count_cart_items = mysqli_num_rows($result_query); // validamos si hay productos habilitados
        }
        echo $count_cart_items;
    }

    /* Total price function */
    function totalCartPrice(){
        global $con; //convertimos a global la variable que fue definida en el archivo connect.php
        $ip = getIPAddress();
        $total_price=0;
        $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result = mysqli_query($con, $cart_query);
        while($row = mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);
            while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
    }
?>