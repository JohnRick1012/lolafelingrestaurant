<?php
require "header.php";
?>
    
<br><br>
<div class="container">
<h3 class="text-center"><br>View Menu<br></h3>     

<?php
    if(isset($_SESSION['user_id'])){
        echo '

        
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#menuModal" style="margin-bottom: 10px">
  Add Menu
</button>


        <p class="text-white bg-dark text-center">'. $_SESSION['username'] .', Here you can check your reservation history</p><br>';

        if(isset($_GET['error3'])){
            if($_GET['error3'] == "emptyfields") {   //douleuei bazw ta errors apo ta headers.. prp na bgalw to requiered
                echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
            }
            else if($_GET['error3'] == "invalidMenuname") {   
                echo '<h5 class="bg-danger text-center">Invalid First Name, Please try again!</h5>';
            }
            else if($_GET['error3'] == "invalidlPrice") {   
                echo '<h5 class="bg-danger text-center">Invalid Last Name, Please try again!</h5>';
            }
            
        }
            if(isset($_GET['menu'])) {   
               if($_GET['menu'] == "success"){ 
                echo '<h5 class="bg-success text-center">Your menu upload was successfull!</h5>';
            }
            }
            echo'<br>';
        
    
    if(isset($_GET['delete'])){
        if($_GET['delete'] == "error") {   //douleuei bazw ta errors apo ta headers.. prp na bgalw to requiered
            echo '<h5 class="bg-danger text-center">Error!</h5>';
        }
        if($_GET['delete'] == "success"){ 
            echo '<h5 class="bg-success text-center">Delete was successfull</h5>';
        }
    }  
    require 'includes/view.menu.inc.php';
    
 }
    else {
        echo '	<p class="text-center text-danger"><br>You are currently not logged in!<br></p>
       <p class="text-center">In order to make a reservation you have to create an account!<br><br><p>';   
    }
    
    echo '

    <!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="includes/menu.inc.php" method="post" id="originalForm">
      <div class="form-group">
      <div class="card" style="width: 18rem;">
        <img id="imageModal" name="" class="card-img-top">
        <input type="hidden" name="imageUrl" id="imageInput">
      </div>
      </div>
    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" class="form-control" name="name" id="name">
    </div>

    <div class="form-group">
        <label for="price">Price: </label>
        <input type="text" class="form-control" name="price" id="email">
    </div>

    <div class="form-group">
    <label for="name">Upload Menu Image First: </label>
    <button type="button" class="btn btn-primary" data-bs-show="modal" data-bs-target="#uploadModal" id="uploadImageBtn"> Upload Image </button>
    </div>

    <div class="form-group">
    <button type="submit" name="reserv-submit" class="btn btn-primary">Submit</button>
    </div>

  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Close</button>
      </div>
    </div>
  </div>
</div>';
?>

        



        <!-- Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Image of Dish</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form action="upload_menu.php" method="post" enctype="multipart/form-data" id="imageUploadForm">
                <div class="form-group">
                        Select Image File to  Upload:
                        <input type="file" name="imageUpload" id="imageUpload" required="required">
                        <button type="submit" class="btn btn-primary" onclick="uploadImage(event)">Upload</button>
                    <small class="form-text text-muted">Minimum downpayment is 50%  and Please make sure that the receipt is correct. </small>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Close</button>
            </div>
            </div>
        </div>
        </div>

</div>
<br><br>

<script>
function uploadImage(event) {
    event.preventDefault();
    var form = document.getElementById("imageUploadForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload_menu.php", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
                alert("Upload Successfully!");
               
            
        }
    }
    xhr.send(formData);

    var imageDir = '<?php echo $_SESSION['newFileName']; ?>';
    console.log(imageDir);

    // Get the img element in the modal
    var imageModal = document.getElementById("imageModal");

    // Set the src attribute of the img element to the image directory
    imageModal.src = "uploads/" + imageDir;

    document.getElementById("imageInput").value = "uploads/" + imageDir;

}

</script>

<script>

document.getElementById("uploadImageBtn").addEventListener("click", function(e) {
        e.preventDefault();
        $("#menuModal").modal({
            backdrop: "static",
            keyboard: false
        });
        $("#uploadModal").modal("show");
    });

    $("#menuModal").on("hide.bs.modal", function(e) {
        if ($("#uploadModal").is(":visible")) {
            e.preventDefault();
        }
    }); 
</script>


<?php
require "footer.php";
?>