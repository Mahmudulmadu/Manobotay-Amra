<?php
if (!empty($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $user_message = $_POST["user_message"];

    // Create a connection
    $conn = mysqli_connect('localhost', 'root', '', 'tei');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO tbl_contact (fullname, email, user_message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $user_message);

    // Execute the statement
    if ($stmt->execute()) {
        $insert_id = $stmt->insert_id;
        if (!empty($insert_id)) {
            $message = "Your Message sent Successfully.";
        } else {
            $message = "Error: Failed to get the inserted ID.";
        }
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html>

<head>
<title>Contact form</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<form name="frmContact" method="post" action="">

<div class="aler_message"><?php if(isset($message)) { echo $message; } ?></div>

<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td colspan="2">Contact Form</td>
</tr>
<tr class="tablerow">
<td>Full Name<br/>  <input type="text" class="text_input" autofocus="autofocus" name="fullname"></td>
<td>Email<br/> <input type="text" class="text_input" autofocus="autofocus" name="email"></td>
</tr>
<tr class="tablerow">
<td colspan="2">Message<br/><textarea name="user_message" class="text_input" autofocus="autofocus" cols="60" rows="6"></textarea></td>
</tr>
<tr class="tableheader">
<td colspan="2"><input type="submit" class="btn_submit" name="submit" value="Submit"></td>
</tr>
</table>

</form>

<table style="border:2px red solid" class="table_data"  cellpadding="5">
     <form method="get" action="ChatBot/index.php">
	<td colspan="2"><input type="submit" class="btn_submit" name="submit" value="Chat Now"></td>
	</form>
<?php
$conn = mysqli_connect("localhost", "root", "", "tei");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM tbl_contact ORDER BY tbl_contact_id DESC") or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($result)) {
    $id = $row['tbl_contact_id'];
    // Process each row
}

// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>
	
<?php  ?>
</table>

</body>

</html>