<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $title; ?> &#8226; Don't Eat That!</title>
      <meta charset="utf-8">
      <!-- Ensure proper rendering on mobile -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap -->
      <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Link to an external style sheet -->
      <link rel="stylesheet" type="text/css" href="mainstyle.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
      <!-- Custom jquery functions -->
      <script src="jquery/jQueryFunctions.js"></script>
      <!-- Script to send email -->
      <script src="js/contact.js"></script>
      <!-- Script to retrieve food data from API -->
      <script src="foodquery.php"></script>
   </head>
   <body>
      <!-- Navbar setup -->
      <nav class="navbar navbar-default">
         <div class="container-fluid">
            <!-- DET Logo on navbar -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#theNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a href="index.php">
               <img class="navbar-brand" src="res/greylogo.png">
               </a>
            </div>
            <!-- End of DET Logo on navbar -->
            <div class="navbar-collapse collapse" id="theNavbar">
               <ul class="nav navbar-nav">
                  <li><a href="about.php">About</a></li>
                  <li><a href="howItWorks.php">How It Works</a></li>
                  <li><a href="contact.php">Contact</a></li>
               </ul>
               <div>
                  <ul class="nav navbar-nav navbar-right">
                     <?php
                        if (isset($_SESSION["user_name"])) {
                           echo 
                           "
                           <li><a href='#'><span class='glyphicon glyphicon-cog'></span> Manage Account</a></li>
                           <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'> Logout</a></li>
                           ";
                        } else {
                           echo 
                           "
                           <li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Signup</a></li>
                           <li><a data-toggle='modal' href='#myModal'><span class='glyphicon glyphicon-log-in'> Login</a></li>
                           ";
                        } 
                        ?>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <!-- End of navbar setup -->
      <!-- Beginning of Modal -->
      <div id="myModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">x</button>
                  <h3 class="modal-title">Login</h3>
               </div>
               <div class="modal-body">
                  <form method="post" action="login.php" name="login_form">
                     <p> 
                     <div class="form-group form-group-lg">
                        <label class="col-sm-5 control-label">Username</label>
                        <div class="col-sm-9">
                           <input id="loginName" class="form-control" type="text" placeholder="Username" name="login-name">
                           <p id="loginError0" class="form-error">Please enter your username.</p>
                        </div>
                     </div>
                     </p>
                     <p> 
                     <div class="form-group form-group-lg">
                        <label class="col-sm-5 control-label">Password</label>
                        <div class="col-sm-9">
                           <input id="loginPass" class="form-control" type="password" placeholder="Password" name="login-password">
                           <p id="loginError1" class="form-error">Please enter your password.</p>
                        </div>
                     </div>
                     </p>
                     <br><br><br><br>
                     <p><button id="login_button" type="submit" class="btn btn-primary btn-lg">Sign in</button></p>
                  </form>
               </div>
               <div class="modal-footer">
                  <a id="reg_button" href="signup.php" class="btn btn-primary btn-lg">Register</a>
               </div>
            </div>
         </div>
      </div>
      <!-- End of Modal -->