<?php
function get_states()
{
    global $pdo;
    $sql = "SELECT * FROM `states`";

    return $pdo->query($sql);
}

function get_state($state_id)
{
    global $pdo;
    $sql = "select * from states where State_id={$state_id}";
    $result = $pdo->query($sql);
    return $result->fetch();
}

function get_equipments()
{
    global $pdo;
    $sql = "SELECT * FROM `equipment`";
    return $pdo->query($sql);
}

?>