<?php
include "db_connect.php";
if(isset($_GET['news_id'])){
    $news_id=$_GET['news_id'];
    //echo $news_id."<br />";
    $sql="SELECT * FROM news WHERE news_id=$news_id";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $data=$stmt->fetch();//samo prvio red da mi go fati ustvari si go filtriram samo to so mi treba!!!!!!!!!!!!!!!!
}
if(isset($_POST['submitted'])){
    if(!empty($_POST['naslov']) || !empty($_POST['statija'])) {
        //ako e submited da naprajme edit ama edit na koj news treba od get da go zemime
        $news_title = $_POST['naslov'];
        $full_text = $_POST['statija'];

        $sql_update = "UPDATE news SET news_title = :naslov, full_text = :statija WHERE news_id = $news_id";
        $stm = $conn->prepare($sql_update);
        $stm->execute([':naslov' => $news_title, ':statija' => $full_text]);

        header("Location: admin-view-post.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Promeni Statija</title>
</head>
<body>
<h1>Edit POST</h1>
<form action="" method="POST">
    <div class="input-group">
        <label for="naslov">Naslov na novosta</label>
        <input type="text" id="naslov" name="naslov" value="<?= $data["news_title"]; ?>">
    </div>
    <div class="input-group">
        <label for="statija">Celosen text na novosta</label>
        <textarea type="text" id="statija" name="statija"><?= $data["full_text"]; ?></textarea>
    </div>
    <input type="hidden" name="submitted" value="submitted">
    <input type="submit">
</form>
</body>
</html>
