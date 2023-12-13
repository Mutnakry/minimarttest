<?php
include('./connect/connection.php');
//include('./header/header.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./datatable/dataTable.bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal"> Add </button>

    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Detai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * from tblcategory  ORDER BY names  DESC";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['names']  ?></td>
                    <td><?php echo $row['detail']  ?></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>">Update</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#delete<?php echo $row['id'] ?>">Update</button>

                    </td>
                    <!-- update -->
                    <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                            <input type="hidden" name="categoryid" value="<?php echo $row['id'] ?>">
                                            <label for="form-label">Adress</label>
                                            <input name="detail" type="text" class="form-control" value="<?php echo $row['detail'] ?>">
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button name="savecategory" class="btn btn-danger">Update</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
                <!-- Add -->
                <!-- The Modal -->

                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Category</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="insert.php" method="post">

                                    <div class="form-group">
                                        <label for="form-label">Names</label>
                                        <input name="names" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-label">Detai</label>
                                        <input name="detail" type="text" class="form-control">
                                    </div>
                                    <button name="savecategory" class="btn btn-primary">Save</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- //for delete -->
                <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            </div>
                            <div class="modal-body">
                                <h4>Do you want to delete this product " <span class="text-danger"><?php echo $row['names'] ?></span> "</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="delete.php?deletecategory=<?php echo $row['id'] ?>" class="btn btn-primary">Yes</a>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    })
</script>
<script src="./datatable/jquery.dataTables.min.js"></script>
<script src="./datatable/dataTable.bootstrap.min.js"></script>