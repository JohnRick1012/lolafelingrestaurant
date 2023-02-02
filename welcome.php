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
    
        echo'<br>';



    

    
    
     //reservation form  
    echo ' 
    
    <h1> Welcome To Our Web App! <h1>

    
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

    


<?php
require "footer.php";
?>