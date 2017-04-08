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
$tags = $row['tags'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- loading libraries -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/common.css">
    <script src="../js/common.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://use.fontawesome.com/4b257711cc.js"></script>
    <title>
        Domus
    </title>
</head>
<body>
<header>
    <nav class="nav-bar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Domus</a>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="create.html">Create</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a onClick="a_onClick()" href="#">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div id="search" >
    <form role="search">
        <div class="input-group">
            <input style="border-radius: 0px;" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<main>
<?php
echo "
<h1>{$row['title']}</h1>
<h4>- {$row['name']}</h4>
<h5>{$row['date_upl']}</h5>
<br>
<h4>Tags : {$tags}</h4>
<br>
<figure>
    <img src='{$row['img1']}' style='width: 100%; height:auto; '>
    <figcaption>{$row['img1_desc']}</figcaption>      
</figure>
<p>
{$row['descr']}
</p>
<br>
<h4>Time left  : </h4>
<h4>Total no. of recruitments required : {$row['ppl_no']}</h4>
<br>
<h4>Contact</h4>
<h5>Email id : {$row['email']}</h5>
<h5>Phone no. : {$row['ph_no']}</h5>
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
<footer class="col-lg-12">
    <h4>Domus</h4>
    <a><i class="fa fa-github" aria-hidden="true"></i></a>
</footer>
</body>
</html>