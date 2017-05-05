<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 11/4/17
 * Time: 1:23 AM
 */

$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";

include('functions.php');

$q =$_GET['q']; //gets the search query

$img;$title;$desc;$date;$name;$img_desc;$p_id;$week;
$conn = new mysqli($hs,$un,$pw,$db);//initiates the connection to the database
$query = "SELECT * FROM `input`  ORDER BY " .$q;
$res = mysqli_query($conn,$query);//queries the database
if($conn){
    if(mysqli_num_rows($res)==0)
        echo "<p>No results found.</p>";
    else
        foreach ($res as $row){
            //assigns values to the variables
            $title = $row['title'];
            $img_desc = $row['img1_desc'];
            $img = $row['img1'];
            $desc = $row['descr'];
            $date = $row['date_upl'];
            $p_id = $row['p_id'];
            $week = $row['week_no'];

            //strips the description to a length 500 to avoid too much content on the page
            $small = explode('\n',$desc);
            $desc = $small[0];

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
                        <article id='card-footer' >
                        <p>".recr_check($date,$week)."</p>
                    </article>
                    </a>
                </div>
                </div>
        ";
        }
}
?>