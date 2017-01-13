<div class="container below-static-navbar padding-top-20">
   <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading text-center">
               <label id="login-title">Login</label>
            </div>
            <div class="col-sm-12 text-center margin-top-20 margin-bottom-20"><label class="text-danger"><?php echo $errorMessage ?></label></div>
            <form class="form-horizontal" id="form" method="post" action="?controller=user&action=login">
               <div class="panel-body">
                  <!-- USERNAME -->
                  <div class="form-group">
                     <div class="row margin-left-20 margin-right-20">
                        <label class="control-label col-sm-3" for="username">Username:</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="username" placeholder="Enter username" oninput="checkSubmitButton(this)" onblur="checkInput(this)" required>
                        </div>
                     </div>
                  </div>
                  <!-- PASSWORD -->
                  <div class="form-group">
                     <div class="row margin-left-20 margin-right-20">
                        <label class="control-label col-sm-3" for="password">Password:</label>
                        <div class="col-sm-8">
                           <input type="password" class="form-control" name="password" placeholder="Enter password" oninput="checkSubmitButton(this)" onblur="checkInput(this)" required>
                        </div>
                     </div>
                  </div>
                  <!-- Collapse content -->
                  <div class="collapse" id="collapse-register">
                     <!-- CONFIRM PASSWORD -->
                     <div class="form-group">
                        <div class="row margin-left-20 margin-right-20">
                           <label class="control-label col-sm-3" for="password-confirm">Confirm Password:</label>
                           <div class="col-sm-8">
                              <input type="password" class="form-control" name="password-confirm" placeholder="Confirm password" oninput="checkSubmitButton(this)" onblur="checkInput(this)" >
                           </div>
                        </div>
                     </div>
                     <!-- DISPLAY NAME -->
                     <div class="form-group">
                        <div class="row margin-left-20 margin-right-20">
                           <label class="control-label col-sm-3" for="displayname">Display name:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="displayname" placeholder="Enter display name" oninput="checkSubmitButton(this)" onblur="checkInput(this)">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="panel-footer text-center" style="margin-bottom:-15px">
                  <button id="login-btn" type="submit" disabled=true class="btn btn-primary padding-left-20 padding-right-20">Login</button>
               </div>
            </form>
         </div>
         <p class="text-right">
            <span id="register-prompt">Don't have an account?</span>
            <a style="color: black; text-decoration: underline;" id="register-btn" data-toggle="collapse" data-target="#collapse-register" onclick="registerToggle()" >Register</a>
         </p>
      </div>
   </div>
</div>

<script type="text/javascript">
   var reg = false;
   function registerToggle() {
       if (reg==false) {
           $('#form').attr("action", "?controller=user&action=register");
           $('#login-btn').text('Register');
           $('#login-title').text('Register');
           $('#register-prompt').text('Are you an existing user?');
           $('#register-btn').text('Back to Login');
           checkSubmitButton(document.getElementsByName('password-confirm')[0]);
           checkSubmitButton(document.getElementsByName('displayname')[0]);
           reg=true;
       }
       else {
           $('#form').attr("action", "?controller=user&action=login");
           $('#login-btn').text('Login');
           $('#login-title').text('Login');
           $('#register-prompt').text('Don\'t have an account?');
           $('#register-btn').text('Register');
           checkSubmitButton(document.getElementsByName('username')[0]);
           checkSubmitButton(document.getElementsByName('password')[0]);
           document.getElementsByName('password')[0].style.border = "1px solid #CCCCCC";
           reg=false;
       }
   }
   var scroll = false;
   function aboutScroll() {
       if (scroll == false) {
           window.scrollTo(0,window.innerHeight);
           scroll = true;
       }
       else {
           window.scrollTo(0,0);
           scroll = false;
       }
   }

    var isUsernameFilled = false;
    var isPasswordFilled = false;
    var isPasswordConfirmFilled = false;
    var isDisplaynameFilled = false;
    var isPasswordMatched = false;
    var password = document.getElementsByName('password')[0];
    var password_confirm = document.getElementsByName('password-confirm')[0];

    function checkSubmitButton(input) {
        switch (input.name) {
            case "username":
                if (input.value.length != 0) {
                    isUsernameFilled=true;
                } else {
                    isUsernameFilled=false;
                }
            break;

            case "password":
                if (input.value.length != 0) {
                    isPasswordFilled=true;
                } else {
                    isPasswordFilled=false;
                }
            break;

            case "password-confirm":
                if (input.value.length != 0) {
                    isPasswordConfirmFilled=true;
                } else {
                    isPasswordConfirmFilled=false;
                }
            break;

            case "displayname":
                if (input.value.length != 0) {
                    isDisplaynameFilled=true;
                } else {
                    isDisplaynameFilled=false;
                }
            break;

            default:
            break;
        }

        switch ($('#login-btn').text()) {
            case "Login":
                if (isUsernameFilled && isPasswordFilled) {
                    $('#login-btn').prop('disabled', false);
                } else {
                    $('#login-btn').prop('disabled', true);
                }
            break;

            case "Register":
            // alert(input.name);
                if (input.name == "password" || input.name == "password-confirm") {
                    // alert(password.value);
                    isPasswordMatched = password.value == password_confirm.value;
                }
                if (!isPasswordMatched) {
                    password.style.border = "1px solid #FF0000";
                    password_confirm.style.border = "1px solid #FF0000";
                } else {
                    password.style.border = "1px solid #CCCCCC";
                    password_confirm.style.border = "1px solid #CCCCCC";

                }

                if (isUsernameFilled && isPasswordFilled && isPasswordConfirmFilled && isDisplaynameFilled && isPasswordMatched) {
                    $('#login-btn').prop('disabled', false);
                } else {
                    $('#login-btn').prop('disabled', true);
                }
            break;

            default:
            break;
        }
    }

    function checkInput(input) {
        if (input.value === "") {
            input.style.border = "1px solid #FF0000";
        } else {
            if (input.name != 'password' && input.name != 'password-confirm') {
                input.style.border = "1px solid #CCCCCC";
            }
        }
   }

</script>
