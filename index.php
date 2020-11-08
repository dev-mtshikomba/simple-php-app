<?php
include_once 'inc/db.php';
include_once 'inc/header.php';
?>


<table style="width:100%">
    <tr>
        <th>#id</th>
        <th>Body Style</th>
        <th>Miles</th>
        <th>Year</th>
        <th>State</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Sleek</td>
        <td>50</td>
        <td>2000</td>
        <td>MI</td>
        <td>
            <form method="get" action="edit.php?id=<?php echo 1  ?>">
                <button type="submit">UPDATE</button>
            </form>
        </td>
        <td>
            <form method="get" action="delete.php?id=<?php echo 1 ?>">
                <button type="submit">DELETE</button>
            </form>
        </td>
    </tr>
</table>


<?php
include_once 'inc/footer.php'
?>