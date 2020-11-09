<?php
require_once 'inc/db.php';
require_once 'inc/header.php';

if (isset($_POST['create']) && $_POST['create'] != null) :
    $sql = "INSERT INTO `corvettes` (`Body_Style`, `Miles`, `Year`, `State`) VALUES ('{$_POST['Body_Style']}', '{$_POST['Miles']}', '{$_POST['Year']}', '1')";
    $result = $pdo->query($sql);
    header("Location: carsdata.php");
endif;
?>

<form action="create.php" method="post">
    <input type="hidden" name="create" value="1">
    Body Style: <input type="input" name="Body_Style">
    <br>
    <br>
    Miles: <input type="input" name="Miles">
    <br>
    <br>
    Year: <input type="input" name="Year">
    <br>
    <br>
    State:
    <select name="State">
        <?php $result = get_states();
        while ($row = $result->fetch()) : ?>
            <option value="<?php echo $row['State_id'] ?>"> <?php echo $row['State'] ?> </option>
        <?php endwhile; ?>
    </select>
    <br>
    <br>
    Equipment:
    <?php $result = get_equipments();
    while ($row = $result->fetch()) : ?>
        <input type="checkbox" name="Equip_id" id="<?php echo $row["Equip_id"] ?>"> <?php echo $row["Equip"] ?>
    <?php endwhile; ?>
    <br>
    <br>
    <button type="submit">CREATE RECORD</button>
    <br>
    <br>
    <a href="carsdata.php"><< HOME</a>
</form>

<?php
require_once 'inc/footer.php';
?>