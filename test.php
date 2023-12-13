<?php
include('./connect/connection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- icon -->
</head>
<body>



    <div class="container">
        <div class="row" style="border: 1px solid lightgray;padding:20px">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ProductName</th>
                        <th>PurchaseQty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $connect = "SELECT * From tblcompany";

                   $queryp = mysqli_query($conn, $connect);

                    while ($rowp = mysqli_fetch_array($queryp)) {

                    ?>

                        <tr>
                            <td><?php echo $rowp['id'] ?></td>
                            <td><?php echo $rowp['names'] ?></td>
                            <td><?php echo $rowp['address'] ?></td>
                            <td><?php echo $rowp['phone'] ?></td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#editPurchase<?php echo $rowp['id'] ?>">Edit</button>
                            </td>
                        </tr>
                          <!-- update -->
                <div class="modal fade" id="editPurchase<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <form action="update.php" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Company</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="form-label">Names</label>
                                        <input type="text" name="names" value="<?php echo $row['names'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-label">Adress</label>
                                        <input name="address" type="text" class="form-control" value="<?php echo $row['address'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <label for="form-label">Phone</label>
                                        <input name="phone" type="text" class="form-control" value="<?php echo $row['phone'] ?>">
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button name="save" class="btn btn-danger">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                    <?php
                    }
                    ?>
                </tbody>
                
            </table>
        </div>
    </div>

</body>

</html>