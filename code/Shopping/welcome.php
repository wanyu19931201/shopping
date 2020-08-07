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
    }
    h2{
        text-align:center;
        padding:10px;
    }
    .showimage {
        width: 150px;
    }

    table,
    th,
    td {
        border: 1px solid white;
    }
    
    .table-image {
        vertical-align: middle;
        
    }
    #search{
        margin-top:10px;
        margin-bottom:10%;
    }
    #welcome_user{
        padding:20px;
        font-size:20px;
    }
    </style>

    <div id="nav-placeholder">

    </div>
    <script>
        $(function(){
          $("#nav-placeholder").load("navigation.html");
            var user= "<?php echo $login_user;?>";
            if(user==""){
                console.log($("#Log").innerHTML);
                $("#Log").text('Log in');
            }   
      });
  </script>


</head>

<body>

<!--

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="welcome.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="addproduct.html">Add New product <span
                            class="sr-only">(current)</span></a>
                </li>


                <li class="nav-item active">
                    <a class="nav-link" href="myproduct.php">Manage my product<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-itemactive">
                    <a class="nav-link" href="myorder.php">My order<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="manageraccount.php">Manage account</a>
                </li>


                <li class="nav-item active">
                    <button type="button" class="btn btn-link" id="Log" onclick="logout()">Log out</button>
                </li>

            </ul>
        </div>
    </nav>
    -->
    <h2>Yang' Shopping Website -- Search Product</h2>
    <p class="font-italic" id="welcome_user"></p>
     <div class="clearfix"></div>
   


    <div class="container">
        <div class="row">
            <div class="col-12">
                <select value=-1 class="form-control" id="Category" name='Category'>

                    <option value="-1">All</option>
                    <option value="10">All Electroic</option>
                    <option value="20">All Book</option>
                    <option value="30">All Furniture</option>
                    <option value="40">All Clothes</option>


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
                <button class="btn btn-primary btn-lg btn-block" onclick="search()" id="search"> Search</button>
            





                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th width="250" scope="col">Product Name</th>
                            <th width="250" scope="col">Product Price</th>
                            <th width="250" scope="col">Product Description</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr id='p0'>
                            <td class='w-25'> <img src='' class='img-fluid img-thumbnail img-responsive showimage'
                                    alt='Error'></td>
                            <td> <a href='google.com'></a></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr id='p1'>
                            <td class='w-25'> <img src='' class='img-fluid img-thumbnail img-responsive showimage'
                                    alt='Error'></td>
                            <td> <a href='google.com'></a></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr id='p2'>
                            <td class='w-25'> <img src='' class='img-fluid img-thumbnail img-responsive showimage'
                                    alt='Error'></td>
                            <td><a href='google.com'></a></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr id='p3'>
                            <td class='w-25'> <img src='' class='img-fluid img-thumbnail img-responsive showimage'
                                    alt='Error'></td>
                            <td> <a href='google.com'></a></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr id='p4'>
                            <td class='w-25'> <img src='' class='img-fluid img-thumbnail img-responsive showimage'
                                    alt='Error'></td>
                            <td> <a href='google.com'></a></td>
                            <td></td>
                            <td></td>
                        </tr>





                    </tbody>
                </table>
                <button type="button" class="btn btn-link" onclick='previous_page()' id='previous_page'>Previous
                    Page</button>
                <button type="button" class="btn btn-link" onclick='next_page()' id='next_page'>Next Page</button>

                <span id="pages">Page 1 <span>
            </div>
        </div>
    </div>


    <?php

    function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    require 'connect.php';
    $type = $_COOKIE['type'];
    $login_user = $_COOKIE['login_user'];
    if ($type == -1) {
        $product_type = "Product.Category_id>=0";
    } else if ($type == 10) {
        $product_type = "Product.Category_id >=1 and Product.Category_id<=9";
    } else if ($type == 20) {
        $product_type = "Product.Category_id >=11 and Product.Category_id<=19";
    } else if ($type == 30) {
        $product_type = "Product.Category_id >=21 and Product.Category_id<=29";
    } else if ($type == 40) {
        $product_type = "Product.Category_id >=31 and Product.Category_id<=39";
    } else {
        $product_type = "Product.Category_id = $type";
    }

    $connect->query("SET NAMES 'utf8'");
    $sql = "SELECT * From Product join Category on Product.Category_id=Category.Category_id where $product_type and  Product_status ='1'";
    $type = $_COOKIE['type'];
    if($type==""){
        $type=-1; 
    }
    
    $result = $connect->query($sql);
    $products = array();
    $product_firstPhoto = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row["Product_id"];
            array_push($products, $row);

            $sql_photo = "SELECT path From Product join Product_Photo on Product.Product_id =  Product_Photo.Product_id where Product.Product_id=$product_id and keyPhoto=1";
            $photo_result = $connect->query($sql_photo);
            if ($photo_result > 0) {
                while ($photo_row = $photo_result->fetch_assoc()) {
                    //$photo_path= $photo_row['path'];
                    array_push($product_firstPhoto, $photo_row['path']);
                }

            }
            /*
        echo "<tr>";
        echo "<td class='w-25'> <img src='Photo/$photo_path' class='img-fluid img-thumbnail img-responsive showimage' alt='Error'></td>";
        $url='Product_Detail.php?id='.$row['Product_id'];

        echo "<td> <a href='".$url."'>".$row['Product_name']."</a></td>";
        echo "<td> $".$row['Product_price']."</td>";

        echo "<td>".$row['Product_description']."</td>";
        echo "</tr>";
        $photo_path="";
        */

        }
        //echo console_log($products);

    }
    $Product_JSON = json_encode($products);
    $photo_JSON = json_encode($product_firstPhoto);

    ?>



    <script>
    //var a = document.getElementById('Category');
    //a.addEventListener('select',function () { alert(this.value);} ,false) ;

    

    
    var page = 1;


    var product_JSON = <?php echo $Product_JSON; ?> ;
    var product_photo = <?php echo $photo_JSON; ?> ;

    console.log(product_JSON.length);
    max_page = parseInt(product_JSON.length / 5);
    if (product_JSON.length < 5)
        max_page = 1;
    if(5*max_page<product_JSON.length)
        max_page+=1;
    document.getElementById("search").onclick = function() {
        myFunction()
    };

    function myFunction() {

        var category = document.getElementById("Category");



        var type = category.value;
        document.cookie = "type=" + type;

        //var set_category= document.getElementById("Category")
        window.location.replace("welcome.php?page=" + page);

    }

    function previous_page() {
        page = parseInt(page) - 1;
        //alert(page);
        load_table(page);

    }

    function next_page() {

        page = parseInt(page) + 1;
        //alert(page);
        load_table(page);



    }


    function logout() {

        window.location.replace("index.html");

    }

    function load_table(page) {

        //alert(parseInt(page));
        //alert("Length"+product_JSON.length);
        var st = "PAGES " + page + "/ " + max_page;
        document.getElementById('pages').innerHTML = st;

        if (parseInt(page) == 1)
            document.getElementById("previous_page").disabled = true;
        else
            document.getElementById("previous_page").disabled = false;


        if (parseInt(page) >= parseInt(max_page)) {
            document.getElementById("next_page").disabled = true;
        } else {
            document.getElementById("next_page").disabled = false;
        }

        var show_product = 5;
        //alert(parseInt(product_JSON.length) / (parseInt(page)*5));

        if (parseInt(product_JSON.length) / (parseInt(page) * 5) < 1) {
            show_product = parseInt(product_JSON.length) % 5;
        }


        //alert("test"+show_product);

        //if(product_JSON)

        for (var i = 0; i < show_product; i++) {
            id = i + 5 * (page - 1);
            //alert(id);
            document.getElementById("p" + i).getElementsByTagName("td")[0].getElementsByTagName("img")[0].src =
                "Photo/" + product_photo[id];
            document.getElementById("p" + i).getElementsByTagName("td")[1].getElementsByTagName("a")[0].innerHTML =
                product_JSON[id].Product_name;
            document.getElementById("p" + i).getElementsByTagName("td")[1].getElementsByTagName("a")[0].href =
                "Product_Detail.php?id=" + product_JSON[id].Product_id;
            document.getElementById("p" + i).getElementsByTagName("td")[2].innerHTML = product_JSON[id].Product_price;
            var a = document.createElement('a');
            var des = product_JSON[id].Product_description;
            if (des.length > 100)
                des = des.substring(0, 100) + "...";
            document.getElementById("p" + i).getElementsByTagName("td")[3].innerHTML = des;
            
            //document.getElementById("p1").getElementsByTagName("td")[1].getElementsByTagName("a").href =
            //  "www.google.com";
            document.getElementById("p" + i).style.display = "";

        }
        //document.getElementById("p4").style.display="hidden";
        //  document.getElementById("p4").style.display="none";

        for (var i = show_product; i < 5; i++) {
            //alert("p"+i);
            document.getElementById("p" + i).style.display = "none";
        }

    }


    function load() {
        
        //alert(document.cookie.split(';'));
        var cookie = document.cookie.split(';');
        //alert(cookie.find(row => row.startsWith('login_user')));
        console.log(cookie);
        //if(cookie.find('login_user'))
        var user_name = "";
        for(var i=0;i<cookie.length;i++){
            var temp=cookie[i].trim();
            console.log(temp);
            if(temp.startsWith('login_user')){
                var tokens=temp.split("=");
                user_name=tokens[1];
            } 
        }
       
        document.getElementById("welcome_user").innerHTML = "Hello " + user_name;
        //document.getElementById("welcome_user").innerHTML = "Paragraph changed!";
        console.log(user_name);
        var type = -1;
        var getUrlString = location.href;
        var url = new URL(getUrlString);
        //page=url.searchParams.get('page');



        document.getElementById('Category').value = type;
        
        load_table(page);
    }
    window.onload = load;
    </script>
</body>

</html>