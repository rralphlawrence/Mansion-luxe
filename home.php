<?php
include_once './includes/process.php';

if(isset($_SESSION['nameHolder'])){
  if($_SESSION['usertypeHolder'] == 'admin'){
      //wala na header dito kasi nasa dean side na naman tayo
     
  }
  else if($_SESSION['usertypeHolder'] == 'customer'){
      
  }else{
      header("Location:home.php");
  }
}

?>


<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home | Mansion luxe</title>
            <link rel="stylesheet" href="./assets/css/styles.css">
            <script src="/assets/js/menu.js" defer></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
             integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
             crossorigin="anonymous" referrerpolicy="no-referrer" />


             <link rel="stylesheet" href="./assets/styles/sweetalert.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="./assets/js/sweetalert.min.js"></script>

        </head>


        <body>
<div class="cover-background">
            <header class="primary-header flex">
                <div>
                    <img class="logo" src="./assets/img/mansiin.png" alt="logo-mansion-luxe">
                </div>
                
         <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false"> 
             <span class="sr-only"></span> </button>

                <nav>
                    <ul id="primary-navigation" data-visible="false" class="primary-navigation flex" data-visible="false">
                        <li class="active">
                            <a href="home.html">
                                <span aria-hidden="true">00</span>Home
                            </a>

                        </li>
                        <li>

                        <?php
                                if(isset($_SESSION['isLoggedin'])){ ?>
                         <a href="cart.html">
                                <span aria-hidden="true">01</span>Cart
                            </a>
                            <?php    }else{ ?>
                              <a href="./includes/register.php">
                                <span aria-hidden="true">03</span>Sign up
                            </a>
                            
                          <?php  }
                          ?>
                            

                        </li>

                   
                        <li>
                          <?php
                                if(isset($_SESSION['isLoggedin'])){ ?>
                               <a href="Logout.php"> <span aria-hidden="true">02</span>Logout</a>
                            <?php    }else{ ?>
                              <a data-modal-target="#modal" href="#"> <span aria-hidden="true">02</span>Login</a>
                            
                          <?php  }
                          ?>
                            
                         

                        </li>
                        <li>
                        <?php
                                if(isset($_SESSION['isLoggedin'])){ ?>
                            <a href="profile.html">
                                <span aria-hidden="true">03</span>Account
                            </a>
                            <?php    }else{ ?>
                              <a href="">
                                <span aria-hidden="true">03</span>About
                            </a>
                            
                          <?php  }
                          ?>
                            
                            

                        </li>
                    </ul>
                </nav>
            </header>

                    <div class="wrapper">
                        <div class="img-wrapper">
                            <img src="./assets/img/logonamin.png" alt="logo-mansion">
                        </div>

                        <h2>MANSION <span> LUXE</span></h2>
                        <p>Delighting beddings, feels wonderful</p>

                        <a href="">SHOP NOW</a>
                    </div>

                    <div class="modal" id="modal">
                      <div class="modal-header">
                        <div class="title">Log In</div>
                        <button data-close-button class="close-button">&times;</button>
                      </div>
                      <div class="modal-body">
                        
                              <form action="./includes/process.php" method="POST">
                               
                                 
                                  <div class="input-container email">
                                      <label for="email">Email</label>
                                      <input type="email"  id="email" name="email"  placeholder="example@domain.com" required>
                                  </div>
                                  <div class="input-container password">
                                      <label for="password">Password</label>
                                      <input type="password"  id="password" name="password" placeholder="cover your password" required>
                                      <i style="color:grey; cursor:pointer;" id="eye" class='bx bx-hide' aria-hidden="true" onclick="toggle();"></i>
                                  </div>
                                 
                                       
                                  <div class="login-container">
                                      <p>You don't have an account? <a href="./includes/register.php">Sign Up</a></p>
                                  </div>
                                     
                                      <br>
                                  <div class="input-container cta">
                                          <button class="signup-btn" type="submit" name="login_btn">Log In</button>
                                  </div>
                                  <br>
                                                  
                              </form>
              
               
              
                      </div>
                    </div>
                    <div id="overlay"></div>
              

        </div>
      

        <div class="product-section">

        <?php
						include_once './includes/process.php';
						$sel = "SELECT * FROM products";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
							
			?>
            <div class="card">
                <img
                  src="./admin/Uploads/<?php echo $rws['image'];?>"
                />
                <div class="card-content">
                  <h1><?php echo $rws['product_name'];?></h1>
                  <p class="price"><?php echo $rws['product_price'];?></p>
                  <p>stock <?php echo $rws['product_quantity'];?> </p>
                </div>
          
                <button><a href="details.php?ID=<?php echo $rws['product_id']?>">Details</a></button>
              </div>
              
            
              <?php	}	?>
              </div>



         <?php 
            if (isset($_SESSION['response']) && $_SESSION['response'] !='') { ?>

            <script>
            swal({
                title: "<?php echo $_SESSION['response']?>",
                icon: "<?php echo $_SESSION['res_type']?>",
                button: "Done",
            });
            </script>
        
            <?php
                 unset($_SESSION['res_type']); 
                unset($_SESSION['response']); }
            ?>
        </body>
<script src="./assets/js/modal.js"></script>

 </html>