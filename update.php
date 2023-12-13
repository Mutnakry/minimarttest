<?php
include('./connect/connection.php');

// update company
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $names = $_POST['names'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $insert = "UPDATE  tblcompany set names='$names',address='$address',phone='$phone' where id=$id";
    $que = mysqli_query($conn, $insert);
    if ($que) {

        echo "<script>alert('Save success!')</script>";
        header('location:company.php');
    }
    // header('location:company.php');
    // exit;
}
// update Category
if (isset($_POST['savecategory'])) {
    $id = $_POST['categoryid'];
    $names = $_POST['names'];
    $detail = $_POST['detail'];

    $insert = "UPDATE  tblcategory set names='$names',detail='$detail'  where id='$id'";
    $que = mysqli_query($conn, $insert);
    if ($que) {

        echo "<script>alert('Save success!')</script>";
        header('location:catagory.php');
    }
    // header('location:company.php');
    // exit;
}

// update product
// insert product
if (isset($_POST['saveproduct'])) {
    $id = $_POST['id'];
    $namespro = $_POST['namespro'];
    $namecom = $_POST['namecom'];
    $namecat = $_POST['namecat'];
    $qty = $_POST['qty'];
    $oriprice = $_POST['oriprice'];
    $profit = $_POST['profit'];
    $saleprice = $_POST['saleprice'];
    $photo = $_POST['photo'];

    $insert = "UPDATE tblproduct SET names='$namespro',qty='$qty',originalprice='$oriprice',saleprice='$saleprice',profit='$profit',photo='$photo' where id='$id'";
    $que = mysqli_query($conn, $insert);
    if ($que) {
        echo "<script>alert('Save success!')</script>";
        header('location:product.php');
    }
    
}

// update purchase
if(isset($_POST['updatepurchase'])){
    $id=$_POST['getid'];
    $namespro = $_POST['nameproduct'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $dob = $_POST['dob'];

    $update = "UPDATE tblpurchase  SET id_product ='$namespro', qty ='$price', price ='$qty',totalamount ='$total', dob ='$dob' where id='$id'";
    $que = mysqli_query($conn, $update);
    if ($que) {
        echo "<script>alert('Save success!')</script>";
    } 
    header('location:purchasr.php');
    exit;
}


?>


