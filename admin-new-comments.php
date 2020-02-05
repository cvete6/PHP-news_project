<?php
include "db_connect.php";
//da gi listam site komentari za daden news
    $news_id=$_GET['news_id'];
    setcookie('news_id',$_GET['news_id'],time()+86400);
    $sql_comments="SELECT * FROM comments WHERE news_id=$news_id";
    $query= $conn->query($sql_comments);
    $rows = $query->fetchAll(PDO::FETCH_OBJ);

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
<?php foreach ($rows as $data):?>

    <div>COMMENT_ID: <?=$data->comment_id; ?></div><br/>
    <div>NEWS_ID: <?=$data->news_id ;?></div><br/>
    <div>COMMENT: <?=$data->comment; ?></div><br/>
    <div>AUTHOR: <?=$data->author; ?></div><br/>
    <div>APPROVED: <?=$data->approved; ?></div><br/>
    <br />
<?php endforeach; ?>

<div><a href="admin-create-new-commentar.php?newsid=<?=$news_id?>">Add New Comment</a></div>


</body>
</html>

