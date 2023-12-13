<?php
include('./connect/connection.php');
include('./header/header.php');

?>
<?php

//insert company
if (isset($_POST['save'])) {
    $names = $_POST['names'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $insert = "INSERT INTO tblcompany (names,address,phone) VALUES('$names','$address', '$phone')";
    $que = mysqli_query($conn, $insert);
    if ($que) {

        echo "<script>alert('Save success!')</script>";
    }
    header('location:company.php');
    exit;
}

// insert catedory
if (isset($_POST['savecategory'])) {
    $names = $_POST['names'];
    $detail = $_POST['detail'];

    $insert = "INSERT INTO tblcategory (names,detail) VALUES('$names','$detail')";
    $que = mysqli_query($conn, $insert);
    if ($que) {

        echo "<script>alert('Save success!')</script>";
    }
    header('location:catagory.php');
    exit;
}

// insert product
if (isset($_POST['saveproduct'])) {
    $namespro = $_POST['namespro'];
    $namecom = $_POST['namecom'];
    $namecat = $_POST['namecat'];
    $qty = $_POST['qty'];
    $oriprice = $_POST['oriprice'];
    $profit = $_POST['profit'];
    $saleprice = $_POST['saleprice'];
    $image_name = $_FILES['photo']['name'];
    $img_tmp = $_FILES['photo']['tmp_name'];
    $exp = explode(".", $image_name);
    $end = end($exp);
    $name = time().".".$end; 
    $path = "photo/" . $name;
    $allowed_ext = array("gif","jpg","jpeg", "png");


    $insert = "INSERT INTO tblproduct (names,id_company,id_catagory,qty,originalprice,saleprice,profit,photo) VALUES('$namespro','$namecom','$namecat','$qty','$oriprice','$saleprice','$profit','$path')";
    $que = mysqli_query($conn, $insert);
    if ($que) {
        echo "<script>alert('Save success!')</script>";
    }
    header('location:product.php');
    exit;
}

if(isset($_POST['savepurchase'])){
    $namespro = $_POST['nameproduct'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $dob = $_POST['dob'];


    $insert = "INSERT INTO `tblpurchase` (`id_product`, `qty`, `price`, `totalamount`, `dob`)  VALUES('$namespro','$price','$qty','$total','$dob')";
    $que = mysqli_query($conn, $insert);
    if ($que) {
        echo "<script>alert('Save success!')</script>";
    }
    header('location:purchasr.php');
    exit;
}
?>


