    <?php
    include "../components/core.php";
    if(isset($_POST['add'])){
        $mysqli->query("INSERT INTO `menu`(`name`, `ingredients`, `price`, `grams`, `categorie_id`) VALUES ('{$_POST['name']}','{$_POST['ingredients']}','{$_POST['price']}','{$_POST['grams']}','{$_POST['category']}')");
    }
    header("Location: recipes.php");
    ?> 
