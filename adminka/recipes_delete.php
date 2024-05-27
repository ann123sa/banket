<?php
include "../components/core.php";
if(isset($_POST['delete'])){
    $mysqli->query("DELETE FROM `menu` WHERE `name` = '{$_POST['name2']}'");
}
header("Location: recipes.php" );
?>