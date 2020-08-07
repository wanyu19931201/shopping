<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <title>Yang's shopping website -- My order</title>
    <div id="nav-placeholder">

    </div>
    <script>
    $(function() {
        $("#nav-placeholder").load("navigation.html");
    });
    </script>

</head>

<body>
    <div class="container">
        <ul class="list-group" id="product">

        </ul>
    </div>
</body>

<?php
require "connect.php";
$login_user = $_COOKIE["login_user"];
$selectProduct = "SELECT * FROM Product WHERE account_number='$login_user'";
$result = $connect->query($selectProduct);
$products_name = array();
$product_id = array();
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        array_push($products_name, $row["Product_name"]);
        array_push($product_id, $row["Product_id"]);
    }
}
$JSON_productName = json_encode($products_name);
$JSON_productId = json_encode($product_id);
?>
<script>
//document.getElementById("product");
// var name = names[i];
var json_productname = <?php echo $JSON_productName; ?> ;
var json_productId = <?php echo $JSON_productId; ?> ;

for (var i = 0; i < json_productId.length; i++) {

    var productName = json_productname[i];
    var producthref = "modifyProduct.php?id=" + json_productId[i];

    var a = document.createElement('a');
    var linkText = document.createTextNode(productName);
    a.appendChild(linkText);
    a.href = producthref;
    var li = document.createElement('li');
    li.appendChild(a);
    li.classList.add("list-group-item");
    document.getElementById("product").appendChild(li);
}
</script>

</html>