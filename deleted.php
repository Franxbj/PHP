<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO todo_table (name, description, user_id, status )
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                    $_POST["name"],
                    $_POST["description"],
                    $_POST["user_id"],
                    $_POST["status"]);


if ($stmt->execute()) {

    header("Location: todo-success.html");
    exit;

} else {

    echo "ERROR: " .$sql. "<br>" . $conn->error;
}
    $mysqli->close();



    <?php 
include 'database.php' ; // establish database connection  

$name= $_POST['name']; //this stores the user inputs
$description= $_POST['description'];
$user_id= $_POST['user_id'];
$status= $_POST['status'];


if (empty($_POST['name'])) {
    echo "<h1>Please enter Name of todo</h1>";
} 
    else {
$sql="insert into todo_table (name, description, user_id, status)
values('$name', '$description', '$user_id', '$status')";

if($mysqli->query($sql) === TRUE) {
    echo "Thank you for creating a todo <br>";
    echo  "<a href='signup.html'> Go back to Home </a>";
}
else
{
    echo "ERROR: " .$sql. "<br>" . $mysqli->error;
}
$mysqli->close();

}

?>