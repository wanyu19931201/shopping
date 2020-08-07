<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <title>Yang's shopping website</title>

    <style>
    body {
        background-color: powderblue;
    }

    h1 {
        color: blue;
        text-align: center;
    }

    table,
    th,
    td {
        border: 1px solid white;
    }

    .message {
        display: none;
    }

    .buy:hover+.message {
        display: inline;
        color: red;
    }

    .alertmessage {
        color: red;
        font-size: 20px;
        font-style: bold;
    }
    </style>

    <div id="nav-placeholder">

    </div>
</head>

<body>

    <h1 id="h1_test">Buy the Product</h1>
    <?php

$name = $_COOKIE['login_user'];
require 'connect.php';
$id = $_REQUEST['id'];

$connect->query("SET NAMES 'utf8'");
$sql = "SELECT * From Product join Product_Photo on Product.Product_id =  Product_Photo.Product_id where Product.Product_id=$id  ";
$result = $connect->query($sql);
$photo_path = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photo_path[] = $row['Path'];

        //array_push($photo_path, $row['path']);
        $product_name = $row['Product_name'];
        $product_description = $row['Product_description'];
        $product_price = $row["Product_price"];
        $product_aomunt = $row["Product_amount"];

    }

}

$sql_custome = "Select * From Customer where account_number = '$name'";
$result = $connect->query($sql_custome);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zipcode = $row['zipcode'];
    }

}

?>


    <div class="container">
        <table class="table">

            <tr>

                <td>Product Name</td>
                <td><?php echo $product_name; ?></td>
            </tr>

            <tr>
                <td>product Price</td>
                <td><?php echo "$" . $product_price; ?></td>

            </tr>
            <tr>
                <td>Amount</td>
                <td id="buyingamount" name="buyingamount"><?php echo $_POST['buyingamount'] ?></td>

            </tr>

            <tr>
                <td>Total Price</td>
                <td id="buyingamount" name="buyingamount">
                    <p id="item">Item : $ <?php echo round($product_price * $_POST['buyingamount'], 2); ?></p>
                    <p id="tax">Tax : $ <?php echo round($product_price * $_POST['buyingamount'] * 0.065, 2); ?></p>
                    <p id="total" style="color:red; font-size: 160%;">Total : $
                        <?php echo round($product_price * $_POST['buyingamount'] * 1.065, 2); ?></p>
                </td>


            </tr>
        </table>

        <form action="process_order.php?<?php echo 'id=' . $_REQUEST['id'] . '&amount=' . $_POST['buyingamount'] ?>"
            method="post">
            <div class="form-group">
                <div class="form-group">
                    <label>Oredr Name</label>
                    <input type="text" class="form-control" name='ordername' id='ordername'>
                    <label>Oredr Email</label>
                    <input type="text" class="form-control" name='email' id='email'>
                    <label>Oredr Phone</label>
                    <input type="text" class="form-control" name='phone' id='phone'>
                    <div class="form-group col-md-4">
                        <h2>Shipping Address</h2>
                        <label>Address</label>
                        <input type="text" class="form-control" name='address' id='address'>
                        <label>City</label>
                        <input type="text" class="form-control" name='city' id='city'>

                        <label for="state">State</label>
                        <select id="state" name="state" class="form-control" onchange="myFunction()">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        <script>

                        </script>
                        <label>ZipCode</label>
                        <input type="text" class="form-control" name='zipcode' id='zipcode'>
                        <br>
                    </div>
                    <h2>Payment</h2>
                    <br>
                    <label class="test" id="label_cardholder">Credit Card Holder</label>
                    <input type="text" class="form-control" name='cardholder' id='cardholder'>
                    <label id="label_cardnumber">Credit Card Number</label>
                    <input type="number" class="form-control" name='cardnumber' id='cardnumber'>
                    <label id="label_security_code">Security Code</label>
                    <input type="number" class="form-control" name='securitycode' id='securitycode'>
                    <label id="lable_expiration_date">Expiration Date(MM/YY)</label>
                    <input type="text" class="form-control" name="trip-start" id="expirationDate" placeholder="07/18">

                    <button type="button" class="btn btn-link" id="validationPayment">Validation Payment</button>
                </div>

                <div class="form-group">
                    <button type="submit" class="buy btn btn-primary" name="submit" disabled id='submit'>Buy</button>
                    <span class="message" id="message"> Please validation payment type before creating order. </span>
                </div>
            </div>
        </form>

    </div>

    <script>
    $(function() {
        $("#nav-placeholder").load("navigation.html");
    });

    document.getElementById("validationPayment").addEventListener("click", function() {
        var validation = true;

        var cardholder = document.getElementById("cardholder").value;
        var cardnumber = document.getElementById("cardnumber").value;
        var securitycode = document.getElementById("securitycode").value;
        var expirationDate = document.getElementById("expirationDate").value;



        if (cardholder == "" || cardholder.match(/[0-9]/g) != null) {

            document.getElementById("label_cardholder").classList.add("alertmessage");
            validation = false;

        } else {
            document.getElementById("label_cardholder").classList.remove("alertmessage");
        }


        if (!cardnumber.match(/[0-9]{16}/) || cardnumber == "") {
            document.getElementById("label_cardnumber").classList.add("alertmessage");

            validation = false;
        } else {
            document.getElementById("label_cardnumber").classList.remove("alertmessage");
        }


        if (!securitycode.match(/[0-9]{3}/)) {
            document.getElementById("label_security_code").classList.add("alertmessage");

            validation = false;
        } else {
            document.getElementById("label_security_code").classList.remove("alertmessage");
        }

        var userExpirationDate = expirationDate.split("/");

        var date = true;
        if (userExpirationDate.length != 2) {

            document.getElementById("lable_expiration_date").classList.add("alertmessage");
            date = false;
            validation = false;
        } else {

            var today = new Date();
            var current_year = parseInt(today.getFullYear());
            var current_month = parseInt(today.getMonth() + 1);
            console.log(parseInt(userExpirationDate[0]));
            if (parseInt(userExpirationDate[0]) > 12 || parseInt(userExpirationDate[1]) + 2000 < current_year ||
                (parseInt(userExpirationDate[1]) + 2000 == current_year && parseInt(userExpirationDate[0]) <
                    current_month)) {
                document.getElementById("lable_expiration_date").classList.add("alertmessage");
                validation = false;
                date = false;
            }
            /*
            if(parseInt(userExpirationDate[1])+2000< current_year ){
              document.getElementById("lable_expiration_date").classList.add("alertmessage") ;
              validation=false;
              date=false;
            }
            if(parseInt(userExpirationDate[1])+2000==current_year && parseInt(userExpirationDate[0])<current_month )  {
              document.getElementById("lable_expiration_date").classList.add("alertmessage") ;
              validation=false;
              date=false;
            } */

        }
        if (date) {
            document.getElementById("lable_expiration_date").classList.remove("alertmessage");
        }
        if (validation) {
            document.getElementById("submit").disabled = false;
            document.getElementById("message").remove();
            alert("Your payment is validated")

        }

        //alert(cardholder+"\n"+cardnumber+"\n"+securitycode+"\n"+expirationDate);


    });

    function getStateTax(state) {
        var state_rate = {
            "AL": 0.092,
            "AK": 0.017,
            "AZ": 0.084,
            "AR": 0.097,
            "CA": 0.081,
            "CO": 0.0761,
            "CT": 0.062,
            "DE": 0.066,
            "DC": 0.060,
            "FL": 0.072,
            "GA": 0.073,
            "HI": 0.044,
            "ID": 0.063,
            "IL": 0.092,
            "IN": 0.078,
            "IA": 0.069,
            "KS": 0.082,
            "KY": 0.060,
            "LA": 0.095,
            "MA": 0.062,
            "MI": 0.062,
            "ME": 0.058,
            "MN": 0.075,
            "MO": 0.089,
            "MS": 0.073,
            "NE": 0.069,
            "NV": 0.082,
            "NY": 0.089,
            "NM": 0.078,
            "ND": 0.068,
            "OH": 0.074,
            "OK": 0.089,
            "PA": 0.061,
            "RI": 0.079,
            "SC": 0.071,
            "SD": 0.064,
            "TN": 0.095,
            "TX": 0.081,
            "UT": 0.073,
            "VT": 0.060,
            "VA": 0.052,
            "WA": 0.098,
            "WI": 0.054,
            "WV": 0.064,
            "WY": 0.053

        };

        if (state_rate[state] != undefined)
            return state_rate[state];
        else
            return 0;
    }

    function myFunction() {


        // alert("c");
        //document.getElementById("item").innerHTML="change";
        var item = parseFloat( <?php echo $product_price * $_POST['buyingamount'] ?> ).toFixed(2);

        var state = document.getElementById("state").value;
        var tax_rate = (getStateTax(state) * item).toFixed(2);
        var total = (parseFloat(item) + parseFloat(tax_rate)).toFixed(2);



        document.getElementById("item").innerHTML = "Item  : $ " + item;
        document.getElementById("tax").innerHTML = "Tax  : $  " + tax_rate;
        document.getElementById("total").innerHTML = "Total  : $ " + total;
    }


    function load() {

        document.getElementById('ordername').value = '<?php echo $firstName . " " . $lastName; ?>';
        document.getElementById('email').value = '<?php echo $email; ?>';
        document.getElementById('phone').value = '<?php echo $phone; ?>';
        document.getElementById('address').value = '<?php echo strtoupper($address); ?>';
        document.getElementById('city').value = '<?php echo strtoupper($city); ?>';
        document.getElementById('zipcode').value = '<?php echo strtoupper($zipcode); ?>';
        document.getElementById('state').value = '<?php echo $state; ?>';
    }
    window.load();
    </script>

    </div>
</body>

</html>