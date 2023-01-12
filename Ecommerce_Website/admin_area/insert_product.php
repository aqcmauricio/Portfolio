<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title']; //corresponde al name del input
    $description = $_POST['description']; //corresponde al name del input
    $product_keywords = $_POST['product_keywords']; //corresponde al name del input
    $product_category = $_POST['product_category']; //corresponde al name del input
    $product_brand = $_POST['product_brand']; //corresponde al name del input
    $product_price = $_POST['product_price']; //corresponde al name del input
    $product_status = 'true';


    /* accessing images */

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];


    /* accessing image tmp name */

    $tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_image3 = $_FILES['product_image3']['tmp_name'];


    /* checking empty conditions */

    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price=="" or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the available fields');</script>";
        exit();
    }else{
        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");

        /* insert query */
        $insert_procducts = "insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query= mysqli_query($con,$insert_procducts);
        if($result_query){
            echo "<script>alert('Successfully inserted the products');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="div container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Para poder insertar imágenes es necesario: enctype="multipart/form-data" -->
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required"><!-- el label for y el input id deben ser idénticos. el input autocomple="off" evita que salgan sugerencias en el textbox. -->
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required"><!-- el label for y el input id deben ser idénticos. el input autocomple="off" evita que salgan sugerencias en el textbox. -->
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required"><!-- el label for y el input id deben ser idénticos. el input autocomple="off" evita que salgan sugerencias en el textbox. -->
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required"><!-- el label for y el input id deben ser idénticos. el input type="file" habilita la carga de archivos. -->
            </div>
            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required"><!-- el label for y el input id deben ser idénticos. el input type="file" habilita la carga de archivos. -->
            </div>
            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required"><!-- el label for y el input id deben ser idénticos. el input type="file" habilita la carga de archivos. -->
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label><!-- el label for y el input id deben ser idénticos. -->
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required"><!-- el label for y el input id deben ser idénticos. el input autocomple="off" evita que salgan sugerencias en el textbox. -->
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products" />
            </div>
        </form>
    </div>

</body>

</html>