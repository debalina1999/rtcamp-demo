<?php

require_once('./connection.php');

$sql = "SELECT * FROM `user_email` where(`status`=1)";
$result = mysqli_query($conn, $sql);
echo ("subscribe mailing list <br>");
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"] . " - email: " . $row["email"] . " " . $row["status"] . " " . $row["date_time"] . "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);


function sendemail($email, $id)
{
  require('./emailTemplate.php');
  $title = $response->title;
  $day = $response->day;
  $month = $response->month;
  $year = $response->year;
  $img = $response->img;
  $description = $response->alt;
  $unsubscribe = "http://localhost/test/unsubscribe.php?id=$id";
  $user_email = "$email";
?>
  <div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      var data = {
        service_id: 'service_abcg0x6',
        template_id: 'template_v77ipf5',
        user_id: 'user_upXB9Fsr5lJBDuDMraD0K',
        template_params: {
          "title": '<?php echo ($title); ?>',

          "day": '<?php echo ($day); ?>',
          "month": '<?php echo ($month); ?>',
          "year": '<?php echo ($year); ?>',
          "img": '<?php echo ($img); ?>',
          "description": "<?php echo ($description); ?>",
          "unsubscribe": '<?php echo ($unsubscribe); ?>',
          "user_email": '<?php echo ($user_email); ?>'
        }
      };

      $.ajax('https://api.emailjs.com/api/v1.0/email/send', {
        type: 'POST',
        data: JSON.stringify(data),
        contentType: 'application/json'
      }).done(function() {
       
      }).fail(function(error) {
       
      });
      console.log(data);
    </script>


  </div>

<?php


}


function execute_email($sql)
{
  require('./connection.php');
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $date = $row["date_time"];
      date_default_timezone_set('Asia/kolkata');
      $curdate = date('m/d/Y h:i:s a', time());
      $datetime1 = new DateTime($date);
      $datetime2 = new DateTime($curdate);
      $interval = $datetime1->diff($datetime2);

      $email = $row["email"];
      $id = $row["id"];
      if (($interval->i) >= 5) {
        sendEmail($email, $id);
        $id = $row['id'];
        $query_update_time = "UPDATE user_email SET date_time='$curdate' WHERE id=$id ";
        $result2 = mysqli_query($conn, $query_update_time);
      }
      echo $interval->i;
      //echo ("$curdate");
      // echo "id: " . $row["id"]. " - email: " . $row["email"]. " " . $row["status"]. $row["date_time"]. "<br>";
    }
  } else {
    echo "0 results";
  }
}
$sql2 = "SELECT * FROM `user_email` where(`status`=1)";
$status = true;

execute_email($sql2);



// mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Email |Status</title>
</head>

<body>
  <h1>This page should be on for sending email every 5 minutes</h1>
  <script type='text/javascript'>
    var obj;
    var interval = 10000;

    function myFunction() {
      window.location.replace("admin.php");
    }

    setTimeout(myFunction, interval);
  </script>
</body>

</html>