function getIdToDelete(id){
    if(confirm('Are you sure, you want to delete')){
        window.location.href='coreController.php?id='+id+'&del=1';
    }else
        return false;
}
function getIdToChangeStatus(id,me){
        $(document).ready(function(){
        var r = $(me).html();
        if(r==='Activate'){
          var ctostatus = 1;
        }else{
            var ctostatus = 0;
        }
        window.location.href='coreController.php?id='+id+'&changeStatus=1&cstatus='+ctostatus;
      return true;
      });
}
function goBack(){
    window.history.back();
}
function goBackbutton(){
    $('#dialogContent').dialog('close');
}
function openDialog(id){
   $(document).ready(function(){
        var userId = id;
        $("#dialogContent").css("display","inline");
        $("#dialogContent").dialog();
    });
}

function getIdToChangePassword(id){
    window.location.href='coreController.php?id='+id+'&changePass=1';
    }
function getNameOfLoggedIn(lnamename){
    var password = $('#cpassword').val();
    var cpassword = $('#cppassword').val();
    if(!password){
        alert('Please enter password to change');
        $('#cpassword').focus();
        return false;
    }
    if(password == cpassword){
        window.location.href='coreController.php?name='+lnamename+'&changePassForLoggedIN=1&cpassword='+password+'&ccpassword='+cpassword;
    }else{
        alert('Password does not match. Please crosscheck');
        $('#cpassword').focus();
        return false;
    }
}

function mainresetpasswordf(){

    $(document).ready(function(){

        $("#dialogContent").css("display","inline");
        $("#dialogContent").dialog();
    });
}
function gopassword(){
    
    var email = $('#emailc').val();
    if(email == ''){
        alert('Please enter email to change password');
        $('#emailc').focus();
        return false;
    }
}