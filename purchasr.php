<?php
include('./connect/connection.php');

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- icon -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./datatable/dataTable.bootstrap.min.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class="container">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal"> Add </button>


    <table class="table table-bordered" id="myTabl">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>QTY</th>
                <th>Price</th>
                <th>TotalAmount</th>
                <th>Date of bight</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT pur.id,pro.names,pur.qty,pur.price,pur.totalamount,pur.dob fROM tblpurchase as pur
            INNER JOIN tblproduct as pro  ON pur.id_product = pro.id";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['names']  ?></td>
                    <td><?php echo $row['qty']  ?></td>
                    <td><?php echo $row['price']  ?></td>
                    <td><?php echo $row['totalamount']  ?></td>
                    <td><?php echo $row['dob']  ?></td>
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
                                    <h4 class="modal-title">Update Company</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="form-label">Names Product</label>
                                        <input type="text" name="nameproduct" value="<?php echo $row['names'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-label">Qty</label>
                                        <input name="qty" type="text" class="form-control" value="<?php echo $row['qty'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-label">Sale Peice</label>
                                        <input name="price" type="text" class="form-control" value="<?php echo $row['price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-label">Total Amount</label>
                                        <input name="total" type="text" class="form-control" value="<?php echo $row['totalamount'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="getid" value="<?php echo $row['id'] ?>">
                                        <label for="form-label">Date Of Bight</label>
                                        <input name="dob" type="date" class="form-control" value="<?php echo $row['dob'] ?>">
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button name="updatepurchase" class="btn btn-danger">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- //for delete -->
                <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            </div>
                            <div class="modal-body alert alert-success">
                                <div class="alert alert-success">
                                    <h4> <strong>Success!</strong>Do you want to delete this product " <span class="text-danger"><?php echo $row['names'] ?></span> "</h4>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="delete.php?deletepurchase=<?php echo $row['id'] ?>" class="btn btn-primary">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<?php
            }
?>

<!-- Add -->
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="insert.php" method="post">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Company</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">


                    <div class="form-group">
                        <label for="form-label">ProductName</label>
                        <select class="form-control" name="nameproduct" id="nameproduct">
                            <option disabled="" selected="" value="">--Select--</option>
                            <?php
                            // require 'data.php';
                            // $product = loadproduct();
                            // foreach ($product as $pro) {
                            //     echo "<option value='" . $pro['id'] . "'>" . $pro['names'] . "</option>";
                            // }
                            $getdata = "SELECT * FROM tblproduct";
                            $refrest = mysqli_query($conn, $getdata);
                            while ($row = mysqli_fetch_array($refrest)) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['names'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                                        <label for="form-label">Price</label>
                                        <select class="form-control" name="price">
                                            <option id="priceproduct"></option>
                                        </select>zzz
                                    </div> -->
                    <div class="form-group">
                        <label for="form-label">Price</label>
                        <input name="price" type="text" class="form-control" id="priceproduct">
                    </div>

                    <div class="form-group">
                        <label for="form-label">QTY</label>
                        <input name="qty" type="text" class="form-control" id="qty">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Total Amount</label>
                        <input name="total" type="text" class="form-control" id="total">
                    </div>
                    <div class="form-group">
                        <label for="form-label">Date</label>
                        <input name="dob" type="date" class="form-control">
                    </div>

                </div>
                <button name="savepurchase" class="btn btn-primary">Save</button>

            </form>
        </div>

    </div>
</div>

</tbody>




</table>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#nameproduct').change(function() {
            var pid = $('#nameproduct').val();
            $.ajax({
                url: "data.php",
                method: "post",
                data: 'pid=' + pid
            }).done(function(price) {
                console.log(price);
                price = JSON.parse(price);
                $('#priceproduct').empty();
                price.forEach(function(prices) {
                    $("#priceproduct").append('<option>' + prices.qty + '</option')
                })
            })
        })
    })


    var price = 0,
        qty = 0,
        result = 0;
    result = price * nameproduct;
    document.getElementById('productname').innerHTML = nameproduct;
    document.getElementById('priceproduct').innerHTML = price;
    document.getElementById('total').innerHTML = result.toFixed(2);
</script>