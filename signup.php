<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
<!--	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="jscript.js"></script>

    <style type="text/css">
		.msg{
       color:red;
       }
       .goback{
        margin-top: 20px;
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
            <input type="text" class="form-control" name="name" class="input-small" placeholder="Full Name" required/><br/>
            <input type="text" name="email" class="form-control" autocomplete="off" class="input-small" placeholder="Email address" autocomplete="off"/ required><br/>
            <input type="password" name="pword" autocomplete="off" class="form-control" placeholder="Password" autocomplete="off" required/><br/>
            <input type="password" name="cpword"  class="form-control" autocomplete="off" class="input-small" placeholder="Confirm Password" required/><br/><br/>
            <button class="btn btn-lg btn-success" type="submit">Signup</button>
   	</div>
		</form>
    </div>
</body>
</html>
