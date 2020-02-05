<?php
include "db_connect.php";

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

<table style="width:100%">
    <tr>
        <th>News id</th>
        <th>Date</th>
        <th>News title</th>
        <th>News Article</th>
        <th>Comments</th>

    </tr>
    <!-- da gi izlistam site new vo news table-->
    <?php
    $sql= "SELECT * FROM news";
    $query= $conn ->query($sql);
    $rows =$query->fetchAll(PDO::FETCH_OBJ);
    $count=0;
    foreach ($rows as $data):?>
        <?php if($count<=2){ ?>
            <?php
            $id_news=$data->news_id;
            $sql_com="SELECT * FROM comments WHERE news_id=$id_news ";
            $query_com=$conn->query($sql_com);
            $count_com=$query_com->rowCount();//kolku se komentari  potocno redovi vo comments tabelata za ova news_id
            ?>
            <tr>
                <td><?=$data->news_id ?></td>
                <td><?=$data->news_title ?></td>
                <td><?=$data->date ?></td>
                <td><?=$data->full_text ?></td>
                <td><a href="admin-new-comments.php?news_id=<?=$id_news?>">News Comments (<?=$count_com ?>)</a></td>

            </tr>
            <?php $count+=1; ?>

        <?php }else{
            break;}?>

    <?php endforeach;?>


</table>
</body>

</html>