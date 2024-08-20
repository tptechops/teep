<?php 
$servername = "localhost";
$username = "root";
$password = "Admin@4321";
$dbname = "teepstaging";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//echo "Hi";
session_start();

$user_ID = $_POST['uid'];
$_SESSION["user_login"] = '$user_ID';
$event= $_POST['eventid'];
$evname= $_POST['eventname'];
$sql = "INSERT INTO `wp_connects`(`ID`, `event-id`, `evv-name`) VALUES ($user_ID,$event,'$evname')";

if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
//exit;
header("Location: https://18.220.246.60/teep/students-dashboard/");
} 
else {
echo "Error: " . $sql . "<br>" . $conn->error;
exit;
}

						
?>