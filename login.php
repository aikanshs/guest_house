<?php        
 include 'base.html';
?>
<html>
<head>
  <style type="text/css">
    .new_form{
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
    }
  </style>
</head>
<body>
  
<div class="new_form">
  <h3>Please Sign In</h3>
<form action="validate.php"  method="POST">
  <label>Email</label><br>
  <input type="email" name="email"><br>
  <label>Password</label><br>
  <input type="password" name="password">
  <br>
  
 <div >
 <input type="submit" value="Sign In" />
 </div>
</form>
<br>
<a href="forgot.html">Forgot password</a>
<br>
<a href="signup.html">Not a member yet? SignUp</a>

</div>

</body>
</html>

<!--   <div id="login_pg">
      <div style="align-content:flex-end;width: 50%;">
          <form action="action_page.php" style="border:1px solid #ccc">
              <div class="container">
                <h3>Please Sign In</h3>
                <hr>
                
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
            
                
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                  
                <label>
                  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>
                <div class="clearfix">
                  <button type="submit" class="Login">Login In</button>
                </div>
                <a href="forgot.html">Forgot password</a>
                <br>
                <a href="../users/register.html">Not a member yet? SignUp</a>
                
              </div>
          </form>
      </div>
  </div>
 -->   