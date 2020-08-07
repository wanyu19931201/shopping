<?php
require 'connect.php';

$orderdate = date("Y-m-d");
$deliverydate = date('Y-m-d', strtotime("$orderdate +10 days"));

//$orderdate='2020-06-22';
//$deliverydate='2020-06-29';
$ordername = $_POST["ordername"];
$accountnumber = $_COOKIE['login_user'];
$orderid = $_REQUEST["id"];
$orderamount = $_REQUEST["amount"];
$shippingaddress = $_POST["address"];
$shippingcity = $_POST["city"];
$shippingstate = $_POST['state'];
$shippingzipcode = $_POST['zipcode'];

$insertSql = "INSERT INTO OrderDetail( Account_number, Product_id, Amount, Shipping_address, Shipping_city, Shipping_state, Shipping_zipcode, OrderDate, DeliveryDate) VALUES ('$accountnumber','$orderid','$orderamount','$shippingaddress','$shippingcity','$shippingstate','$shippingzipcode','$orderdate','$deliverydate')";

$message = "Your order is created. You will delivery your package on $deliverydate";
echo "<script type='text/javascript'>alert('$message');</script>";

//Create order to database
$connect->query($insertSql);

//Modify the date in database
$selectSql = "SELECT * FROM Product WHERE Product_id=$orderid";
$selectResult = $connect->query($selectSql);
if ($selectResult->num_rows > 0) {
    // output data of each row
    while ($row = $selectResult->fetch_assoc()) {
        $amount = $row['Product_amount'];
    }
}

$remaining = $amount - $orderamount;
$status = 1;
//echo $remaining;
if ($remaining == 0) {
    $status = 0;
}

$updatesql = "UPDATE Product SET Product_amount=$remaining,Product_status=$status WHERE Product_id=$orderid";
//echo $updatesql;

$connect->query($updatesql);

echo "
    <script>
    setTimeout(function(){window.location.href='welcome.php';});
    </script>";

// header("refresh:0;url=welcome.php");
