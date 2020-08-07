
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
        body {background-color: powderblue;}
        h1   {color: blue;
            text-align:center;
        }
        p    {color: red;}
        .image{

            height:150px;
            width: 150px;
            
        }
        table, th, td {
            border: 1px solid white;
        }
        .table-image {
            td, th {
                vertical-align: middle;
            }
        }

        .buybutton{
            position: relative;
            top:10px;
        }
        .showphoto{
            max-height:600px;
            max-width: 400px;
            margin-bottom:10px;
        } 
        .alertmessage{
            color:red;
            font-weight: bold;
        }               
    </style>
    <div id="nav-placeholder">

    </div>
 

</head>
<body>




    <h1 id="h1_test">Buy the Product</h1>
    <?php

    $name =$_COOKIE['login_user'];
    require('connect.php'); 
    $id=  $_REQUEST['id'];

    $connect->query("SET NAMES 'utf8'");
    $sql = "SELECT * From Product join Product_Photo on Product.Product_id =  Product_Photo.Product_id where Product.Product_id=$id  ";
    $result = $connect->query($sql);
    $photo_path=array();

    if ($result->num_rows >0){
        while($row=$result->fetch_assoc()){
            $photo_path[]=$row['Path'];

                //array_push($photo_path, $row['path']);
            $product_name=$row['Product_name'];
            $product_description=$row['Product_description'];
            $product_price=$row["Product_price"];
            $product_aomunt=$row["Product_amount"];

        }

    }
    ?>
    
    
    <div class="container">
        <table class="table"> 
            <tr>

                <td>Product Name</td>
                <td><?php echo $product_name;?></td>
            </tr>

            <tr>
                <td>product Description</td>
                <td><?php echo $product_description;?></td>
            </tr>

            <tr>
                <td>product Price</td>
                <td><?php echo "$".$product_price;?></td>

            </tr>
            <tr>
                <td>Remaining Amount </td>
                <td id="remaining_amount"><?php echo $product_aomunt;?> </td>
            </tr>
        </table>

        <form action="createorder.php?id=<?php echo $id;?>" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Buying amount</label>
                <input class="input" id = "buyingamount" name ="buyingamount" type="number" value=1>
                <span class="alertmessage" id="alertmessage"></span>
                <button type="submit" class="btn btn-primary btn-block buybutton" id="buybutton" >Buy </button>
            </div>
        </form>


        <?php
        
        for ($i=0;$i<count($photo_path);$i++){

            $photo_src="Photo/".$photo_path[$i];
            echo "<div><img class='showphoto' src='$photo_src'></div>";
        }

        ?>

    </div>

    <script>

 
     $(document).ready(function(){
        $("#nav-placeholder").load("navigation.html");
        if($('#remaining_amount').html()==0){
            $('#remaining_amount').html('Sold out');
            $('#remaining_amount').css('color','red');
            $('#remaining_amount').css('font-weight','bold');
            $("#buyingamount").val(0);
            $("#buyingamount").attr('disabled',true);
            $("#buybutton").attr("disabled", true);

        }
        $("#buyingamount").bind('keyup mouseup', function () {
            var remaining=parseInt($("#remaining_amount").html());
            var buy_amount=$("#buyingamount").val();

            if(remaining <buy_amount ){
                $("#alertmessage").html("Execeed the max amount!");
                $("#buybutton").attr("disabled", true);
            }
            else if(buy_amount<=0){
                $("#alertmessage").html("Wrong amount!");
                $("#buybutton").attr("disabled", true);
            }
            else{
                $("#alertmessage").html("");
                $("#buybutton").attr("disabled", false);
            }
        });

        
     });


</script>         

</div>
</body>
</html>