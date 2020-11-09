<?php
require_once 'inc/db.php';
require_once 'inc/header.php';

function get_inventory_by_equip_id($equip_id, $sort_by= "Body_Style"){
    global $pdo;
    $sql = "SELECT * FROM `corvettes` JOIN `corvettes_equipment` on `corvettes_equipment`.`Vette_id` = `corvettes`.`Vette_id` where `corvettes_equipment`.`Equip`={$equip_id} order by `{$sort_by}`";
    return $pdo->query($sql);
}

// function get_equipments(){
//     global $pdo;
//     $sql = "SELECT * FROM `equipment`";
//     return $pdo->query($sql);
// }
?>

<a style="display: inline;" href="create.php"> CREATE NEW</a>
    <|>
<form style="display: inline;" action="equip_inventory.php" method="get">
    Sort by:
    <select name="sort_by">

        <option value="Miles">Miles</option>
        <option value="Year">Year</option>
        <option value="State">State</option>

    </select>

    <button type="submit">Sort</button>
</form>
<|>
<form style="display: inline;" action="equip_inventory.php" method="get">
    Equipments:
    <select name="equip_id">

        <?php $result = get_equipments(); while ($row = $result->fetch()) : ?>
            <option value="<?php echo $row['Equip_id'] ?>"><?php echo $row['Equip'] ?></option>
        <?php endwhile ?>
        
        <input type="hidden" name="sort_by" value="<?php echo $_GET['sort_by'] ?>">
    </select>

    <button type="submit">Query</button>
</form>
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
    <?php
        if (isset($_GET['sort_by']) && $_GET['sort_by'] != null && isset($_GET['equip_id']) && $_GET['equip_id'] != null) :
            $result = get_inventory_by_equip_id($equip_id = $_GET['equip_id'], $sort_by = $_GET['sort_by']);
        elseif (isset($_GET['equip_id']) && $_GET['equip_id'] != null) :
            $result = get_inventory_by_equip_id($equip_id = $_GET['equip_id']);
        else :
            $result = get_inventory_by_equip_id($equip_id = 1);
        endif;

        while ($row = $result->fetch()) : ?>
            <tr>
                <td><?php echo $row['Vette_id'] ?></td>
                <td><?php echo $row['Body_Style'] ?></td>
                <td><?php echo $row['Miles'] ?></td>
                <td><?php echo $row['Year'] ?></td>
                <td><?php echo get_state($row['State'])['State'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['Vette_id'] ?>">UPDATE</a>
                    <?php echo $row['Vette_id'] ?>">
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row['Vette_id'] ?>">DELETE</a>
                    <?php echo $row['Vette_id'] ?>">
                </td>
            </tr>
    <?php endwhile ?>
</table>

<a href="index.php"><< HOME </a> 
<?php
require_once 'inc/footer.php';
?>