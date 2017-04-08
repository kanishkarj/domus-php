<?php
/**
 * Created by PhpStorm.
 * User: kanishkarj
 * Date: 8/4/17
 * Time: 3:10 PM
 */
$name = $_POST['name'];
$ph_no = $_POST['ph_no'];
$email = $_POST['email'];
$desc = $_POST['desc'];
$ppl_no = $_POST['ppl_no'];
$tags = $_POST['tags'];
$date = date("Y/m/d");
$title = $_POST['title'];

$hs = "localhost";
$un = "guest";
$pw = "domus";
$db = "project";

$conn = new mysqli($hs,$un,$pw,$db);

 if($conn){

     $from_path = $_FILES['img1']['tmp_name'];
     echo $from_path;
     $to_path =  "images/" . $_FILES['img1']['name'];
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
         echo "HEllo <br>";
         $nfrom_path = $_FILES['img' . $i]['tmp_name'];
         $nto_path =  "images/" . $_FILES['img' . $i]['name'];
         move_uploaded_file($nfrom_path,$nto_path);
         while (1){
             if(file_exists($nto_path)){
                 $nto_path =  "images/" . mt_rand(0,600000) . $_FILES['img' . $i]['name'];
             }
             else{
                 break;
             }
         }
         $sql = "INSERT INTO images (img_id,path,descr)
                VALUES ('{$img_list_id}','{$nto_path}','{$_POST['img_desc'. $i]}')";
         echo $sql;
         $res = mysqli_query($conn,$sql);
         echo $res;
     }
     $sql = "INSERT INTO input (name,title,descr,email,ph_no,ppl_no,tags,date_upl,img1,img1_desc,images)
                VALUES ('{$name}','{$title}','{$desc}','{$email}','{$ph_no}','{$ppl_no}','{$tags}','{$date}','{$to_path}','{$_POST["img_desc1"]}','{$img_list_id}')";
     echo $sql;
     //$res = mysqli_query($conn,$sql);
     //echo $res;
 }

 $conn->close();