<?php
include('./connect/connection.php');

// delete company
if(isset($_GET['deletecompany'])){
    $deletecompany = $_GET['deletecompany'];
    $deletep = "DELETE FROM tblcompany WHERE id=$deletecompany";
    $querydelete = mysqli_query($conn, $deletep);
    if($querydelete){
       
        header('location:company.php');
    }
}
// delete category
if(isset($_GET['deletecategory'])){
    $deletecategory = $_GET['deletecategory'];
    $deletep = "DELETE FROM tblcategory WHERE id=$deletecategory";
    $querydelete = mysqli_query($conn, $deletep);
    if($querydelete){
       
        header('location:catagory.php');
    }
}
// delete product
if(isset($_GET['deleteproduct'])){
    $deleteproduct = $_GET['deleteproduct'];
    $deletep = "DELETE FROM tblproduct WHERE id=$deleteproduct";
    $querydelete = mysqli_query($conn, $deletep);
    if($querydelete){
       
        header('location:product.php');
    }
}

// delete purchase
if(isset($_GET['deletepurchase'])){
    $deletepurchase = $_GET['deletepurchase'];
    $deletep = "DELETE FROM tblpurchase WHERE id=$deletepurchase";
    $querydelete = mysqli_query($conn, $deletep);
    if($querydelete){
       
        header('location:purchasr.php');
    }
}
?>
?>