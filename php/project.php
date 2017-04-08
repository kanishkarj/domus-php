<?php
$id=$_GET['project'];
$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";

$img;$title;$desc;$date;$name;$img_desc;$img_table;

$conn = new mysqli($hs,$un,$pw,$db);
$query = "SELECT * FROM `input` WHERE p_id={$id}";
$res = mysqli_query($conn,$query);

if($conn){

foreach ($res as $row){
$img_table = $row['images'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- loading libraries -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/common.css">
    <script src="../js/common.js"></script>
    <script src="../js/project.js"></script>
    <title>
        Project Name
    </title>
</head>
<body>
<header>

</header>
<main>
<?php
echo "
<h1>{$row['title']}</h1>
<h4>- {$row['name']}</h4>
<h5>{$row['date_upl']}</h5>
<br>
<figure>
    <img src='{$row['img1']}' style='width: 100%; height:auto; '>
    <figcaption>{$row['img1_desc']}</figcaption>      
</figure>
<p>
{$row['descr']}
</p>
<br>
<section>
";
}}
?>
<?php
$query = "SELECT * FROM `images` WHERE img_id='{$img_table}'";
$res = mysqli_query($conn,$query);
if($conn){

foreach ($res as $row) {
    echo "
        <figure class='col-lg-4'>
            <img src='{$row['path']}' style='width: 100%; height:auto; '>
            <figcaption>{$row['descr']}</figcaption>      
        </figure>
    ";
}}

?>
    </section>
</main>

</body>
</html>