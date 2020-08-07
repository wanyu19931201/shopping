<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">


    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>


    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    body {
        background-color: powderblue;
    }

    .head {
        display: none;
    }

    .submit:hover+.head {
        display: block;
        color: red;
    }
    </style>
    <title>Add new product</title>
    <div id="nav-placeholder">

    </div>
</head>

<body>
    <?php
require "Connect.php";
$Selectsql = "SELECT * FROM Product WHERE product_id=" . $_GET['id'];
// echo "<script type='text/javascript'>alert('$Selectsql');</script>";
$result = $connect->query($Selectsql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $producttName = $row["Product_name"];
        $productDes = $row["Product_description"];
        $productPrice = $row["Product_price"];
        $productAmount = $row["Product_amount"];
        $productType = $row["Category_id"];
        $productStatus = $row["Product_status"];
        //echo "<script type='text/javascript'>alert('$producttName');</script>";
    }
}
if (isset($_POST['submit'])) {

    $id = $_GET['id'];
    $name = $_POST["productName"];
    $description = $_POST["productDescription"];
    $price = $_POST["productPrice"];
    $amount = $_POST["productAmount"];
    $type = $_POST["Producttype"];
    $status = $_POST["Productstatus"];

    $sql = "UPDATE Product SET Product_name='$name', Product_description='$description', Product_price='$price',Product_amount='$amount',Category_id='$type',Product_status='$status' WHERE product_id='$id' ";
    //echo $sql;
    $result = $connect->query($sql);
    if ($result) {
        echo "<script type='text/javascript'>alert('You have modified your prodcut information!');</script>";
        echo "<script> setTimeout(function(){window.location.href='modifyProduct.php?id=$id';}); </script>";
    }
}
?>

    <div class="container">
        <h2>Yang' Shopping Website -- Upload your product!</h2>
    </div>
    <div class="container">
        <form method="post" action="">



            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" name='productName' id='productName'
                    value="<?php echo $producttName; ?>">
            </div>

            <div class="form-group">
                <label>Product Description</label>
                <input type="text" class="form-control" name='productDescription' value="<?php echo $productDes; ?>">
            </div>

            <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" name='productPrice' value="<?php echo $productPrice; ?>">
            </div>

            <div class="form-group">
                <label>Product Amount</label>
                <input type="text" class="form-control" name='productAmount' value="<?php echo $productAmount; ?>">
            </div>
            <div class="form-group">
                <label for="Producttype">Type</label>
                <select id="type" name="Producttype" class="form-control">



                    <optgroup label="Electroic">
                        <option value="1">Cellphone</option>
                        <option value="2">Laptop</option>
                        <option value="3">Monitor</option>
                        <option value="4">Earphone</option>
                        <option value="9">other(ELETRONIC)</option>
                    </optgroup>


                    <optgroup label="Book">
                        <option value="11">Textbook</option>
                        <option value="12">Novel</option>
                        <option value="13">Magazine</option>
                        <option value="19">other(BOOK)</option>
                    </optgroup>


                    <optgroup label="Furniture">
                        <option value="21">Lamp</option>
                        <option value="22">Desk</option>
                        <option value="23">Chair</option>
                        <option value="24">Sofa</option>

                        <option value="29">Other(FURNITURE)</option>
                    </optgroup>


                    <optgroup label="Clothes">
                        <option value="31">T-shirt</option>
                        <option value="32">Pants</option>
                    </optgroup>

                </select>
            </div>

            <div class="form-group">
                <label for="Productstatus">Status</label>
                <select id="status" name="Productstatus" class="form-control">

                    <option value="1">Open</option>
                    <option value="2">Close</option>

                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary submit" name="submit" id='submit'>Upload</button>
            </div>
        </form>
    </div>


    <script>
    $(function() {
        $("#nav-placeholder").load("navigation.html");
    });

    document.getElementById("type").value = "<?php echo $productType ?>";
    document.getElementById("status").value = "<?php echo $productStatus ?>";
    </script>
</body>

</html>