<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <style>
    body {
        background-color: powderblue;
    }
    .Product_Info{
        display:none;
    }
    .product{
        cursor:pointer;
        color: blue;
    }
    table{
        margin-top:20px;
    }
    </style>

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
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Shipping Addresss</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                </tr>
            </thead>

            <tbody id="ordertable">

            </tbody>




        </table>
        <div class="Product_Info">
            <h3>title</h3>
            <p>descript</p>
            <div>Photo</div>
        
        </div>
    </div>
    <?php

$login = $_COOKIE['login_user'];
include "Connect.php";
$connect->query("SET NAMES 'utf8'");
//('SET CHARACTER SET utf8');
$select = "SELECT * FROM OrderDetail JOIN Product ON OrderDetail.Product_id= Product.Product_id WHERE OrderDetail.account_number='$login'";

$result = $connect->query($select);
$count_result = $result->num_rows;
$order_prodcut_id=array();
$order_prodcut_name = array();
$order_prodcut_Price = array();
$order_prodcut_Shipping_address = array();
$order_prodcut_OrderDate = array();
$order_prodcut_DeliveryDate = array();

if ($count_result > 0) {

    while ($row = $result->fetch_assoc()) {
        array_push($order_prodcut_id,$row['Product_id']);
        array_push($order_prodcut_name, $row["Product_name"]);
        array_push($order_prodcut_Price, $row["Product_price"]);
        $address = $row["Shipping_address"] . " " . $row["Shipping_city"] . " ," . $row["Shipping_state"];
        array_push($order_prodcut_Shipping_address, $address);
        array_push($order_prodcut_OrderDate, $row["OrderDate"]);
        array_push($order_prodcut_DeliveryDate, $row["DeliveryDate"]);

    }
}
$json_product_id=json_encode($order_prodcut_id);
$json_product_name = json_encode($order_prodcut_name);
$json_product_price = json_encode($order_prodcut_Price);
$json_address = json_encode($order_prodcut_Shipping_address);
$json_orderdate = json_encode($order_prodcut_OrderDate);
$json_eliverydate = json_encode($order_prodcut_DeliveryDate);

// echo $select."<br>";

?>

    <script>    
    var order_table = document.getElementById("ordertable");
    var order_productid=<?php echo $json_product_id;?>;
    var order_prodcutname = <?php echo $json_product_name; ?> ;
    var order_prodcutprice = <?php echo $json_product_price; ?> ;
    var order_addresss = <?php echo $json_address; ?> ;
    var order_orderdate = <?php echo $json_orderdate; ?> ;
    var order_deliverydate = <?php echo $json_eliverydate; ?> ;

    for (var i = 0; i < order_prodcutname.length; i++) {
        var tr = document.createElement('tr');
        tr.id=order_productid[i];
        
        var td_product_name = document.createElement('td');
        td_product_name.className='product';
        var td_product_price = document.createElement('td');
        var td_address = document.createElement('td');
        var td_orderdate = document.createElement('td');
        var td_deliverydate = document.createElement('td');

        td_product_name.appendChild(document.createTextNode(order_prodcutname[i]));
        td_product_price.appendChild(document.createTextNode(order_prodcutprice[i]));
        td_address.appendChild(document.createTextNode(order_addresss[i]));
        td_orderdate.appendChild(document.createTextNode(order_orderdate[i]));
        td_deliverydate.appendChild(document.createTextNode(order_deliverydate[i]));



        tr.appendChild(td_product_name);
        tr.appendChild(td_product_price);
        tr.appendChild(td_address);
        tr.appendChild(td_orderdate);
        tr.appendChild(td_deliverydate);

        order_table.appendChild(tr);



    }
    $(document).ready(function(){
        $('#ordertable').on('click','.product',function(){
            var clicked_product_id=$(this).parent().attr("id");
            //console.log($(this).parent().attr("id"));
            window.location.replace("Product_detail.php?id="+clicked_product_id);

        })
    });
    </script>
</body>

</html>