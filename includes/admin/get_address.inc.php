<?php

if (isset($_GET['email']) && !empty($_GET['email'])) {
    $email = $_GET['email'];

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        $address = get_homeowner_address($pdo, $email);

        if ($address) {
            echo "Block " . $address['block'] . ", Lot " . $address['lot'] . ", " . $address['street'] . " Street";
        } else {
            echo 'NOT_FOUND'; // Return a specific string if no address is found
        }
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    echo ''; // No email provided or email is empty
}
?>