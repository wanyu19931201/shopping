<?php 
header("Content-Type: text/html; charset=utf8");
if(isset($_POST['submit'])){


    //Get information from form
    $name=$_POST['name'];
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

    if ($name == NUll || $password == NULL || $V_password==NULL){
        echo "<script type='text/javascript'>alert('The username and password must be entered.');</script>";
        header("refresh:0;url=signup.html");
        exit();
    }

    check_account($name);
   
    if (strcmp($password,$V_password)){
        echo "<script type='text/javascript'>alert('The password and verify password are different!');</script>";
        header("refresh:0;url=signup.html");
    }
    else{
        
        include('connect.php');
    
        $sql = "INSERT INTO Customer (Account_number, password, firstName, lastName, email, phone, address, city, state, zipcode) VALUES ('$name','$password','$f_name','$l_name','$email','$phone','$address','$city','$state','$zipcode')";
        
        $result=$connect->query($sql);
        
        if (!$result){
            
            echo "<script>alert('Error! ')</script>";
            echo $sql;
        }else{
            echo "<script>alert('Congragulation! You are a new member!')</script>";
            echo "
            <script>
            setTimeout(function(){window.location.href='index.html';},1);
            </script>";
        }
        $connect->close();
    }
}


function check_account($register_account){
    include('connect.php');
    $sql = "Select * From Customer where username = '$register_account'";
    $results = $connect->query($sql);
       
        if ($results->num_rows > 0) {
            echo "<script type='text/javascript'>alert('The username is exist.Please try another account number!');</script>";
            header("refresh:0;url=signup.html");
            exit();
        }
}
?>