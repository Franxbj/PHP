


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


    