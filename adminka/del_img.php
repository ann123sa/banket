<?php
include "../components/core.php";
if(isset($_POST['del_img'])){
    $galery = $mysqli->query("DELETE FROM `gallery` WHERE `id` = '{$_POST['id']}'");
    }   
header("Location: ".$_SERVER['HTTP_REFERER']);
?>