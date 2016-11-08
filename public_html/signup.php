<?php 
    $title = "Sign Up";
    include("header.php");

    // Error Handling on submit
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $errorName = $errorUsername = $errorPassword = false;
    $errorInvalidName = false;
    $errorInvalidUsername = $errorUsernameExists = false;
    $errorInvalidPassword = false;
    if (strpos($url, 'errorName=empty') !== false) {
      $errorName = true;
    }
    if (strpos($url, 'errorName=invalid') !== false) {
      $errorInvalidName = true;
    }
    if (strpos($url, 'errorUsername=empty') !== false) {
      $errorUsername = true;
    }
    if (strpos($url, 'errorUsername=invalid') !== false) {
      $errorInvalidUsername = true;
    }
    if (strpos($url, 'errorUsername=exists') !== false) {
      $errorUsernameExists = true;
    }
    if (strpos($url, 'errorPassword=empty') !== false) {
      $errorPassword = true;
    }
    if (strpos($url, 'errorPassword=invalid') !== false) {
      $errorInvalidPassword = true;
    }
?>
      <!-- Reference: http://bootsnipp.com/snippets/DVXQa
   http://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp
   http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_input_height2&stacked=h
   http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_input_height&stacked=h
   http://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp
   -->
<div class="container-fluid">
   <form class="form-horizontal" action="makeaccount.php" method="post">
      <h2 style="padding-left: 0;">Registration Form</h2>
         <!-- NAME -->
         <div class="form-group">
            <label for="signup-name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
               <input class="form-control" type="text" placeholder="Enter Name" id="signup-name" name="signup-name"
                  value="<?php echo $_SESSION['signupname'];?>">
               <p id="signupFormError0" class="form-error">Name must contain only alphabetical letters.</p>
               <?php
                  if ($errorName !== false) {
                     echo "<p class='show-form-error'>Please enter your name.</p>";
                  } else if ($errorInvalidName !== false) {
                     echo "<p class='show-form-error'>Name must contain only alphabetical letters.</p>";
                  }
               ?>
            </div>
         </div>
         <!-- USERNAME -->
         <div class="form-group">
            <label for="signup-username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
               <input class="form-control" type="text" placeholder="Enter Username" id="signup-username" name="signup-username"
                  value="<?php echo $_SESSION['signupusername'];?>">
               <p id="signupFormError1" class="form-error">Username must be 3-16 characters long and contain only numbers and/or letters.</p>
               <?php
                  if ($errorUsername !== false) {
                     echo "<p class='show-form-error'>Please enter your username.</p>";
                  } else if ($errorInvalidUsername !== false) {
                     echo "<p class='show-form-error'>Username must be 3-16 characters long and contain only numbers and/or letters.</p>";
                  } else if ($errorUsernameExists !== false) {
                     echo "<p class='show-form-error'>Username already exists.</p>";
                  }
               ?>
            </div>
         </div>
         <!-- PASSWORD -->
         <div class="form-group">
            <label for="signup-password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
               <input class="form-control" type="password" placeholder="Enter Password" id="signup-password" name="signup-password">
               <p id="signupFormError2" class="form-error">Password must be at least 6 characters long.</p>
               <?php
                  if ($errorPassword !== false) {
                     echo "<p class='show-form-error'>Please enter your password.</p>";
                  } else if ($errorInvalidPassword !== false) {
                     echo "<p class='show-form-error'>Password must be at least 6 characters long.</p>";
                  }
               ?>
            </div>
         </div>
         <!-- Meal Preference(s) -->
         <div class="form-group">
            <label class="col-sm-2 control-label">Meal Preference</label>
            <div>
               <div class="col-sm-2">
                  <label class="col-sm-2">Calories</label>
                  <select class="form-control" name="signup-calories">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
               <div class="col-sm-2">
                  <label class="col-sm-2">Sugar</label>
                  <select class="form-control" name="signup-sugar">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
               <div class="col-sm-2">
                  <label class="col-sm-2">Sodium</label>
                  <select class="form-control" name="signup-sodium">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
               <div class="col-sm-2">
                  <label class="col-sm-2">Protein</label>
                  <select class="form-control" name="signup-protein">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
            </div>
         </div>
      <div style="padding-top: 40px;" align="center">
         <button type="submit" id="register-button" class="btn btn-primary">Register</button>
      </div>
   </form>
</div>
<!--End of Form-->
<?php include "footer.php" ?>