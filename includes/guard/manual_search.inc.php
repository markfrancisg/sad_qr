<?php
$output = '';

try {
	require_once '../dbh.inc.php';
	require_once "../QrCodeList_model.inc.php";


	if (isset($_POST["query"])) {
		$search = $_POST["query"];

		$result = manual_search($pdo, $search);
	} else {
		$result = get_manual_search_table($pdo);
	}

	if ($result) {
		$output = '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th class="text-center text-light bg-primary">Name</th>
							<th class="text-center text-light bg-primary">Vehicle Type</th>
							<th class="text-center text-light bg-primary">Plate Number</th>
							<th class="text-center text-light bg-primary">Address</th>
							<th class="text-center text-light bg-primary">Status</th>
						</tr>';
		foreach ($result as $row) {
			$output .= '
			<tr>
				<td class="text-center">' . htmlspecialchars($row["first_name"] . " " . htmlspecialchars($row["last_name"])) . '</td>
				<td class="text-center">' . htmlspecialchars($row["vehicle_type"]) . '</td>
				<td class="text-center">' . htmlspecialchars($row["plate_number"]) . '</td>
				<td class="text-center">' . "Block " . htmlspecialchars($row["block"]) . ", Lot " . htmlspecialchars($row["lot"]) . ", Street " . htmlspecialchars($row["street"]) . '</td>
				<td class="text-center">' . ($row["registered"] == 1 ? "Registered" : "Not Registered") . '</td>
			</tr>';
		}
		$output .= '</table></div>';
		echo $output;
	} else {
		echo '<h4 class="text-dark text-center mt-3">No Data Available</h4>';
	}
} catch (PDOException $e) {
	die("Query failed " . $e->getMessage());
}
