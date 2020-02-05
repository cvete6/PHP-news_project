<?php
//DELETE POST on GET[news_id]
include "db_connect.php";

    $news_id=$_GET['news_id'];
    $sql="DELETE FROM news WHERE news_id = $news_id ";
    $stm=$conn->prepare($sql);
    $stm->execute();
    //echo $stm->fetch();
    header("Location: /admin-view-post.php");

?>