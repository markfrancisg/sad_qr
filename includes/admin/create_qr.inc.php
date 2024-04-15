<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["address"]);
    $wheel = htmlspecialchars(intval($_POST["wheel"]));
    $plate_number = htmlspecialchars($_POST["plate_number"]);
    $vehicle_type = htmlspecialchars($_POST["vehicle_type"]);

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        require_once '../Admin_contr.inc.php';
        require_once '../config.session.inc.php';

        $errors = [];
        // if (four_input_empty($email, $address, $wheel, $vehicle_type)) {
        //     $errors["empty_input"] = "Fill in all fields!";
        // }

        if ($errors) {
            $_SESSION["errors_create_qr"] = $errors;

            //lagay na lang pag finishing na change also the variables
            // $signupData = [
            //     "first_name" => $first_name,
            //     "last_name" => $last_name,
            //     "role_description" => $role_description,
            //     "email" => $email,
            //     "number" => $number,
            // ];

            // $_SESSION["create_account_data"] = $signupData;

            header("Location: ../../public/view/admin/qr_code.php");
            die();
        }

        // //add other validations
        // $generated_qr = generate_qr();

        $result = get_homeowner($pdo, $email);


        $ho_id = $result["ho_id"];

        // var_dump($generated_qr);


        insert_qr($pdo, $wheel, $vehicle_type, $plate_number, $ho_id);
        header("Location: ../../public/view/admin/qr_code.php?qr_creation=success");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/qr_code.php");
    die();
}
