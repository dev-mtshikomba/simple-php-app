<?php
require_once 'inc/db.php';
require_once 'inc/header.php';

if (isset($_GET['id']) && $_GET['id'] != '') :
    // get the model and fill the form with all the data
    $id = $_GET['id'];
    $sql = "select * from corvettes where Vette_id={$id}";
    $result = $pdo->query($sql);

    $data = $result->fetch();

    $id = $data['Vette_id'];
// var_dump($data['Vette_id']);

elseif (isset($_POST['update'])) :
    // update the database and redirect to carsdata.php 
    $id = $_POST['update'];
    $sql = "update corvettes set `Body_Style`='{$_POST['Body_Style']}', `Miles`='{$_POST['Miles']}', `Year`='{$_POST['Year']}' where Vette_id={$id}";
    $result = $pdo->query($sql);

    // var_dump($result);
    header("Location: edit.php?id={$id}");
else :
    // just redirect to carsdata.php
    header("Location: carsdata.php");
endif

?>

<form action="edit.php" method="post">
    <input type="hidden" name="update" value="<?php echo $id ?>">
    Body Style: <input type="input" name="Body_Style" value="<?php echo $data['Body_Style'] ?>">
    <br>
    <br>
    Miles: <input type="input" name="Miles" value="<?php echo $data['Miles'] ?>">
    <br>
    <br>
    Year: <input type="input" name="Year" value="<?php echo $data['Year'] ?>">
    <br>
    <br>
    State:
    <select name="State">
        <?php $result = get_states();
        while ($row = $result->fetch()) : ?>
            <option <?php $data['State'] == $row['State'] ? 'selected' : '' ?> value="<?php echo $row['State_id'] ?>"> <?php echo $row['State'] ?> </option>
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
    <button type="submit">UPDATE RECORD</button>
</form>
<a href="carsdata.php">
    << HOME </a> <?php
                    require_once 'inc/footer.php';
                    ?>