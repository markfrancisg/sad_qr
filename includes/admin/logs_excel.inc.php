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
            $results = get_record_logs_weekly($pdo);
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
                <th>Plate Number</th>
                <th>Vehicle Information</th>
                <th>Entry</th>
                <th>Exit</th>
            </tr>';

        // Output data rows
        foreach ($results as $row) {
            echo '<tr>
                    <td>' . $row['log_name'] . '</td>
                    <td>' . $row['log_address'] . '</td>
                    <td>' . $row['log_plate_number'] . '</td>
                    <td>' . $row['log_vehicle'] . '</td>
                    <td>' . $row['entry_log'] . '</td>
                    <td>' . $row['exit_log'] . '</td>
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
