<?php
include "db_connect.php";

if(isset($_POST["submit"])){

    $news_title=$_POST["news_title"];
    $full_text=$_POST["full_text"];
    $date = date_create();
    $finalDate=date_format($date, 'Y-m-d H:i:s');

    //da go vnesam zapisot vo baza
    $sql = 'INSERT INTO news(news_id,date,news_title,full_text) VALUES(NULL,:newsDate,:naslov, :statija)';
    $stm=$conn->prepare($sql);
    $stm->execute([':naslov'=>$news_title,':statija'=>$full_text,':newsDate'=>$finalDate]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Public View</title>
</head>
<body>
<h1>News Admin Panel</h1>
<form method="post" action="create_post.php">
    <p>Naslov na novosta: <input type="text" name="news_title"></p>
    <p>Celosen text na novosta: <textarea name="full_text"></textarea></p>
    <input type="submit" value="Submit" name="submit">
</form>
</body>
</html>

