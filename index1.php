<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
	<link href="includes/bootstrap.css" rel="stylesheet">
    <link href="includes/signin.css" rel="stylesheet">
    <style>
	body{
	width:40%;
	margin:200px auto;
	}
	.loginerror{
	color:red;
	}
	#signuptext{
	margin-left: 250px;
	}
	</style>
     
</head>
<body>
<form action="chklogin.php" method="post">
    <fieldset>
        <legend><h2>Login</h2></legend>
        <div class="loginerror">
         <?php if(isset($_GET['authresult'])){
          echo $_GET['authresult'];
            }
          ?>
        </div>
        <input type="text" name="memail" placeholder="Email address" size=30 class="" /><br/>
        <input type="password" name="mpassword" placeholder="Password" size=30/ ><br/>
		Login as:
		Staff&nbsp;<input type="radio" name="loginas" value="loginasstaff" checked>
		Admin&nbsp;<input type="radio" name="loginas" value="loginasadmin/"><br/>
        <input type="submit" value="Go Online..."/>
    </fieldset>
    <div id="signuptext"><a href="signup.php">Sign up</a>
    </div>
</form>
</body>
</html>