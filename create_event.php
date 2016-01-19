<?php
include 'db.php';
error_reporting(E_ERROR | E_PARSE);

session_start();
if (!isset($_SESSION['em']) || empty($_SESSION['em'])){
	header("Location: login.html");
}

$email = $_SESSION['em'];

$event_name= $_POST['event_name'];
$event_desc= $_POST['event_desc'];
$location= $_POST['location'];
$address= $_POST['address'];
$city= $_POST['city'];
$state= $_POST['state'];
$zip= $_POST['zip'];
$date= $_POST['date'];
$category= $_POST['category'];
$capacity= $_POST['capacity'];

$sql = "INSERT INTO 280Team.events (event_name, event_desc, location, address, city, state, postal, date, category, owner, capacity)
VALUES ('$event_name', '$event_desc', '$location' , '$address', '$city', '$state', '$zip', '$date', '$category', '$email', '$capacity')";

$conn->query($sql);

header('Location: EventDetail.php?event='.$conn->insert_id);
die();


?>
<html>
<?php
echo $event_name;
echo $event_desc;
?>
</html>