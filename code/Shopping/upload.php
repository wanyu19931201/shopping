<?php
require 'connect.php';
$name = $_COOKIE['login_user'];
$fileCount = count($_FILES['addition']['name']);
$product_Name = $_POST['productName'];
$product_Description = $_POST['productDescription'];
$product_price = $_POST['productPrice'];
$product_amount = $_POST['productAmount'];
$product_type = $_POST['Producttype'];

$insertProduct = "INSERT INTO Product(Product_name,Product_description,Product_price,Product_amount,Category_id,Product_status,account_number) VALUES ('$product_Name','$product_Description','$product_price','$product_amount','$product_type','1','$name')";
$connect->query($insertProduct);

$selectProdcutId = "SELECT * FROM Product WHERE Product_name='$product_Name' AND Product_price='$product_price' AND Product_amount=$product_amount";
//echo $selectProdcutId."<br>";
$result = $connect->query($selectProdcutId);
if ($result > 0) {
    while ($row = $result->fetch_assoc()) {
        $resultId = $row["Product_id"];
        //$photo_path= $photo_row['path'];
        //array_push($product_firstPhoto,$photo_row['path']);
    }

}

$type = explode("/", $_FILES['main']['type']);

$oldPath = $_FILES['main']['tmp_name'];

$_FILES["main"]["name"] = date("YmdHis") . '0.' . $type[1];
$filename = $_FILES["main"]["name"] = date("YmdHis") . '0';
move_uploaded_file($oldPath, "Photo/" . $_FILES["main"]["name"]);
//echo $_FILES["main"]["name"]."<br>";

$insetMainPhoto = "INSERT INTO Product_Photo(Product_id,Path,keyPhoto) VALUES('$resultId','$filename',1)";
$connect->query($insetMainPhoto);
//echo $insetMainPhoto."<br>";

for ($i = 0; $i < $fileCount; $i++) {
    $type = explode("/", $_FILES['addition']['type'][$i]);
    $oldPath = $_FILES['addition']['tmp_name'][$i];
    //Modify name
    $_FILES["addition"]["name"][$i] = date("YmdHis") . ($i + 1) . '.' . $type[1];
    $filename = date("YmdHis") . ($i + 1);
    $insetAdditionPhoto = "INSERT INTO Product_Photo(Product_id,Path,keyPhoto) VALUES('$resultId','$filename',0)";
    $connect->query($insetAdditionPhoto);
    // echo $insetMainPhoto."<br>";

    move_uploaded_file($_FILES["addition"]["tmp_name"][$i], "Photo/" . $_FILES["addition"]["name"][$i]);
}

echo "<script type='text/javascript'>alert('You have succeefully upload your product.');</script>";
echo "<script> setTimeout(function(){window.location.href='addproduct.html';}); </script>";

/*
function checkuploadfile(){
//if
$okType=true;
$upfile=$_FILES["main"];
if( $_FILES["main"]['name']!=null){
$type=$upfile["type"];

$okType=false;
switch ($type){
case 'image/pjpeg':$okType=true;
break;
case 'image/jpeg':$okType=true;
break;
case 'image/gif':$okType=true;
break;
case 'image/png':$okType=true;
break;
}
if(!$okType){
echo "<script type='text/javascript'>alert('Upload file must be a picture. Please try again.');</script>";
//header("Location: localhost/shopping_new/addproduct.html");
//  echo "<script>
//      setTimeout(function(){window.location.href='addproduct.html';});
//  </script>";
return false;
}
}

for($i=0;$i<$fileCount;$i++){
$upfile=$_FILES["addition"][$i];

$type=$upfile["type"];
$okType=false;
switch ($type){
case 'image/pjpeg':$okType=true;
break;
case 'image/jpeg':$okType=true;
break;
case 'image/gif':$okType=true;
break;
case 'image/png':$okType=true;
break;
}

if(!$okType){
echo "<script type='text/javascript'>alert('Upload file must be a picture. Please try again.');</script>";
//echo "<script>
//    setTimeout(function(){window.location.href='addproduct.html';});
// </script>";
return false;
}

}
return true;

} */
