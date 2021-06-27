<?php
require('./emailTemplate.php');
$title = $response->title;
$day = $response->day;
$month = $response->month;
$year = $response->year;
$img = $response->img;
$description = $response->alt;
$unsubscribe = "http://localhost/unsubscribe.php?id=46";
$user_email = "debalina1998@gmail.com";




?>
<div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>


var data = {
    service_id: 'service_abcg0x6',
    template_id: 'template_v77ipf5',
    user_id: 'user_upXB9Fsr5lJBDuDMraD0K',
    template_params: {
       "title": '<?php echo($title);?>',
     
       "day" : '<?php echo($day);?>',
        "month" : '<?php echo($month);?>',
        "year" : '<?php echo($year);?>',
        "img" : '<?php echo($img);?>',
        "description" : "<?php echo($description);?>",
        "unsubscribe" : '<?php echo($unsubscribe);?>',
        "user_email" :'<?php echo($user_email);?>'
    }
};

        $.ajax('https://api.emailjs.com/api/v1.0/email/send', {
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json'
        }).done(function() {
            alert('Your mail is sent!');
        }).fail(function(error) {
            alert('Oops... ' + JSON.stringify(error));
        });
        console.log(data);
    </script>


</div>