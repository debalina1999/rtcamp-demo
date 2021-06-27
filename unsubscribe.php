<?php
require('./connection.php');
// https://demo.com/unsubscribe.php?id=1
$id=$_GET['id']; 


$query =  "update  `user_email` set status=0 where id=$id";
$result=mysqli_query($conn,$query);
if($result==1){
    echo "you are now unsubscribed";
}else{
    echo "error updating";
}






















// $sql3="select status from `user_email` where id=$id";
//      $result = mysqli_query($conn,$sql3  ) ;
//     $row =mysqli_fetch_array($result);


//     if($row['status']== 1)
//     {
//     mysqli_query($conn, "update `user_email` set status=0 where id=$id") ;
//     // header("location:admin.php");
//     }
//     else
//     {
//         mysqli_query($conn, "update `user_email` set status=0 where id=$id") ;
//         // header("location:admin.php");
//     }
?>