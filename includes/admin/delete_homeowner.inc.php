<?php

// if (isset($_POST["checkbox_value"])) {
//     $query = "DELETE FROM homeowners WHERE ho_id = :ho_id";
//     $statement = $pdo->prepare($query);

//     foreach ($_POST["checkbox_value"] as $ho_id) {
//         $statement->execute([':ho_id' => $ho_id]);
//     }

//     // Return a success message
//     echo "Selected records have been deleted successfully.";
// } else {
//     echo "No records selected for deletion.";
// }


if (isset($_POST["checkbox_value"])) {

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';

        foreach ($_POST["checkbox_value"] as $ho_id) {
            delete_homeowner($pdo, $ho_id);
        }
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/homeowner_list.php");
    die();
}
