<?php
require "header.php";
?>
    <!-- end of nav bar -->
    <br><br>
        <h3 class="text-center"><br>Menu<br></h3>   
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="menu">
                    <?php 
                        require 'includes/dbh.inc.php';

                        $sql = "SELECT * FROM menu";
                        $result = $conn->query($sql);
                        if(mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $image_url = $row['image_url'];
                                $menu_name = $row['menu_name'];
                                $price = $row['price'];
                                echo "
                                
                                <div class='card'>
                                        <img src='$image_url' class='card-img-top justify-center' style='margin:20px 20px 20px 20px ; display:block; margin: 0 auto; max-width: 200px; max-height: 200px; border-radius: 20%;  box-shadow: 5px 5px 10px #888888;';>
                                        <div class='menu-item-text'>
                                        <h3 class='menu-item-heading'>
                                        <span class='menu-item-name' style='margin:20px 20px 20px 20px ;'>$menu_name</span>
                                        <span class='menu-item-price' style='margin:20px 20px 20px 20px ;'>$price</span>
                                    </h3>
                                    <button type='button' class='btn btn-primary btn-sm add-button' style='margin:20px 20px 20px 20px ;'>Add + </button>
                                    </div>
                                

                                ";
    
                            }
                           
                        } else {
                            echo "no rows has been returned";
                        }

                        
                    ?>
                </div>     
            </div>
        </div>
    
    <br><br>
</div>
</div>

<script>
    document.querySelectorAll('.add-button').forEach(function(button){
    button.addEventListener('click', function(){
        var menuName = this.parentNode.querySelector('.menu-item-name').textContent;
        var menuPrice = this.parentNode.querySelector('.menu-item-price').textContent;
        localStorage.setItem('menuName', menuName);
        localStorage.setItem('menuPrice', menuPrice);
    });
});
</script>

<?php
require "footer.php";
?>