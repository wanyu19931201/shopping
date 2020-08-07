<?php 
header("Content-Type: text/html; charset=utf8");
if(isset($_POST['submit'])){


    //Get information from form
    $name =$_COOKIE['login_user'];
    $password=$_POST['password'];
    $V_password=$_POST['Verify_password'];
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    
   

    include('connect.php');
    $updatesql="Update Customer set first_name='$f_name', last_name='$l_name', email='$email',phone='$phone', address='$address', city='$city', state='$state', zipcode='$zipcode' where account_number = '$name'";
    $reslut=$connect->query($updatesql);
    if (!$reslut){
        die('Error: ' . mysql_error());
    }else{
        echo "<script>alert('Congragulation! You have modified your profile.')</script>";
        echo "
        <script>
        setTimeout(function(){window.location.href='manageraccount.php';},1);
        </script>";
    }
}
//mysql_close();//關閉資料庫

?>


