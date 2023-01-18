
function validation()
{
     var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    
    
    var usercheck = /^[A-Za-z. 1-99]{3,85}$/ ;
    var passwordcheck = /^.{6,}$/;
    
 if(usercheck.test(username)){
 
      document.getElementById('usererror').innerHTML =" ";
   }

    else{
     document.getElementById('usererror').innerHTML ="Enter Correct Username";
        document.getElementById("username").focus();
     return false;
    }
    
     if(passwordcheck.test(password)){
       document.getElementById('passworderror').innerHTML =" ";

    }

    else{
     document.getElementById('passworderror').innerHTML ="Password Should be atleast 6 chracters long..";
        document.getElementById("password").focus();
     return false;
    }
}