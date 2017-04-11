<?php
$id=$_GET['project'];
$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";

include ('functions.php');

$img;$title;$desc;$date;$name;$img_desc;$img_table;

$conn = new mysqli($hs,$un,$pw,$db);//initiates the database connection
$query = "SELECT * FROM `input` WHERE p_id={$id}";
$res = mysqli_query($conn,$query);//query's the database for one particular project
//checks if the connection has been established
if($conn){

foreach ($res as $row){
$img_table = $row['images'];
$tags = $row['tags'];
$ppl_no = $row['ppl_no'];
$email = $row['email'];
$ph_no  = $row['ph_no'];
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
    <link rel="stylesheet" href="../css/w3.css">
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
<header >  <!--sets the background image for the header -->
   <nav class="nav-bar navbar-light">
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
                        <button class="btn btn-default" id="srch-btn" onclick="srch_onClick()">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div id="bg_img" style="background-image:url('.$imgp.');height: 100% ;width: 100%"/>
</header>
<br><br>
<figcaption>'.$row['img1_desc'].'</figcaption> 
<hr>
';
?>

<main>
<?php
    $tags = explode(" ", $row['tags']); //splits the tags into seperate tags
    $paras = explode("\n", $row['descr']);//splits description into different paragraphs
echo "
<section id='title-container'>
    <h1>{$row['title']}</h1>
    <h4>- {$row['name']}</h4>
</section>
<br>
    
";

echo"

<br>
<section id='main-cont'>
";
foreach ($paras as $para){
    echo "<p>{$para}</p>";
}
$weekop =dateToWeek($row['date_upl'],$row['week_no']);
?>

    <br>
    <div class="w3-content w3-display-container" id="img-cont">
        <?php
        $img_table = $row['images'];
        $query = "SELECT * FROM `images` WHERE img_id='{$img_table}'"; //collects all the images with the same images id as the current project
        $res = mysqli_query($conn,$query);
        if($conn){
            //the following loop prints out image enclosed in a figure tag
            foreach ($res as $row) {
                echo "
        <div class=\"w3-display-container mySlides\">
           <img src=\"{$row['path']}\" style=\"width:100%\">
            <div class=\"w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black\">
                {$row['descr']} 
            </div>
        </div>
       
    ";
            }}

        ?>
        <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
    </div>
    <br>

    <section id='tag-cont' class='container-fluid'>
        <h6>Tags : </h6>
        <ul>
            <?php
            foreach ($tags as $tag){
                echo "<li><strong>{$tag}</strong></li>";
            }
            ?>
        </ul>
    </section>
    </section>
    <?php
echo"

<br>

<article class='footer-cont'>
<blockquote class='col-lg-6 col-sm-12'>
 <h6>Email<br></h6>
    <h4>
        <a href='mailto:{$email}'>{$email}</a> 
    </h4>
</blockquote>
<blockquote class='col-lg-6 col-sm-12'>
  <h6>phone no.</h6> 
    <h4>
    {$ph_no}
    </h4>
</blockquote>
<blockquote class='col-lg-6 col-sm-12'>
 <h6>Recruiting till<br></h6>
    <h4>
        {$weekop}
    </h4>
</blockquote>
<blockquote class='col-lg-6 col-sm-12'>
<h6>Total recruits</h6> 
        <h4>
            {$ppl_no} people
        </h4>
</blockquote>
</article>
<div>
";
}}
?></div>
    <div class="scroll-top-wrapper ">
      <span class="scroll-top-inner">
        <i class="fa fa-2x fa-arrow-circle-up"></i>
      </span>
    </div>
</main>


<footer class="col-lg-12">
    <h4>Domus</h4>
    <a target="_blank" href="https://github.com/kanishkarj/domus"><i class="fa fa-github" aria-hidden="true"></i></a>
</footer>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>
</body>
</html>