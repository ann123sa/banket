<?php
include "../components/core.php";

if(isset($_POST['add_img'])){
            $img=$_FILES['photo'];
            if("image" == substr($img['type'], 0, 5)){
            $nameimg = uniqid().".".substr($img['type'], 6);
            move_uploaded_file($img['tmp_name'], "../img/".$nameimg);
        
            $galery = $mysqli->query("INSERT INTO `gallery`(`image`) VALUES ('$nameimg')");
            }   
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
?>