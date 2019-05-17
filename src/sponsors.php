<?php

  include "php/dbconfig.php";

  $sponsorsStatement = "SELECT * FROM sponsors";
  $sponsorsResult = mysqli_query($con, $sponsorsStatement);

?>

<?php $title = "Sponsors"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
  
</div>
<?php include 'components/foot.php' ?>