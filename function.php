<?php
$email= $_POST["user_email"];
if(!$_POST["user_email"]){
    $email="ba@ff.com";
}
function storeData($email)
{
    require('./connection.php');
    date_default_timezone_set('Asia/kolkata');
    $curdate = date('m/d/Y h:i:s a', time());
    $sql2= " Select email 
    from user_email
    where email in ('$email') ";
    if ($res=mysqli_query($conn, $sql2)) {
        echo "<h1>you are subscribed to the mailing list</h1>";
        print_r( $res);

        if(($res->num_rows)>0){
            echo ("already exist");
        }else{
            $sql = "INSERT INTO `user_email`(`id`,`email`,`status`,`date_time`) VALUES (NULL, '$email', 1,'$curdate')";
            
            if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
            }else{ 
                echo ("failed");
            }
        }
        
    } else {
        echo ("Error: " . $sql2 . "<br>" . mysqli_error($conn));
    }

    mysqli_close($conn);
}



if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    echo $emailErr;
} else {
    //if validation completed
    storeData($email);
}
echo "<h2>you will be redirected to admin page in 3sec</h2>";
 ?>   
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
</head>

<body>
    <script type='text/javascript'>
    var obj;
    var interval = 3000;

    function myFunction() {
        window.location.replace("admin.php");
    }

    setTimeout(myFunction, interval);
    </script>
</body>

</html>

