<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">


    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>


    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>


    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    body {
        background-color: powderblue;
    }
    </style>
    <title>Registration</title>

    <div id="nav-placeholder">

    </div>
    <script>
    $(function() {
        $("#nav-placeholder").load("navigation.html");
    });
    </script>
</head>


<?php
  require('connect.php');
  $connect->query("SET NAMES 'utf8'");
  $name =$_COOKIE['login_user'];
   
  $sql= "SELECT * From Customer  Where account_number='".$name."'";
   
   
  $result = $connect->query($sql);
  $row=$result->fetch_assoc();
  $firstName=$row['firstName'];
  $lastName=$row['lastName'];
  $email=$row['email'];
  $phone=$row['phone'];
  $address=$row['address'];
  $city=$row['city'];
  $state=$row['state'];
  $zipcode=$row['zipcode'];

  function modify()
  {
    include('connect.php');
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
    if ($password!=null){
      if (strcmp($password,$V_password)){
        echo "<script type='text/javascript'>alert('The password and verify password are different!');</script>";
        header("refresh:0;url=signup.html");
      }
      else{
        $updatesql="Update Customer set password='$password', firstName='$f_name', lastName='$l_name', email='$email',phone='$phone', address='$address', city='$city', state='$state', zipcode='$zipcode' where account_number = '$name'";
      }
    
    
    
    }
    else{

      $updatesql="Update Customer set firstName='$f_name', lastName='$l_name', email='$email',phone='$phone', address='$address', city='$city', state='$state', zipcode='$zipcode' where account_number = '$name'";

    }
    
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
  if(isset($_POST['submit']))
  {
    modify();
  } 
  $connect->close();

 
?>

<body>

    <div class="container">
        <h2>Yang' Shopping Website -- Manage your profile</h2>
    </div>
    <div class="container">
        <form name="login" method="post" action="manageraccount.php">

            <div class="form-group">
                <p> Hello! <?php echo $name;?></p>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" name='password'>
            </div>

            <div class="form-group">
                <label for="password">New Verify Password</label>
                <input type="password" class="form-control" name='Verify_password'>
            </div>

            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name='f_name' value=<?php echo $firstName;?>>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name='l_name' value=<?php echo $lastName;?>>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                    value=<?php echo $email;?>>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" name='phone' value=<?php echo $phone;?>>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="<?php  echo $address;?>">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" value="<?php echo $city;?>">
                </div>


                <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <select name="state" class="form-control">
                        <option selected><?php echo $state;?></option>
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
                </div>

                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="zipcode" value=<?php echo $zipcode;?>>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Modify</button>
        </form>
    </div>






</body>

</html>