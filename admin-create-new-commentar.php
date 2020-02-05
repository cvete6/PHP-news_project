<?php
include "db_connect.php";
//moznos za dodavajne na nov commentar

if(isset($_POST['submited'])){
    $news_id=$_COOKIE['news_id'];
    $comment=$_POST['comment'];
    $approved=$_POST['approved'];
    $author=$_POST['author'];
    $sql_insert='INSERT INTO comments(comment_id,news_id,author,comment,approved) VALUES(NULL,:newsid,:author,:comment,:approved)';
    $stm=$conn->prepare($sql_insert);
    $stm->execute([':newsid'=>$news_id, ':author'=>$author, ':comment'=>$comment, ':approved'=>$approved]);
    header("Location: admin-view-post.php");
    //$data=$stm->fetch();
    //echo $data['comment_id'];
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
<form action="admin-create-new-commentar.php" method="post">
    <h3>INSERT NEW COMMENTAR</h3>
    <p>Insert comment:</p>
    <input type="text" name="comment">
    <p>Insert author:</p>
    <input type="text" name="author">
    <p>Insert aproved(0) or (1):</p>
    <input type="text" name="approved">
    <input type="submit" name="submited" value="submit">
</form>
</body>
</html>
