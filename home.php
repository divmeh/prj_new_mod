<!DOCTYPE html>
<html>
<head>
<title>Organize users</title>
    <link href="includes/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="jscript.js"></script>
</head>
<body>
<div id="container">
<?php
session_start();
if(!$_SESSION['mname']){
	header('Location:index.php?authresult=Please login again');
    exit;
}
?>
<div class="memberinfo">
        <?php
        echo "Welcome <b>".$_SESSION['mname'].'</b>';
        echo "<br/>";
        echo "<a href='logout.php'>Logout</a> | <a href='javascript:void(0);' onclick='openDialog();'>Change Password</a>";
        ?>
</div>
<?php
require_once('connection.php');
//$query = mysql_query('SELECT * FROM members');

$query = $connect->prepare("SELECT * FROM members");
$query->execute();
?>
<div class="main">
 <h3 id="message"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; }?></h3>
<div id="title"><h2>Organize users</h2></div>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
  <tr><th>#</th><th>Name</th><th>Email</th><th>Account Status</th><th>Action</th></tr>
  <?php
  while($rows=$query->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr><td><input type="checkbox" name="select"/></td><td><?php echo $rows['name'];?></td>
      <td><?php echo $rows['email'];?></td><td id="cstatus"><?php $accountstatus = ($rows['isenabled']) ? 'Activated':'Deactivated'; echo $accountstatus;?></td>
      <td>
          <span class="actionLinks"><a href="javascript:void(0)" id="deactivate" onclick="getIdToChangeStatus(<?php echo $rows['id']; ?>,this)" ><?php $action = ($rows['isenabled']) ? 'Deactivate':'Activate'; echo $action; ?></a></span>|
          <span class="actionLinks"><a href="javascript:void(0)" id="del" onclick="getIdToDelete(<?php echo $rows['id']; ?>)">Delete</a></span>|
          <span class="actionLinks"><a href="javascript:void(0)" id="chPassword" onclick="getIdToChangePassword(<?php echo $rows['id']; ?>)">Change Password & Email</a></span>
      </td>
  </tr>
  <?php } ?>
  </table>
    <br/>
</div>
  <div style="display:none; text-align: center" id="dialogContent" class="modal-dialog" title="Change Password"><br/>

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="cpassword"placeholder="Enter new Password" class="text-info"  style="align:center"/><br/><br/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="cppassword" placeholder="Confirm Password" class="text-info" style="align:center"/><br/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" value="Reset" class="btn btn-primary btn-success" id="resetp" onclick='getNameOfLoggedIn("<?php echo $_SESSION['mname']; ?>")'/>&nbsp;<input type="button" value="Back"class="btn" onclick="goBackbutton()"/><br/><br/>

  </div>
</div>
</body>
</html>