<?php

if (empty($_POST["username"])) {
    die("Name is required");
}


if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (empty($_POST["address"])) {
    die("Address is required");
}

if (empty($_POST["nid"])) {
    die("NID num is required");
}

if (empty($_POST["description"])) {
    die("Description is required");
}

if (empty($_POST["details"])) {
    die("Details is required");
}

if (empty($_POST["contact"])) {
    die("Contact is required");
}


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO need_donation (name, email, address, nid, description, details, contact)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $_POST["username"],
                  $_POST["email"],
                  $_POST["address"],
                  $_POST["nid"],
                  $_POST["description"],
                  $_POST["details"],
                  $_POST["contact"]
                                );
                  

?>






