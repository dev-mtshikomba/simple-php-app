<?php
include_once 'inc/db.php';
include_once 'inc/header.php';

$sql = "select * from corvettes order by Body_Style";
$result = $pdo->query($sql);

function get_state($state_id)
{
    global $pdo;
    $sql = "select * from states where State_id={$state_id}";
    $result = $pdo->query($sql);
    return $result->fetch();
}

?>

<a href="create.php"> CREATE NEW |</a>
<!-- <form method="get" action="index.php" href=""><input type="text" value="SORT"></form> -->
<table style="width:50%">
    <tr>
        <th>#id</th>
        <th>Body Style</th>
        <th>Miles</th>
        <th>Year</th>
        <th>State</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php while ($row = $result->fetch()) : ?>
        <tr>
            <td><?php echo $row['Vette_id'] ?></td>
            <td><?php echo $row['Body_Style'] ?></td>
            <td><?php echo $row['Miles'] ?></td>
            <td><?php echo $row['Year'] ?></td>
            <td><?php echo get_state($row['State'])['State'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['Vette_id'] ?>">UPDATE</a>
                <!-- <form method="get" action="edit.php?id=<?php echo $row['Vette_id'] ?>">
                    <button type="submit">UPDATE</button>
                </form> -->
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['Vette_id'] ?>">DELETE</a>
                <!-- <form method="get" action="delete.php?id=<?php echo $row['Vette_id'] ?>">
                    <button type="submit">DELETE</button>
                </form> -->
            </td>
        </tr>
    <?php endwhile ?>
</table>


<?php
include_once 'inc/footer.php'
?>