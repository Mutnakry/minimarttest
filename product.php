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
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModals"> Add </button>

    <table class="table table-bordered table-responsive" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name Product</th>
                <th>Name Company</th>
                <th>Name Category</th>
                <th>QTY</th>
                <th>OriginalPrice</th>
                <th>SalePrice</th>
                <th>Profit</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT pro.id,pro.names,com.names as namecompany,cat.names as namecategory,pro.qty,pro.originalprice,pro.saleprice,pro.profit,pro.photo from tblproduct as pro
            INNER JOIN tblcompany as com ON pro.id_company = com.id
            INNER JOIN tblcategory as cat ON pro.id_catagory = cat.id";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['names']  ?></td>
                    <td><?php echo $row['namecompany']  ?></td>
                    <td><?php echo $row['namecategory'] ?></td>
                    <td><?php echo $row['qty']  ?></td>
                    <td><?php echo $row['originalprice']  ?></td>
                    <td><?php echo $row['saleprice'] ?></td>
                    <td><?php echo $row['profit']  ?></td>
                    <td><?php echo $row['photo']  ?></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>">Update</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#delete<?php echo $row['id'] ?>">Delete</button>
                    </td>

                </tr>
                <!-- update -->
                <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <form action="update.php" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Product</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="insert.php" method="post">

                                        <div class="row">
                                            <div class="col-sm-6" style="background-color:yellow;">
                                                <div class="form-group">
                                                    <label for="form-label">Name Product</label>
                                                    <input name="namespro" type="text" class="form-control" value="<?php echo $row['names'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-label">Name Company</label>
                                                    <select name="namecom" id="" class="form-control">

                                                        <option value="<?php echo $rows['id_company'] ?>"> <?php echo $row['namecompany'] ?></option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-lable">CompanyName</label>
                                                    <select class="form-control" name="namecat" id="">
                                                        <option value="<?php echo $row['namecategory'] ?>"><?php echo $row['namecategory'] ?></option>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="col-sm-6" style="background-color:yellow;">
                                                <div class="form-group">
                                                    <label for="form-label">QTY</label>
                                                    <input name="qty" type="text" class="form-control" value="<?php echo $row['qty'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-label">Sale Price</label>
                                                    <input name="saleprice" type="text" class="form-control" value="<?php echo $row['saleprice'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form-label">Original Price</label>
                                                    <input name="oriprice" type="text" class="form-control" value="<?php echo $row['originalprice'] ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="background-color:yellow;">
                                            <div class="form-group">
                                                <label for="form-label">Profit</label>
                                                <input name="profit" type="text" class="form-control" value="<?php echo $row['profit'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Photo</label>
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input name="photo" type="text" class="form-control" value="<?php echo $row['photo'] ?>">
                                            </div>
                                        </div>
                                        <!-- button save -->
                                        <button name="saveproduct" class="btn btn-info mt-2">Update</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- Add -->
                <!-- The Modal -->
                <div class="modal" id="myModals">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Product</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="insert.php" method="post">
                                    <div class="row">
                                        <div class="col-sm-6" style="background-color:yellow;">
                                            <div class="form-group">
                                                <label for="form-label">Name Product</label>
                                                <input name="namespro" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Name Company</label>
                                                <select name="namecom" id="" class="form-control">
                                                    <option value="">------------------Select Values----------------------
                                                    <option>
                                                        <?php
                                                        $sql = "SELECT * FROM tblcompany";
                                                        $quer = mysqli_query($conn, $sql);
                                                        while ($rowcom = mysqli_fetch_array($quer)) {
                                                        ?>
                                                    <option value="<?php echo $rowcom['id'] ?>"><?php echo $rowcom['names'] ?></option>
                                                <?php
                                                        }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Name Category</label>
                                                <select name="namecat" id="" class="form-control">
                                                    <option value="">-----------------Select Values-----------------
                                                    <option>
                                                        <?php
                                                        $sql = "SELECT * FROM tblcategory";
                                                        $qu = mysqli_query($conn, $sql);
                                                        while ($rows = mysqli_fetch_array($qu)) {
                                                        ?>
                                                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['names'] ?></option>
                                                <?php
                                                        }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="background-color:yellow;">
                                            <div class="form-group">
                                                <label for="form-label">QTY</label>
                                                <input name="qty" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Sale Price</label>
                                                <input name="saleprice" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="form-label">Original Price</label>
                                                <input name="oriprice" type="text" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="background-color:yellow;">
                                        <div class="form-group">
                                            <label for="form-label">Profit</label>
                                            <input name="profit" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div id="selectedBanner">
                                                <label for="form-label">Photo</label>
                                                <input name="photo" id="image" type="file" class="form-control">
                                                <span id="imageicon"></span>
                                                <span id="imageStatus" class="error">Photo Required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- button save -->
                                    <button name="saveproduct" class="btn btn-info mt-2">Save</button>
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
                                <div class="alert alert-success">
                                    <h4> <strong>Success!</strong>Do you want to delete this product " <span class="text-danger"><?php echo $row['names'] ?></span> "</h4>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="delete.php?deleteproduct=<?php echo $row['id'] ?>" class="btn btn-primary">Yes</a>
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

<script>
    var selDiv = "";
    var storedFiles = [];
    $(document).ready(function() {
        $("#image").on("change", handleFileSelect);
        selDiv = $("#selectedBanner");
    });

    function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {
            if (!f.type.match("image.*")) {
                return;
            }
            storedFiles.push(f);
            var reader = new FileReader();
            reader.onload = function(e) {
                var html =
                    '<img src="' +
                    e.target.result +
                    "\" data-file='" +
                    f.name +
                    "alt='Category Image' width='80px'>";
                selDiv.html(html);
            };
            reader.readAsDataURL(f);
        });
    }
</script>