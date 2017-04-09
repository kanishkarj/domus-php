<?php
$id=$_GET['project'];
$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";

include ('functions.php');

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
    <link rel="stylesheet" href="../css/project.css">
    <script src="../js/common.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://use.fontawesome.com/4b257711cc.js"></script>
    <title>
        Domus
    </title>
</head>
<body>
<?php
$imgp = $row['img1'];
echo '
<header style="background-image:url('.$imgp.')">
    <nav class="nav-bar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.html">Domus</a>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="create.php">Create</a></li>
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
    <div id="search" >
    <form id="search-form"  role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" onclick="srch_onClick()">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
</header>
<figcaption>'.$row['img1_desc'].'</figcaption>
';
?>

<main>
<?php
$tags = explode(" ", $row['tags']);
$paras = explode("\n", $row['descr']);
echo "
<section id='title-cont'>
<h1>{$row['title']}</h1>
<h4>- {$row['name']}</h4>
</section>
<br>
<section id='tag-cont' class='container-fluid'>
<ul>
";
foreach ($tags as $tag){
    echo "<li><strong>{$tag}</strong></li>";
}
echo"
</ul>
</section>
<br>
<br>

";
foreach ($paras as $para){
    echo "<p>{$para}</p>";
}
$weekop =dateToWeek($row['date_upl'],$row['week_no']);
echo"

<br>
<article id='footer-cont'>
<blockquote>
<h1>
{$weekop}
</h1>
<h2>{$row['ppl_no']} people required</h2>
</blockquote>
</article>
<br>
<h4>Contact :</h4>
<br>
<blockquote>
<a href='mailto:{$row['email']}'><h3>{$row['email']}</h3></a>
<h2>{$row['ph_no']}</h2>
</blockquote>
<div>
";
}}
?></div>
</main>
<section class="col-lg-12">
    <ul  class="col-lg-12">
        <?php
        $img_table = $row['images'];
        $query = "SELECT * FROM `images` WHERE img_id='{$img_table}'";
        $res = mysqli_query($conn,$query);
        if($conn){
            foreach ($res as $row) {
                echo "
        <li class='col-lg-4 fig-cont col-sm-12'>
        <div>
        <figure class='figure'>
            <img src='{$row['path']}' class='figure-img' style='width: 100%; height:auto; '>
            <figcaption class='figure-caption text-right'>{$row['descr']}</figcaption>      
        </figure>
        </div>
        </li>
    ";
            }}

        ?>
    </ul>
</section>
<footer class="col-lg-12">
    <h4>Domus</h4>
    <a target="_blank" href="https://github.com/kanishkarj/domus"><i class="fa fa-github" aria-hidden="true"></i></a>
</footer>
</body>
</html>