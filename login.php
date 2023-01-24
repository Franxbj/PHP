<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $mysqli = require __DIR__ . "/database.php";

        $sql = sprintf( "SELECT * FROM user_table
                WHERE email = '%s'",
                $mysqli->real_escape_string($_POST["email"]));

        
        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user) {

            if (password_verify($_POST["password"], $user["password_hash"])) {

                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("Location: todo.php");
                exit;
            }
        }

        $is_invalid = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Page</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://classless.de/classless.css">
</head>
<body>
    
        <h1>Login</h1>

       

        <form method="POST">
            <label for="email"> email</label>
            <input type = "email" name="email" id="email"
                            value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

            <label for="password"> password</label>
            <input type = "password" name="password" id="password">

            <button>Login</button>

        </form>

        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>
</body>
</html>
