<?php $emailErr="";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="index.css">
</head>

<body onload="load()">
    <h1>Enter your email</h1>
    <div class="inputSection">
        <form method="post" action="./function.php">
            <input name="user_email" id="user_email" type="text" placeholder="email">
            <input type="submit" name="submit_button" id="submit_button" value="submit email" >
            <p><?php echo $emailErr?></p>
        </form>

    </div>
<script>

function load()
{
window.open('http://localhost/test/admin.php','_blank');

}

</script>
</body>

</html>