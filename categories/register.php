<!DOCTYPE html>
<html>
<head>
<title>Request for donation</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation.js" defer></script>

	

</head>
<body>
	<h2>Request for donation</h2>
	<form action="process-register.php" method="post" id="register" novalidate>
		
	<div>
		<label for="username">Full Name</label>
		<input class="form-control" size="50" type="text" id="username" name="username" required><br>
</div>

<div>
		<label for="email">Email</label>
		<input class="form-control" size="50" type="email" id="email" name="email" required><br>
	</div>
	<div>
		<label for="Adress">Address</label>
        <input class="form-control" size="50"  type="text"  name="address" id="address"  required /> <br>
	</div>
    <div>
        <label for="nid">NID Number</label>
        <input class="form-control" size="50" type="text"  name="nid" id="nid"  required /> <br>
	</div>
	<div>
        <label for="description">Why Need Donation</label>
        <input class="form-control" size="50" type="text"  name="description" id="description"  required /> <br>
	</div>
	<div>

		<label for="details">What kind Of donation do you need and Expected donation</label>
        <input class="form-control" size="50" type="text"  name="details" id="details"  required /> <br>
		</div>
	<div>
        <label for="phone">Contact</label>
        <input class="form-control" size="50" type="text"  name="contact" id="contact"  required /> <br>
	</div> 

	
		
		
		
	<button>Submit</button>
	</form>
</body>
</html>
