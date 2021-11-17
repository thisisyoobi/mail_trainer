<?php
$servername = "localhost";
$username = "ksj";
$password = "qhdks!321";
$dbname = "WebProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM import_company";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
<script>
    location.replace("./infocon.php");
</script>