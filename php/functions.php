<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 9/4/17
 * Time: 5:10 AM
 */
function dateToWeek($datein,$week_no){
    $timestamp = strtotime($datein . ' + '.$week_no.' weeks ');
    $date = date("Y/m/d",$timestamp);
    $curr = time();
    $diff = floor(($timestamp - $curr)/(60*60*24)) + 1;
    return floor($diff/7) . ' weeks ' . ($diff%7) . ' days.';
}

function uploadData(){
    $name = $_POST['name'];
    $ph_no = $_POST['ph_no'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $ppl_no = $_POST['ppl_no'];
    $tags = $_POST['tags'];
    $date = date("Y/m/d");
    $title = $_POST['title'];
    $week_no = $_POST['week_no'];

    $hs = "localhost";
    $un = "guest";
    $pw = "domus";
    $db = "project";

    $conn = new mysqli($hs,$un,$pw,$db);

    $p_id = mt_rand(0,600000);

    if($conn){

        $from_path = $_FILES['img1']['tmp_name'];
        $to_path =  "images/" . $_FILES['img1']['name'];
        $res = mysqli_query($conn, "SELECT * FROM `input` WHERE p_id = {$p_id}");

        while(1){
            $res = mysqli_query($conn, "SELECT * FROM `input` WHERE p_id = {$p_id}");
            if($res->num_rows > 0){
                $p_id = mt_rand(0,600000);
            }
            else
                break;
        }
        while (1){
            if(file_exists($to_path)){
                $to_path =  "images/" . mt_rand(0,600000) . $_FILES['img1']['name'];
            }
            else{
                break;
            }
        }
        $img_list_id = mt_rand(0,6000)."%#$".mt_rand(0,600000);
        while(1) {
            $res = mysqli_query($conn, "SELECT FROM images WHERE img_id = {$img_list_id}");
            if($res){
                $img_list_id = mt_rand(0,6000)."%#$".mt_rand(0,600000);
            }else{
                break;
            }
        }
        copy($from_path,$to_path);

        for($i = 2; $_FILES['img' . $i]['tmp_name'] ;$i++){
            $nfrom_path = $_FILES['img' . $i]['tmp_name'];
            $nto_path =  "images/". $_FILES['img' . $i]['name'];
            while (1){
                if(file_exists($nto_path)){
                    $nto_path =  "images/" . mt_rand(0,600000) . $_FILES['img' . $i]['name'];
                }
                else{
                    break;
                }
            }
            move_uploaded_file($nfrom_path,$nto_path);
            $sql = "INSERT INTO images (img_id,path,descr)
                VALUES ('{$img_list_id}','{$nto_path}','{$_POST['img_desc'. $i]}')";
            $res = mysqli_query($conn,$sql);
        }
        $sql = "INSERT INTO input (p_id,name,title,descr,email,ph_no,ppl_no,week_no,tags,date_upl,img1,img1_desc,images)
                VALUES ('{$p_id}','{$name}','{$title}','{$desc}','{$email}','{$ph_no}','{$ppl_no}','{$week_no}','{$tags}','{$date}','{$to_path}','{$_POST["img_desc1"]}','{$img_list_id}')";
        $res = mysqli_query($conn,$sql);
    }

    $conn->close();
    echo '<script type="text/javascript">
        alert("The project as been added successfully ! ");
        window.open("project.php?project='.$p_id.'","_self");
    </script>'
    ;
}