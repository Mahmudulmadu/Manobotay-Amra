<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
			 if($user['user_type'] == 'admin'){

			$_SESSION['admin_name'] = $user['name'];
			header('location:admin_login.php');

			
           // header("Location: index.php");
            exit;
			}
			 else if($user['user_type'] == 'user'){

			$_SESSION['user_name'] = $user['name'];
			header('location:user_login.php');

			
           
            exit;
			}
			else if($user['user_type'] == 'volunteer'){

			$_SESSION['volunteer_name'] = $user['name'];
			header('location: volenteer_login.php');

			
           
            exit;
			}
        }
    }
    
    $is_invalid = true;

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
		<p>or <a href="signup.html"> create an account</a>.</p>
    </form>
    
</body>
</html>
