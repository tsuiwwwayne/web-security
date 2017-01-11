<div class="container below-static-navbar padding-top-20">
   <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading text-center">
               <label id="login-title">Login</label>
            </div>
            <div class="col-sm-12 text-center margin-20"><label class="text-danger"><?php echo $errorMessage ?></label></div>
            <form class="form-horizontal" id="form" method="post" action="?controller=user&action=login">
               <div class="panel-body margin-20">
                  <!-- USERNAME -->
                  <div class="form-group">
                     <div class="row">
                        <label class="control-label col-sm-3" for="username">Username:</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                        </div>
                     </div>
                  </div>
                  <!-- PASSWORD -->
                  <div class="form-group">
                     <div class="row">
                        <label class="control-label col-sm-3" for="password">Password:</label>
                        <div class="col-sm-8">
                           <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                        </div>
                     </div>
                  </div>
                  <!-- Collapse content -->
                  <div class="collapse" id="collapse-register">
                     <!-- CONFIRM PASSWORD -->
                     <div class="form-group " id="demo">
                        <div class="row">
                           <label class="control-label col-sm-3" for="password-confirm">Confirm Password:</label>
                           <div class="col-sm-8">
                              <input type="password" class="form-control" name="password-confirm" placeholder="Confirm password">
                           </div>
                        </div>
                     </div>
                     <!-- DISPLAY NAME -->
                     <div class="form-group">
                        <div class="row">
                           <label class="control-label col-sm-3" for="displayname">Display name:</label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="displayname" placeholder="Enter display name">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="panel-footer text-center" style="margin-bottom:-15px">
                  <button id="login-btn" type="submit" class="btn btn-primary padding-left-20 padding-right-20">Login</button>
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
           reg=true;
       }
       else {
           $('#form').attr("action", "?controller=user&action=login");
           $('#login-btn').text('Login');
           $('#login-title').text('Login');
           $('#register-prompt').text('Don\'t have an account?');
           $('#register-btn').text('Register');
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
</script>
