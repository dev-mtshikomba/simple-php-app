<?php
require_once 'inc/db.php';

if(isset($_GET['id']) &&_GET['id'] != ''):
    // delete the item
    $id = $_GET['id'];
    $sql = "DELETE FROM `corvettes` WHERE `corvettes`.`Vette_id` = {$id}";
    $result = $pdo->query($sql);
    header("Location: carsdata.php");
else:
    // redirect to carsdata.php
    header("Location: carsdata.php");
endif


?>