  function validation(){
    
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;
    var email = document.getElementById('email').value;


    var usercheck = /^[A-Za-z. 1-99]{3,85}$/ ;
   /*var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,18}$/;
   */
      var passwordcheck = /^.{6,}$/;
      
    var emailcheck = /^[A-za-z0-9_]{3,}@[A-za-z]{3,}[.][A-Za-z.]{2,}$/;
    
      

   
      
      if(usercheck.test(username)){
 
      document.getElementById('usererror').innerHTML =" ";
   }

    else{
     document.getElementById('usererror').innerHTML ="Enter Correct Username";
        document.getElementById("username").focus();
     return false;
    }

    if(passwordcheck.test(password)){
       document.getElementById('passerror').innerHTML =" ";

    }

    else{
     document.getElementById('passerror').innerHTML ="Passowrd Should be atleast 6 chracters long..";
        document.getElementById("password").focus();
     return false;
    }


   if(cpassword.match(password)){
      document.getElementById('cpasserror').innerHTML =" ";

   }

   else{
    document.getElementById('cpasserror').innerHTML ="Password didn't match";
       document.getElementById("cpassword").focus();
    return false;
   }

    if(emailcheck.test(email)){
       document.getElementById('emailerror').innerHTML =" ";

    }

    else{
     document.getElementById('emailerror').innerHTML ="Enter valid email address";
     document.getElementById("email").focus();
        

     return false;
    }


  }

    