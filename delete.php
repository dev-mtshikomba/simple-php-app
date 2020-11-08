<?php
require_once 'inc/db.php';

if(isset($_GET['id']) &&_GET['id'] != ''):
    // delete the item
    $id = $_GET['id'];
    $sql = "DELETE FROM `corvettes` WHERE `corvettes`.`Vette_id` = {$id}";
    $result = $pdo->query($sql);
    header("Location: index.php");
else:
    // redirect to index.php
    header("Location: index.php");
endif


?>