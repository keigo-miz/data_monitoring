<?php

$servername = 'hallddb.jlab.org';
$username   = 'monbrowser';
$password   = '';
$dbname     = 'BrowserFamily';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
mysqli_select_db($conn, $dbname);
$sql = 'SELECT * FROM Runs WHERE Version_ID=' . $_GET["ID"] . ' ORDER BY RunNumber';
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'ID' => $row['ID'],
        'RunNumber' => $row['RunNumber'],
        'Version_ID' => $row['Version_ID']
    );
}

$conn->close();

echo json_encode($data);

?>