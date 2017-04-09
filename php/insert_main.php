<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 8/4/17
 * Time: 8:58 PM
 */
$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";

$img;$title;$desc;$date;$name;$img_desc;$p_id;

$conn = new mysqli($hs,$un,$pw,$db);
$query = "SELECT * FROM `input`";
$res = mysqli_query($conn,$query);
if($conn){
    foreach ($res as $row){
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
        $small = substr($desc, 0, 500);
        $desc = $small;
        echo "
                <div class='col-lg-4 col-sm-12' style='padding-left: 0.3em;padding-right: 0.3em;padding-top: 1em' xmlns=\"http://www.w3.org/1999/html\">
                <div class='cards'>
                    <div>
                    <div id='img-cont'>
                        <img src='php/{$img}' alt='{$img_desc}'>
                    </div>
                    
                    <h3>{$title}</h3>
                    <h4>- {$name}</h4>
                    <p style='word-wrap: normal;height: auto;'>
                        {$desc}
                    
                    </p>
                    </div>
                    <a href='php/project.php?project={$p_id}'>read more...</a>
                
                </div>
                </div>
        ";
    }
}
