<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link href="includes/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="jscript.js"></script>

    <style type="text/css">
		.msg{
       color:red;
       }
       .goback{
        margin-top: 10px;
        text-align: right;
       }
       .main{
           box-shadow: 2px 5px 10px 05px rgba(0, 0, 0, 0.29);
           width:40%;
           height: 60%;
           line-height: 40px;
           margin: 0 auto;
       text-align: center;
       }
        h2{
            text-align: center;
        }
        .form-signin{
         padding: 10px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="goback"><img src="images2.jpg" alt="Go back" id="goback" onclick="javascript: try{ goBack() }catch (err){ alert(err);}"/></div>
		<form class="form-signin" role="form" action="chksignup.php" method="post" class="form-horizontal">
		<h2 class="form-signin-heading">New Account</h2>
			<div class="msg">
			<?php if(isset($_GET['msg'])){
						if($_GET['msg'] == 'Registered sucesfully'){
						echo $_GET['msg'].'&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Login Now</a>';
						}else{
				echo $_GET['msg'];
					}
            }
			?>
			</div>
            <input type="text" class="form-control" name="name" class="input-small" placeholder="Full Name" required maxlength="20"/><br/>
            <input type="text" name="email" class="form-control" autocomplete="off" class="input-small" placeholder="Email address" autocomplete="off"/ required><br/>
            <input type="password" name="pword" autocomplete="off" class="form-control" placeholder="Password" autocomplete="off" required/><br/>
            <input type="password" name="cpword"  class="form-control" autocomplete="off" class="input-small" placeholder="Confirm Password" required/><br/><br/>
            <button class="btn btn-lg btn-success" type="submit">Signup</button>
   	</div>
		</form>
    </div>
</body>
</html>
