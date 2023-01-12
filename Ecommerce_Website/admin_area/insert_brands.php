<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    /* select data from database */
    $select_query = "select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Brand is present inside the database');</script>";
    } else {
        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully');</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <!-- w-90 sumado con el w-10 del div siguiente -->
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1"><!-- importante el name: -->
    </div>
    <div class="input-group w-10 mb-2">
        <!-- w-10 sumado con el w-90 del div anterior -->
        <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_brand" value="Insert Brands"><!-- importante el name: -->
    </div>
</form>