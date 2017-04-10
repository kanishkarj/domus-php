<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 9/4/17
 * Time: 7:36 PM
 */

$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";


$q =$_GET['q']; //gets the search query

$img;$title;$desc;$date;$name;$img_desc;$p_id;

$conn = new mysqli($hs,$un,$pw,$db);//initiates the connection to the database
$query = "SELECT * FROM `input` WHERE (tags LIKE '%{$q}%') OR (title LIKE '%{$q}%') OR (descr LIKE '%{$q}%')";
$res = mysqli_query($conn,$query);//queries the database
if($conn){
    if(mysqli_num_rows($res)==0)
        echo "<p>No results found.</p>";
    else
    foreach ($res as $row){
        //assigns values to the variables
        foreach ($row as $key => $value) {
            if($key == 'title')
                $title = $value;
            if($key == 'img1_desc')
                $img_desc = $value;
            if($key == 'name')
                $name = $value;
            if($key == 'img1')
                $img = $value;
            if($key == 'descr')
                $desc = $value;
            if($key == 'date_upl')
                $date = $value;
            if($key == 'p_id')
                $p_id = $value;
        }
        //strips the description to a length 500 to avoind too much content on the page
        $small = substr($desc, 0, 500);
        $desc = $small;

       //flushes information of each project into cards
        echo "
                <div id='card-container' class='col-lg-4 col-sm-12' xmlns=\"http://www.w3.org/1999/html\">
                <div class='cards'>
                    
                    <a href='php/project.php?project={$p_id}'>
                    <div>
                    <div id='img-cont'>
                        <img src='php/{$img}' alt='{$img_desc}'>
                    </div>
                    <article id='text-cont'>
                    <h3>{$title}</h3>
                    <p style='word-wrap: normal;height: auto;'>
                        {$desc}
                
                    </p>
                    </article>
                    </div>
                 
                    </a>
                </div>
                </div>
        ";
    }
}
