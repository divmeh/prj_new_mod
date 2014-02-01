<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="includes/signin.css">
    <link rel="stylesheet" href="includes/bootstrap.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="jscript.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <style>
	<style>
	body{
	width:40%;
	margin:300px auto;
	}
    .container{
     width: 27%;

     margin-right: 20%;
     margin-top: 0%;
     box-shadow: 2px 5px 10px 05px rgba(0, 0, 0, 0.29);
    }
	.loginerror{
	color:red;
    margin-left: 18%;
	}
	#signup{
	margin-left: 0px;
    margin-top: 50px;
	}
    .loginas{
    margin-left: 60px;
    margin-top: 10px;
    }
    h2{
    margin-left: 30%;
    }
    button{
     margin-top:70%;
     margin-left:60%;
    }
    #loptions{
    }
    </style>
</head>
<body>
<div class="container">
    <form class="form-signin" role="form" method="post" action="chklogin.php">
	    <div class="loginerror">
         <?php if(isset($_GET['authresult'])){
          echo $_GET['authresult'];
            }
          ?>
        </div>
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" class="form-control" placeholder="Email address" required autofocus name="memail" autocomplete="off" value="<?php if(isset($_COOKIE['rememberme'])){ echo $_COOKIE['email']; } ?>" />
        <input type="password" class="form-control" placeholder="Password" required name="mpassword" autocomplete="off" />
        <label class="checkbox">
            <input type="checkbox" name="remember" value="1" />Remember me  <br/><br/>

        </label>
        <button class="btn btn-primary" type="submit">Go Online!</button><br/><br/>
        <div id="forgotp"><a href="javascript:void(0)" onclick="mainresetpasswordf()">Forgot Password</a></div><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="signup" class="form-control">Not Registered yet...<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="signup.php">Sign Up here</a></div>

    </form>

    <form method="post" action="resetpassword.php" >
    <div style="display:none; text-align: center" id="dialogContent" class="modal-dialog" title="Change Password"><br/>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" id='emailc' placeholder="Enter your email" class="text-info"  style="align:center"/><br/><br/>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Change" class="btn btn-primary btn-success" onclick="gopassword()" />&nbsp;<input type="button" value="Back"class="btn" onclick="goBackbutton()"/><br/><br/>
    </div>
    </form>

</div>
</body>
</html>