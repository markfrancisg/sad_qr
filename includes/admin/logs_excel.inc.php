<?php
if (isset($_POST['export_excel']) && isset($_GET['type']) && !empty(($_GET['type']))) {
    try {
        require_once '../dbh.inc.php';
        require_once '../RecordLogs_model.inc.php';

        $type = $_GET['type'];

        if ($type === "all") {
            $results = get_record_logs($pdo);
        } else if ($type === "daily") {
            $results = get_record_logs_daily($pdo);
        } else if ($type === "weekly") {
            $results = get_record_logs($pdo);
        } else {
            header("Location: ../../public/view/admin/logs.php");
            die();
        }

        // Set headers to indicate that the response is an Excel file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $type . '.logs.xls"');
        // Start output buffering to capture HTML content
        ob_start();

        // Output HTML table
        echo '<table class="table" bordered="1">  
            <tr>  
                <th>Name</th>
                <th>Address</th>
                <th>Vehicle Type</th>
                <th>Plate Number</th>
                <th>Station</th>
                <th>Entry / Exit</th>
                <th>Date and Time</th>
            </tr>';

        // Output data rows
        foreach ($results as $row) {
            echo '<tr>
                    <td>' . $row['first_name'] . " " . $row['last_name'] . '</td>
                    <td>' . "Block " . $row['block'] . ", Lot " . $row['lot'] . ", " . $row['street'] . " Street" . '</td>
                    <td>' . $row['vehicle_type'] . '</td>
                    <td>' . $row['plate_number'] . '</td>
                    <td>' . $row['station'] . '</td>
                    <td>' . $row['entry_exit'] . '</td>
                    <td>' . $row['date'] . " | " . $row['time'] . '</td>
                </tr>';
        }

        // Close HTML table
        echo '</table>';

        // Get the captured HTML content
        $output = ob_get_clean();

        // Output HTML content
        echo $output;

        // Terminate the script after exporting
        exit;
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/logs.php");
    die();
}
