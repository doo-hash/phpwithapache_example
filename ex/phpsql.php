/* PDO Class to connect to the database*/
/* Make sure you add the connect file which has the variable $connect */
$name 	  = $_POST["name"];
$password = $_POST["password"];
$stmt = $connect->prepare("INSERT INTO tablename(name, password) VALUES(:name, :pass)");
$stmt->execute(array(
  "name" => $name,
  "pass" => $password
));
/* 
  Check how to connect to the db using PDO 
  Type in google search: php how to connect to db using PDO
  you will find the answer for this question posted by me
*/



<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "demo");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
$last_name = $mysqli->real_escape_string($_REQUEST['last_name']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>



// Multiple rows:
$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['name'];
}

//Single row:
$sql = "SELECT user FROM users WHERE id=?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data  

// Update/delete from
$sql = "UPDATE users SET rank=?, status=? WHERE id=?"; // SQL with parameters
$sql = "DELETE FROM users WHERE id=?";
$stmt = $conn->prepare($sql);

$stmt->bind_param('sss', $rank, $status, $id);
$stmt->execute();




stmt = $mysqli->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
$stmt->bind_param("si", $_POST['name'], $_POST['age']);
$stmt->execute();
$stmt->close();
Copy
Source:websitebeaver.com
2
mysqli_connect using prepare statementSQL By Arrogant Anaconda on May 20 2020
$stmt = $mysqli->prepare("DELETE FROM myTable WHERE id = ?");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->close();
Copy
Source:websitebeaver.com
2
mysqli_connect using prepare statementSQL By Arrogant Anaconda on May 20 2020
$stmt = $mysqli->prepare("UPDATE myTable SET name = ? WHERE id = ?");
$stmt->bind_param("si", $_POST['name'], $_SESSION['id']);
$stmt->execute();
$stmt->close();
Copy