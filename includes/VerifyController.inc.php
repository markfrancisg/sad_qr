<?php

declare(strict_types=1);

if (isset($_GET['email']) && !empty($_GET['email'])) {
    try {
        require_once 'dbh.inc.php';
        require_once 'User_model.inc.php';
        require_once 'config.session.inc.php';

        $email = $_GET['email'];
        $result = get_user($pdo, $email);

        //If email is not found
        if (!$result) {
            header("Location: ../login.php");
            die();
        }

        //if email is already verified
        if ($result['verification_status'] === 1) {
            $_SESSION["unverified_account"] = "Account is already verified!";
            header("Location: ../login.php");
            die();
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}
