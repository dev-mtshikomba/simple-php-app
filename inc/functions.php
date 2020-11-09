<?php
function get_states()
{
    global $pdo;
    $sql = "SELECT * FROM `states`";

    return $pdo->query($sql);
}

function get_equipments()
{
    global $pdo;
    $sql = "SELECT * FROM `equipment`";
    return $pdo->query($sql);
}

?>