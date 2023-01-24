<?php

session_start ();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user_table
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query(sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDo List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>



<div class="wrapper">
  <h1>Todo App</h1>
  
  <div class="container">
    <form action="process-todo.php" method="POST"> 
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Name of todo item..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="desc">Description</label>
      </div>
      <div class="col-75">
        <input type="text" id="desc" name="desctiption" placeholder="Description (optional)..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="userid">User_Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="userid" name="userid" placeholder="User Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="createdat">Created At:</label>
      </div>
      <div class="col-75">
        <input type="datetime-local" id="createdat" name="createdat">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="updatedat">Updated At:</label>
      </div>
      <div class="col-75">
        <input type="datetime-local" id="updatedat" name="updatedat">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="notstarted">NotStarted</option>
          <option value="ongoing">OnGoing</option>
          <option value="completed">Completed</option>
        </select>
      </div>
    </div>
      <br>
    <div class="row">
      <input type="submit" value="Create">
    </div>
    </form>

    <?php if (isset($user)): ?>

      <p> Hello <?= htmlspecialchars($user["email"]) ?></p>

      <?php else: ?>

        <p><a href="logout.php">Logout</a></p>
        
      <?php endif; ?>

  </div>
</div>
</body>
</html>