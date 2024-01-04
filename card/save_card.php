<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["card-number"], FILTER_VALIDATE_INT)) {
    die("Card Number is required and must be an integer");
}

if (empty($_POST["month"])) {
    die("Month is required");
}

if (empty($_POST["year"])) {
    die("Year is required");
}

if (empty($_POST["cvc"])) {
    die("CVC is required");
}

$hashedCVC = password_hash($_POST["cvc"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO card (name, carNumber, month, year, cvc )
        VALUES (?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss",
                  $_POST["name"],
                  $_POST["card-number"],
                  $_POST["month"],
                  $_POST["year"],
                  $hashedCVC
);

if ($stmt->execute()) {
    echo "Successfully Added Your Card.";
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Card already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

?>
