<?php 
    $title = "Sign Up";
    include("header.php"); 
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
      <div>
         <!-- NAME -->
         <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
               <input class="form-control" type="text" placeholder="Name" required name="signup-name">
            </div>
         </div>
         <!-- USERNAME -->
         <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
               <input class="form-control" type="text" placeholder="Username" required name="signup-username">
            </div>
         </div>
         <!-- PASSWORD -->
         <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
               <input class="form-control" type="password" placeholder="Password" required name="signup-password">
            </div>
         </div>
         <!-- Meal Preference(s) -->
         <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Meal Preference</label>
            <div style="padding-left: 15px;">
               <div class="col-sm-2">
                  <label class="col-sm-2 control-label">Calories</label>
                  <select class="form-control" name="signup-calories">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
               <div class="col-sm-2">
                  <label class="col-sm-2 control-label">Sugar</label>
                  <select class="form-control" name="signup-sugar">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
               <div class="col-sm-2">
                  <label class="col-sm-2 control-label">Sodium</label>
                  <select class="form-control" name="signup-sodium">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
               <div class="col-sm-2">
                  <label class="col-sm-2 control-label">Protein</label>
                  <select class="form-control" name="signup-protein">
                     <option></option>
                     <option>High</option>
                     <option>Low</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div style="padding-top: 40px;" class="form-group form-group-lg">
         <div align="center">
            <button type="submit" id="register-button-style" class="btn btn-primary btn-lg">Register</button>
         </div>
      </div>
   </form>
</div>
<!--End of Form-->
<?php include "footer.php" ?>