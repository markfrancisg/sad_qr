<?php

require_once 'header.php';
require_once '../../../includes/config.session.inc.php'

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1><?php echo $_SESSION['qr_id']; ?></h1>
    <h1><?php echo $_SESSION['wheel']; ?></h1>
    <h1><?php echo $_SESSION['vehicle_type']; ?></h1>
    <h1><?php echo $_SESSION['plate_number']; ?></h1>
    <h1><?php echo $_SESSION['registered']; ?></h1>
    <h1><?php echo $_SESSION['ho_id']; ?></h1>

</div>


<?php
require_once 'footer.php';

?>