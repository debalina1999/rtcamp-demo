<?php
$url="https://c.xkcd.com/random/comic/";
$headers = @get_headers($url);
$final_url = "";
foreach ($headers as $h)
{
    if (substr($h,0,10) == 'Location: ')
    {
    $final_url = trim(substr($h,10));
    break;
    }
}
$parsed_url= parse_url($final_url);
$num=$parsed_url['path'];

$postId= str_replace('/', "", $num ); //user id
// echo $postId;

//calling api

$response = file_get_contents("https://xkcd.com/$postId/info.0.json");
$response = json_decode($response); 

?>
<!-- <img src= alt="" srcset=""> -->






