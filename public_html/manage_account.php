<!DOCTYPE html>
<html lang="en">
<?php 
   $title = "Account Manager";
   include("header.php"); 
?>

 
	
	<!-- Reference: http://bootsnipp.com/snippets/DVXQa
         http://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp
         http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_input_height2&stacked=h
         http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_input_height&stacked=h
         http://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp
         -->

    <!-- Beginning of logo, input fields and buttons -->
    <div align="center" style="padding-top: 5%;">
        <div class="container-fluid">
			<form class="form-horizontal" action="accountUpdate.php" method="post">        
                <h2 style="font-size: 2.5vw;">Manage Account</h2>
                <form class="form-inline" action="accountUpdate.php">
                	
					<div style="padding-top: 40px;" class="form-group form-group-lg">
				     
                  <!-- FIRST NAME -->
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
                <!-- SAVE CHANGES -->
			   <div id = "container">
				<button type="submit" id="save-button" class="btn btn-success btn-lg">Save Changes</button>
				 </div>
				  
			 </div>
            </div>
         </form>
		</div>
		
				<div div align="center" style="padding-top: 5%;">
		 <!-- DELETE -->  
				<form action="deleteAccount.php" method="post">
				
				 <button type="submit" id="delete-button" class="btn btn-danger btn-lg">Delete</button>
				</form>
				</div>
      <!--End of Form-->
     <?php include "footer.php" ?>
  
</html>

