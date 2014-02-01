<!DOCTYPE html>
<html>
<head>
    <title>Organize users</title>
    <link href="includes/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="jscript.js"></script>
</head>
<body>
<div class="main">
<div class="mainresetpassword">
        <form class="form-signin" role="form" action="resetpassword.php" method="post" class="form-horizontal" >
            <div id="msg">
                <?php
                 if(isset($_GET['msg'])){
                   echo $_GET['msg'];
                }
                ?>
            </div>
            <br/><br/><br/>
            <input type="text" class="form-control " name="email" class="input-small" placeholder="Enter your email" autocomplete="off"/>
            <input type="button" id="goback" class="btn btn-lg btn-success" value="Back" onclick="javascript: try{ goBack() }catch (err){ alert(err);}"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Submit" class="btn btn-lg btn-success" />
            <div class="goback"></div>
        </form>
    </div>
</div>
</body>