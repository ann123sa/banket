<?php
include "components/core.php";
if(isset($_POST['bron'])){
    $mysqli->query("INSERT INTO `bronirovanie`(`name`, `phone`, `data`) VALUES ('{$_POST['name']}','{$_POST['phone']}','{$_POST['date']}')");
}
header('Location: /' );
?>