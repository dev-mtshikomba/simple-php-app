<?php
require_once 'inc/db.php';
require_once 'inc/header.php';

if(isset($_GET['id'])):
    // get the model and fill the form with all the data
elseif(isset($_POST['id'])):
    // update the database and redirect to index.php 
else:
    // just redirect to index.php
endif

?>

<form action="edit.php?id=<?php $id ?>" method="post">
    

</form>

<?php
require_once 'inc/footer.php';
?>