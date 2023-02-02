<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="img/LFicon.png">    <!--favicon-->
<title>Lola Feling Restaurant</title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">     <!--style.css document-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  <!--googleapis jquery-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!--font-a-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>                          <!--bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>           <!--bootstrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>            <!--bootstrap-->
</head>
<script>
    $(document).ready(function(){
  // Add smooth scrolling to all links
  $(".smoothScroll").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<style>
.flex-column { 
       max-width : 260px;
   }
           
.container {
            background: #f9f9f9;
        }
      
.img {
            margin: 5px;
        }

.logo img{
	 width:150px;
	 height:250px;
	margin-top:90px;
	margin-bottom:40px;
}
.logo1 {
    width:100px;
    height: 70px;
}
</style>

<body>
 <!---navbar--->   
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: #F5F5F5;
opacity: 0.75;
box-shadow: 0px 4px 17px rgba(0, 0, 0, 0.25);">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/LFIcon.png" class="logo1">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navi">
                <ul class="navbar-nav mr-auto">
                    
                    
                    <?php

                    //set navigation bar when logged in
                    if(isset($_SESSION['user_id'])){ 
                    
                    //set navigation bar when logged in and role of admin
                    if($_SESSION['role']==2) {   
                        echo'
                        <li class="nav-item">
                            <a class="nav-link" href="view_reservations.php" >View Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view_menu.php" >View Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view_reservations_archive.php" >Reservation Archive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="schedule.php" >Edit Schedule</a>
                        </li>';
                    } elseif ($_SESSION['role']==1) {
                        echo'
                        <li class="nav-item">
                            <a class="nav-link" href="reservation.php" >New Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php" >Menu Selection</a>
                        </li>
                        ';
                    }
                    }
                    //main page not logged in navigation bar
                    else { echo'
                    <li class="nav-item">
	                 <a class="nav-link" href=#carousel_8173>Packages</a>
	                </li>
                    <li class="nav-item">
                        <a class="nav-link" href=#carousel_9de9>Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=#reservation>Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Find Us</a>
                    </li>
                    '; } 
                    ?>
                    
                </ul>
                
                    <?php
                    //log out button when user is logged in
                    if(isset($_SESSION['user_id'])){
                    echo '
                    <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark">Logout</button>
                    <i class="fa fa-user">'. $_SESSION['username'] .'</i>
                    </form>';
                    }
                    else{  
                    echo '
                    <div>
                    <ul class="navbar-nav ml-auto font-sans">
			<li><a class="nav-link fa fa-sign-in" data-toggle="modal" data-target="#myModal_reg">&nbsp;Sign Up</a></li>
			<li><a class="nav-link fa fa-user-plus" data-toggle="modal" data-target="#myModal_login">&nbsp;Login</a></li>
                    </ul> 
                    </div>
                    ';} 
                    ?>
              
            </div>
        </div>
</nav>

<div class="container">
  <!-- The Modal -->                          
    <div class="modal fade" id="myModal_login">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Login</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            
            <?php
            if(isset($_GET['error1'])){
        
            //script for modal to appear when error 
            echo '  <script>
                    $(document).ready(function(){
                    $("#myModal_login").modal("show");
                    });
                    </script> ';
        
        
            //error handling of log in
        
            if($_GET['error1'] == "emptyfields") {   
            echo '<h5 class="text-danger text-center">Fill all fields, Please try again!</h5>';
            }
            else if($_GET['error1'] == "error") {   
            echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
            }
            else if($_GET['error1'] == "wrongpwd") {   
                echo '<h5 class="text-danger text-center">Wrong Password, Please try again!</h5>';
            }
            else if($_GET['error1'] == "error2") {   
                echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
            }
            else if($_GET['error1'] == "nouser") {   
                echo '<h5 class="text-danger text-center">Username or email not found, Please try again!</h5>';
                }
            }
            echo'<br>';
            ?>  
            
                    <div class="signin-form">
                    <form action="includes/login.inc.php" method="post">
                        <p class="hint-text">If you have already an account please log in.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mailuid" placeholder="Username Or Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Log In</button>
                    </div>
                            </form>
                    </div>   
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 
</div>

    
<div class="container">
  <!-- The Modal -->
    <div class="modal fade" id="myModal_reg">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Register</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>      
            <!-- Modal body -->
                <div class="modal-body">   

                <?php
                if(isset($_GET['error'])){
                    //script for modal to appear when error 
                    echo '  <script>
                                $(document).ready(function(){
                                $("#myModal_reg").modal("show");
                                });
                            </script> ';


                    //error handling for errors and success --sign up form

                    if($_GET['error'] == "emptyfields") {   
                        echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "invalidemailusername") {   
                        echo '<h5 class="bg-danger text-center">Username or Email are taken!</h5>';
                    }
                    else if($_GET['error'] == "invalidemail") {   
                        echo '<h5 class="bg-danger text-center">Invalid Email, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "usernameemailtaken") {   
                        echo '<h5 class="bg-danger text-center">Username or email is taken, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "invalidusername") {   
                        echo '<h5 class="bg-danger text-center">Invalid Username, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "invalidpassword") {   
                        echo '<h5 class="bg-danger text-center">Invalid password, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "passworddontmatch") {   
                        echo '<h5 class="bg-danger text-center">Password must match, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "error1") {   
                        echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                    }
                    else if($_GET['error'] == "error2") {   
                        echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                    }
                }
                if(isset($_GET['signup'])) { 
                        //script for modal to appear when success
                    echo '  <script>
                                $(document).ready(function(){
                                $("#myModal_reg").modal("show");
                                });
                            </script> ';

                    if($_GET['signup'] == "success"){ 
                        echo '<h5 class="bg-success text-center">Sign up was successfull! Please Log in!</h5>';
                    }
                }
                echo'<br>';
                ?>
    
        <!---sign up form -->
                    <div class="signup-form">
                        <form action="includes/signup.inc.php" method="post">
                            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="uid" placeholder="Username" required="required">
                                    <small class="form-text text-muted">Username must be 4-20 characters long</small>
                            </div>
                            <div class="form-group">
                                    <input type="email" class="form-control" name="mail" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                                <small class="form-text text-muted">Password must be 6-20 characters long</small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password" required="required">
                            </div>        
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" id="termsCheckbox" required="required"> I accept the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of Use & Privacy Policy</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block">Register Now</button>
                            </div>
                        </form>
                            <div class="text-center">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#myModal_login">Sign in</a></div>
                    </div> 	
                </div>        
                <!-- Modal footer -->
                <div class="modal-footer">

                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> 
            </div>
        </div>
    </div>

       <!-- Modal for Terms of Use -->
       <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms of Use & Privacy Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <h4>Terms & Conditions</h4>
            <br><br>

            <p>Terms and Conditions

            Introduction
            Welcome to the Lola Feling Restaurants web-based reservation management system with SMS notification. These terms and conditions govern your use of the website and the services provided by Lola Feling Restaurant. By using the website and the services, you accept these terms and conditions in full. If you disagree with these terms and conditions or any part of these terms and conditions, you must not use the website or the services.
            
            Services
            The website and the services provided by Lola Feling Restaurant allow users to make reservations at the Lola Feling Restaurant through the website and receive SMS notifications regarding their reservations.
            
            Use of the website and the services
            You must not use the website or the services in any way that causes, or may cause, damage to the website or the services or impairment of the availability or accessibility of the website or the services. You must not use the website or the services for any fraudulent or unlawful purpose.
            
            Intellectual property rights
            Unless otherwise stated, Lola Feling Restaurant and/or its licensors own the intellectual property rights in the website and the services. Subject to the license below, all these intellectual property rights are reserved.
            
            License to use the website and the services
            Lola Feling Restaurant grants you a limited, non-exclusive, non-transferable, and revocable license to use the website and the services for your personal use. You are not allowed to reproduce, duplicate, copy, sell, resell, or exploit any part of the website or the services without the express written permission of Lola Feling Restaurant.
            
            Disclaimer
            The website and the services are provided "as is" and Lola Feling Restaurant makes no representations or warranties of any kind, express or implied, as to the operation of the website or the services, or the information, content, materials, or products included on the website or the services. Lola Feling Restaurant does not warrant that the website or the services will be uninterrupted or error-free.
            
            Limitations of liability
            Lola Feling Restaurant will not be liable to you in respect of any special, indirect, or consequential loss or damage.
            
            Breaches of these terms and conditions
            Without prejudice to Lola Feling Restaurants other rights under these terms and conditions, if you breach these terms and conditions in any way, or Lola Feling Restaurant reasonably suspects that you have breached these terms and conditions in any way, Lola Feling Restaurant may take such action as Lola Feling Restaurant deems appropriate to deal with the breach, including suspending your access to the website and the services, prohibiting you from accessing the website and the services, blocking computers using your IP address from accessing the website and the services, contacting your internet service provider to request that they block your access to the website and the services, and/or bringing court proceedings against you.
            
            Governing law and jurisdiction
            These terms and conditions will be governed by and construed in accordance with the laws of the Philippines and you submit to the non-exclusive jurisdiction of the courts of the Philippines.</p>
            
            <br><br>
            <h4>Privacy Policy</h4>
            <br><br>

            <p>Privacy Policy

            Introduction
            Lola Feling Restaurant is committed to protecting the privacy of our users. This Privacy Policy explains how we collect, use, and disclose information from users of our web-based reservation management system with SMS notification.
            
            Information we collect
            We collect personal information from users when they make a reservation through our website. This information includes, but is not limited to, the users name, contact information, and reservation details.
            
            Use of collected information
            We use the collected information to process reservations and to send SMS notifications regarding the reservations. We may also use the information to improve our services and to communicate with users regarding their reservations. We will not share or sell any collected information to third parties, except as required by law or as necessary to provide the services offered by the website.
            
            Data retention
            We will retain the collected information for as long as necessary to provide the services and for any legal or business purposes.
            
            Data security
            We take the security of the collected information seriously and have implemented appropriate technical and organizational measures to protect against unauthorized access, alteration, disclosure, or destruction of the collected information.
            
            Data access and control
            Users have the right to access, correct, and delete their personal information that we have collected. Users can also request to have their personal information removed from our systems by contacting us.
            
            Compliance with laws
            We comply with the Data Privacy Act of 2012 (RA 10173) and the Consumer Act of the Philippines (RA 7394) in the collection, use, and disclosure of personal information.
            
            Changes to the Privacy Policy
            We reserve the right to make changes to this Privacy Policy at any time. We will notify users of any changes to the Privacy Policy by updating it on our website.
            
            By using our web-based reservation management system with SMS notification, you agree to the terms of this Privacy Policy and our Terms and Conditions. If you have any questions or concerns about our Privacy Policy or our practices, please contact us.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="acceptTerms()">Accept</button>
            </div>
            </div>
        </div>
        </div>         

</div>
   

<script>
  function acceptTerms() {
    document.getElementById("termsCheckbox").checked = true;
  }
</script>