<?PHP
header("Content-Type: text/html; charset=utf8");

if(isset($_POST["register"])){
    header("refresh:0;url=signup.html");
}

if(isset($_POST["submit"])){
    //Conncet db
    require("connect.php");




    $name = $_POST['name'];
    $password = $_POST['password'];
    setcookie('login_user',$name);
    setcookie('type',-1);
    if ($name!= NULL && $password !=null){
    
        $selectSql = "select * from Customer where account_number='$name' and password='$password'";;

        $results = $connect->query($selectSql);
    
        if ($results->num_rows > 0) {
            header("refresh:0;url=welcome.php");
            
        } else {
            echo "<script>alert('Username or password is not correct.Please try again.')</script>";
            echo "
            <script>
                setTimeout(function(){window.location.href='index.html';});
            </script>";
            
        }
       
    }else{

    echo "<script>alert('Username or password CANNOT be NULL.Please try again.')</script>";
    echo "
    <script>
    setTimeout(function(){window.location.href='index.html';});
    </script>";
    
    }
  
}
?>