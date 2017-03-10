<?php 
	include 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	 	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login | Student Information System</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="login">
			<h1>Student Information System</h1>
		    <h2>Login</h2>
		    <form method="POST" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		    	<input type="text" name="username" placeholder="Username" required="required" />
		        <input type="password" name="password" placeholder="Password" required="required" />
		        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
		    </form>    

		</div>


	</body>
</html>

<?php 
	
	$username = $password = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{

		$username = Input::cleanData($_POST["username"]);
		$password = Input::cleanData($_POST["password"]);

		if (Validate::check($username, $password) === true) 
		{	

			$x = new User;
			if ($x->login($username, $password))
			{
				Redirect::to('index.php');
			}
			
		 }
	}

?>