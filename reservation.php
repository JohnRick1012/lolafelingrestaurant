<?php
require "header.php";
?>



    
    <!-- end of nav bar -->

<br><br>
<div class="container">
    <h3 class="text-center"><br>New Reservation<br></h3>   
    <div class="row">
        <div class="col-md-6 offset-md-3">   
 
        
        
        
    
<?php
if(isset($_SESSION['user_id'])){
    echo '<p class="text-white bg-dark text-center">Welcome '. $_SESSION['username'] .', Create your reservation here!</p>';
      
  //error handling:
    
    if(isset($_GET['error3'])){
        if($_GET['error3'] == "emptyfields") {   //douleuei bazw ta errors apo ta headers.. prp na bgalw to requiered
            echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
        }
        else if($_GET['error3'] == "invalidfname") {   
            echo '<h5 class="bg-danger text-center">Invalid First Name, Please try again!</h5>';
        }
        else if($_GET['error3'] == "invalidlname") {   
            echo '<h5 class="bg-danger text-center">Invalid Last Name, Please try again!</h5>';
        }
        else if($_GET['error3'] == "invalidlemail") {   
            echo '<h5 class="bg-danger text-center">Invalid eMail, Please try again!</h5>';
        }
        else if($_GET['error3'] == "invalidtele") {   
            echo '<h5 class="bg-danger text-center">Invalid Telephone, Pleast try again!</h5>';
        }
        else if($_GET['error3'] == "invalidcomment") {   
            echo '<h5 class="bg-danger text-center">Invalid Comment, Pleast try again!</h5>';
        }
        else if($_GET['error3'] == "invalidguests") {   
            echo '<h5 class="bg-danger text-center">Invalid Guests, Pleast try again!</h5>';
        }
        else if($_GET['error3'] == "invalidpackage") {   
            echo '<h5 class="bg-danger text-center">Invalid Package, Pleast try again!</h5>';
        }
        else if($_GET['error3'] == "dateAvailable") {   
            echo '<h5 class="bg-danger text-center">Date is already been reserve, Pleast try again!</h5>';
        }
        else if($_GET['error3'] == "invalidfile") {   
            echo '<h5 class="bg-danger text-center">Invalid File, Pleast try again!</h5>';
        }
        else if($_GET['error3'] == "full") {   
            echo '<h5 class="bg-danger text-center">Reservations are full this date and timezone, Please try again!</h5>';
        }
    }
        if(isset($_GET['reservation'])) {   
           if($_GET['reservation'] == "success"){ 
            echo '<h5 class="bg-success text-center">Your reservation was successfull!</h5>';
        }
        else if($_GET['reservation'] == "uploadsuccess") {   
            echo '<h5 class="bg-danger text-center">Reservations are full this date and timezone, Please try again!</h5>';
        }
        }
        echo'<br>';



    

    
    
     //reservation form  
    echo ' 
    
    <style>
        #myReservation {
            display: none;
        }

        #myReservation.show {
            display: block;
        }
        .modal {
            /* other styles */
            background: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
             overflow-y: scroll;
          }

        .modal-body {
            overflow-y: scroll;
            max-height: calc(100vh - 210px); /* set the max-height to be 100vh minus the height of the header and footer */
        }

    </style>
        
    <div class="signup-form">
        <form action="upload.php" method="post" enctype="multipart/form-data" id="imageUploadForm">
            <div class="form-group">
            <label>First Name</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required="required">
                <small class="form-text text-muted">First name must be 2-20 characters long</small>
            </div>
            <div class="form-group">
            <label>Last Name</label>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required="required">
                <small class="form-text text-muted">Last name must be 2-20 characters long</small>
            </div>
            <div class="form-group">
            <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="sample@mail.com" required="required">
                <small class="form-text text-muted">Enter email for confirmation of receipt</small>
            </div>   
            <div class="form-group">
            <label>Enter Date</label>
        	<input type="date" class="form-control" name="date" id="date" placeholder="Date" required="required">
            </div>
            <div class="form-group">
            <label>Reservation Time</label>
            <input type="time" class="form-control" name="time" id="time" required="required">
            </div>
            <div class="form-group">
            <label>Enter number of Guests</label>
        	<input type="number" class="form-control" min="1" name="num_guests" id="guest" placeholder="Guests" required="required">
                <small class="form-text text-muted">Minimum value is 1</small>
            </div>
            <div class="form-group">
            <label>Addons</label>
        	<select type="text" class="form-control" name="addons" id="addons" placeholder="Addons" required="required">
                <option>None</option>
                
            </select>
                <small class="form-text text-muted">Please select atleast 1 package</small>
            </div>
            <div class="form-group">
            <label>Package</label>
        	<select type="text" class="form-control" name="package" id="package" placeholder="Package" required="required">
                <option>Charles Package</option>
                <option>Carls Package</option>
                <option>Charlies Package</option>
                <option>Cybhees Package</option>
            </select>
                <small class="form-text text-muted">Please select atleast 1 package</small>
            </div>
            <div class="form-group">
            <label for="guests">Enter your Mobile Number</label>
                <input type="telephone" class="form-control" name="tele" id="phone" placeholder="mobile#" required="required">
                <small class="form-text text-muted">Mobile no. must be 6-20 characters long</small>
            </div>
            <div class="form-group">
                    Please upload your receipt for Proof of Payment: 
                    <input type="file" name="imageUpload" id="imageUpload" required="required">
                    <button type="submit" class="btn btn-primary" onclick="uploadImage()">Upload</button>
                <small class="form-text text-muted">Minimum downpayment is 50%  and Please make sure that the receipt is correct. </small>
                <small class="form-text text-muted">Here is the <img src="img/gcash.png"> # </img> 09209777973 </small>
            </div>
            <div class="form-group">
            <label>Enter extra Comments</label>
                <textarea class="form-control" name="comments" id="comments" placeholder="Comments" rows="3"></textarea>
                <small class="form-text text-muted">Comments must be less than 200 characters. You can use this comment section to paste your GCASH sms payment confirmation.</small>
            </div>        
            <div class="form-group">
		<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#" data-toggle="modal" data-target="#termsModal">Terms of  & Privacy Policy</a></label>
            </div>
            <div class="form-group">
            <button type="button" class="btn btn-success" onclick="populateModal()" ="button">Confirm Reservation</button>
            </div>
        </form>
        <br><br>

    <div class="modal fade" id="myReservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Please verify your reservation first!</h5>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/reservation.inc.php" method="post" id="originalForm">
                <div class="form-row">
                    <div class="col">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" id="modalFname" name="fname" placeholder="Enter first name" readonly>
                    </div>
                    <div class="col">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control" id="modalLname" name="lname" placeholder="Enter first name" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="modalEmail" name="email" placeholder="Enter email" readonly>
                    </div>
                    <div class="col">
                        <label for="name">Mobile #</label>
                        <input type="telephone" class="form-control" id="modalPhone" name="tele" placeholder="Mobile No." readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="name">Date</label>
                        <input type="date" class="form-control" id="modalDate" name="date" placeholder="Choose Date of Reservation" readonly>
                    </div>
                    <div class="col">
                        <label for="name">Time of Reservation</label>
                        <input type="time" class="form-control" id="modalTime" name="time" placeholder="Choose Time of Reservation" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">No. of Guest</label>
                    <input type="number" class="form-control" min="1" id="modalGuest" name="num_guests" placeholder="No. of Guest" readonly>
                </div>
                <div class="form-group">
                <label>Addons</label>
                <select type="text" class="form-control" id="modalAddons" name="addons" placeholder="Addons" readonly>
                    <option>None</option>
                </select>
                    <small class="form-text text-muted">Please select atleast 1 package</small>
                </div>
                <div class="form-group">
                <label>Package</label>
                <select type="text" class="form-control" id="modalPackage" name="package" placeholder="Package" readonly>
                    <option>Charles Package</option>
                    <option>Carls Package</option>
                    <option>Charlies Package</option>
                    <option>Cybhees Package</option>
                </select>
                    <small class="form-text text-muted">Please select atleast 1 package</small>
                </div>
                <div class="form-group">
                    <div class="card" style="width: 18rem;">
                        <img id="imageModal" name="" class="card-img-top">
                        <input type="hidden" name="imageUrl" id="imageInput">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="comments" rows="3"  readonly></textarea>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-success" onclick="makeEditable()">Edit</button>
                    <button type="submit" name="reserv-submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal()">Close</button>
                </div>
                </form>
            </div>
            
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

    
    ';  
    }

    else {
        echo '	<p class="text-center text-danger"><br>You are currently not logged in!<br></p>
       <p class="text-center">In order to make a reservation you have to create an account!<br><br><p>';  
        
    }


    ?>

             
        </div>
    </div>
</div>
<br><br>

    

<script>

    // Run on page load
    window.onload = function() {

    // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
    if (sessionStorage.getItem('fname') == "fname") {
        return;
    }

    // If values are not blank, restore them to the fields
    var fname = sessionStorage.getItem('fname');
    if (fname !== null) $('#fname').val(fname);

    // If values are not blank, restore them to the fields
    var lname = sessionStorage.getItem('lname');
    if (lname !== null) $('#lname').val(lname);

    var email= sessionStorage.getItem('email');
    console.log(email);
    if (email!== null) $('#email').val(email);

    var date= sessionStorage.getItem('date');
    console.log(date);
    if (date!== null) $('#date').val(date);

    var time= sessionStorage.getItem('time');
    console.log(time);
    if (time!== null) $('#time').val(time);

    var guest= sessionStorage.getItem('guest');
    console.log(guest);
    if (guest!== null) $('#guest').val(guest);

    var package= sessionStorage.getItem('package');
    console.log(package);
    if (package!== null) $('#package').val(package);

    var phone= sessionStorage.getItem('phone');
    console.log(phone);
    if (phone!== null) $('#phone').val(phone);

    var comments= sessionStorage.getItem('comments');
    console.log(comments);
    if (comments!== null) $('#comments').val(comments);

    sessionStorage.clear();
    }

    

    // Before refreshing the page, save the form data to sessionStorage
    window.onbeforeunload = function() {
        sessionStorage.setItem("fname", $('#fname').val());
        sessionStorage.setItem("lname", $('#lname').val());
        sessionStorage.setItem("email", $('#email').val());
        sessionStorage.setItem("date", $('#date').val());
        sessionStorage.setItem("time", $('#time').val());
        sessionStorage.setItem("guest", $('#guest').val());
        sessionStorage.setItem("package", $('#package').val());
        sessionStorage.setItem("phone", $('#phone').val());
        sessionStorage.setItem("comments", $('#comments').val());
    }

    function populateModal() {
  // Get the values from the original form
  var modal = document.getElementById("myReservation");
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var date = document.getElementById("date").value;
  var time = document.getElementById("time").value;
  var guest = document.getElementById("guest").value;
  var package = document.getElementById("package").value;
  var phone = document.getElementById("phone").value;
  var comments = document.getElementById("comments").value;
        

  var imageDir = '<?php echo $_SESSION['newFileName']; ?>';
console.log(imageDir);

    // Get the img element in the modal
    var imageModal = document.getElementById("imageModal");

    // Set the src attribute of the img element to the image directory
    imageModal.src = "uploads/" + imageDir;
  
  // Set the values in the modal form
  document.getElementById("modalFname").value = fname;
  document.getElementById("modalLname").value = lname;
  document.getElementById("modalEmail").value = email;
  document.getElementById("modalDate").value = date;
  document.getElementById("modalTime").value = time;
  document.getElementById("modalGuest").value = guest;
  document.getElementById("modalPackage").value = package;
  document.getElementById("modalPhone").value = phone;
  document.getElementById("message").value = comments;

  document.getElementById("imageInput").value = "uploads/" + imageDir;
  

  // Show the modal
  modal.classList.toggle("show");
}

var select = document.querySelector('#modalAddons');
var menuName = localStorage.getItem('menuName');
var menuPrice = localStorage.getItem('menuPrice');
var option = document.createElement('option');
option.textContent = menuName + ' - ' + menuPrice;
select.appendChild(option);


function makeEditable() {
  var inputs = document.querySelectorAll("form input");
  for(var i = 0; i < inputs.length; i++){
    inputs[i].removeAttribute("readonly");
  }

  window.onload = function() {
    document.getElementById("button").onclick = function() {
      populateModal();
    }
  }
}
</script>


<script>


    
function uploadImage() {
    var form = document.getElementById("imageUploadForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
                alert("Upload Successfully!");
                window.location.reload();
            
        }
    }
    xhr.send(formData);
}

var modal = document.getElementById("myReservation");

// Add an event listener to close the modal when the background is clicked
modal.addEventListener("click", function(event) {
  if (event.target === modal) {
    if (modal.classList.contains("show")) {
        modal.classList.remove("show");
    } else {
        modal.classList.add("show");
    }
  }
});

  function closeModal() {
  document.getElementById("myReservation").classList.remove("show");
}

var select = document.querySelector('#addons');
var menuName = localStorage.getItem('menuName');
var menuPrice = localStorage.getItem('menuPrice');
var option = document.createElement('option');
option.textContent = menuName + ' - ' + menuPrice;
select.appendChild(option);


function acceptTerms() {
    document.getElementById("termsCheckbox").checked = true;
  }
</script>

<?php

if(isset($_FILES["image"])) {
    require 'includes/dbh.inc.php';

    $image = $_FILES["image"]["name"];
    $path = "img/" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $path);

    $query = "INSERT INTO reservation (path) VALUES ('$path')";
    mysqli_query($conn, $query);

}

?>


<?php
require "footer.php";
?>