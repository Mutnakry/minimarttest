<?php

session_start();

require './connect/connection.php';



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./datatable/dataTable.bootstrap.min.css">



</head>

<body>
    <!-- header -->
    <div class="container">
        
    </div>

    <div class="container">
        <div class="row" style="border: 1px solid lightgray;padding:20px">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $connect = "SELECT * FROM tblcategory";

                    $queryp = mysqli_query($conn, $connect);

                    while ($rowp = mysqli_fetch_array($queryp)) {

                    ?>

                        <tr>
                            <td><?php echo $rowp['id'] ?></td>
                            <td><?php echo $rowp['names'] ?></td>
                            <td><?php echo $rowp['detail'] ?></td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#editPurchase<?php echo $rowp['id'] ?>">Edit</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletepurchase<?php echo $rowp['id'] ?>">Delete</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editPurchase<?php echo $rowp['PurcaseId'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <form method="post" action="edit.php">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="form-label">ProductName</label>
                                                <select class="form-control" name="product" id="">
                                                    <option value="<?php echo $rowp['PurcaseId'] ?>"><?php echo $rowp['ProductName'] ?></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">PurchaseQty</label>
                                                <input name="purchaseqty" value="<?php echo $rowp['ProductQty'] ?>" class="form-control" type="number">
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Price</label>
                                                <input type="hidden" name="PurcaseId" value="<?php echo $rowp['PurcaseId'] ?>">
                                                <input readonly name="price" class="form-control" value="<?php echo $rowp['Price'] ?>" type="text">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="editpurchase" class="btn btn-primary"><i class='bx bx-edit-alt'></i>Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- for delete -->
                        <div class="modal fade" id="deletepurchase<?php echo $rowp['PurcaseId'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Do you want delete this product " <?php echo $rowp['ProductName'] ?> "</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="delete.php?deletepurchase=<?php echo $rowp['PurcaseId'] ?>" class="btn btn-danger">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>




<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script>
    $(window).on('load', function() {
        $('.loader-container').fadeOut(1000);
    })

    $(document).ready(function() {
        $('#myTable').DataTable();
    })
</script>
<script src="./datatable/jquery.dataTables.min.js"></script>
<script src="./datatable/dataTable.bootstrap.min.js"></script>



</html>