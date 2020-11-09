<?php
require_once 'inc/db.php';
require_once 'inc/header.php';

if (isset($_POST['create']) && $_POST['create'] != null) :
    $sql = "INSERT INTO `corvettes` (`Body_Style`, `Miles`, `Year`, `State`) VALUES ('{$_POST['Body_Style']}', '{$_POST['Miles']}', '{$_POST['Year']}', '1')";
    $result = $pdo->query($sql);
    header("Location: index.php");
endif;

function get_states()
{
    global $pdo;
    $sql = "SELECT * FROM `states`";

    return $pdo->query($sql);
}
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
        <?php $result = get_states(); while ($row = $result->fetch()) : ?>
            <option value="<?php echo $row['State_id'] ?>"> <?php echo $row['State'] ?> </option>
        <?php endwhile; ?>
    </select>
    <br>
    <br>
    <button type="submit">CREATE RECORD</button>
</form>

<?php
require_once 'inc/footer.php';
?>