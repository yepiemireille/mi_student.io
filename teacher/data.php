<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","mi_student");

$sqlQuery = "SELECT id_user,nom,total_signe FROM etud ORDER BY id_user";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>