<?php
    include("php/dbconnect.php");

    $invalidLoginError = '';
    $pendingAccountError = '';

    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, trim($_POST['username']));
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if($username == '' || $password == '') {
            $invalidLoginError = '<div class="error">All fields are required</div>';
        }

        $sql = "SELECT * FROM members WHERE members_id='".$username."' AND password = '".$password."'";
        $q = $conn->query($sql);

if ($q->num_rows == 1) {
    $res = $q->fetch_assoc();
    if ($res['status'] == 'Pending') {
        $pendingAccountError = '<div class="warning-msg">Your account is pending approval. Please pay first month funding to activate your account.<br><a href="funding.php">Funding Methods</a> </div>';
        // stop session if account status is pending
        session_unset();
        session_destroy();
    } else if ($res['status'] == 'Active') {
        $_SESSION['rainbow_uid'] = $res['id'];
        echo '<script type="text/javascript">window.location="index.php"; </script>';
    }
} else {
    $invalidLoginError = '<div class="error-msg">You entered Invalid Username or Password</div>';
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="login/loginstyle.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
    <h1>Member Login</h1>
    <form action="login.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
        <input type="text" class="form-control" placeholder="members id"   name="username" required="" " />
        <script>
            $(":input").inputmask();
        </script>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <?php echo $invalidLoginError; ?>
        <?php echo $pendingAccountError; ?>
        <input type="submit" name="login" value="Login">
    </form>
</div>
	</body>
</html>
