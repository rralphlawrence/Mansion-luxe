
<?php
include_once './includes/process.php';

if(isset($_SESSION['nameHolder'])){
  if($_SESSION['usertypeHolder'] == 'admin'){
      //wala na header dito kasi nasa dean side na naman tayo
     
  }
  else if($_SESSION['usertypeHolder'] == 'customer'){
       $userID =  $_SESSION ['userID'];
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
    <title>PROFILE | Mansion Luxe</title>
    <script src="/assets/js/menu.js" defer></script>
    <link rel="stylesheet" href="./assets/css/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>


  </head>


        <body>

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
                        <a href="cart.html">
                            <span aria-hidden="true">01</span>Cart
                        </a>

                    </li>
                    <li>
                        <a href="login.html">
                            <span aria-hidden="true">02</span>Login
                        </a>

                    </li>
                    <li>
                        <a href="profile.html">
                            <span aria-hidden="true">03</span>Account
                        </a>

                    </li>
                </ul>
            </nav>
        </header>

            <div class="wrapper1">
                <div class="left">
                    <img src="./assets/img/ice.jpg" 
                    alt="user" width="100" height="100">
                    <h4><?php echo $_SESSION['nameHolder'] ?></h4>
                     <p>Customer</p>
                </div>

                <?php
                      $sqlUserDetails = "SELECT * FROM customers WHERE id = ' $userID' ";
                      $customer = $conn ->query($sqlUserDetails) or die ($conn->error);
                      $UserResult = $customer->fetch_assoc();
                      
                 ?>
                <div class="right">
                    <div class="info">
                        <h3>Information</h3>
                        <div class="info_data">
                             <div class="data">
                                <h4>Email</h4>
                                <p><?php echo  $UserResult['Email']; ?></p>
                             </div>
                             <div class="data">
                               <h4>Phone</h4>
                                <p>09123456789</p>
                          </div>
                        </div>
                    </div>
                  
                  <div class="projects">
                        <h3>Address</h3>
                        <div class="projects_data">
                             <div class="data">
                                <h4>Recent</h4>
                                <p><?php echo  $UserResult['Address']; ?></p>
                             </div>
                             <div class="data">
                               <h4>CITY/PROVINCE</h4>
                                <p>ANGONO, RIZAL.</p>
                          </div>
                        </div>
                    </div>
                  
                    <div class="social_media">
                        <ul>
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                      </ul>
                  </div>
                </div>
            </div>

            <div class="wrapper2">
         
              <input type="radio" name="slider" checked id="home">
              <input type="radio" name="slider" id="blog">
              <input type="radio" name="slider" id="code">
             
              <nav>
                <label for="home" class="home"><i class='bx bxs-notification' ></i>UPDATES</label>
                <label for="blog" class="blog"><i class='bx bxl-shopify'></i>ORDER</label>
                <label for="code" class="code"><i class='bx bx-history' ></i>HISTORY</label>
                
                <div class="slider"></div>
              </nav>
              <section>
                <div class="content content-1">
                  <div class="notif">
                    <small>JANUARY 26, 2021</small>
                    <h4>You will claim your order today Nike  prepare 20000 for payment </h4>
                  </div>

                  <div class="notif">
                    <small>JANUARY 26, 2021</small>
                    <h4>You will claim your order today Nike  prepare 20000 for payment </h4>
                  </div>

                  <div class="notif">
                    <small>JANUARY 26, 2021</small>
                    <h4>You will claim your order today Nike  prepare 20000 for payment </h4>
                  </div>
                </div>
                <div class="content content-2">
                

                  <div class="cart-container cart-page">
                    <table>
                      <tr>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>Subtotal</th>
                      </tr>
                      <tr>
                          <td>
                              <div class="cart-info">
                                  <img src="./assets/img/product1.jpg" alt="">
                                  <div>
                                      <p>Red Printed Tshirt</p>
                                      <small>Price : 50000</small>
                                      <br>
                                      <a href="">Remove</a>
                                  </div>
                              </div>
                          </td>
                          <td><input type="number" name="" id="" value="1"></td>
                          <td> 50000</td>
                      </tr>
  
  
                      <tr>
                          <td>
                              <div class="cart-info">
                                  <img src="./assets/img/product1.jpg" alt="">
                                  <div>
                                      <p>Red Printed Tshirt</p>
                                      <small>Price : 50000</small>
                                      <br>
                                      <a href="">Remove</a>
                                  </div>
                              </div>
                          </td>
                          <td><input type="number" name="" id="" value="1"></td>
                          <td> 50000</td>
                      </tr>
  
                      <tr>
                          <td>
                              <div class="cart-info">
                                  <img src="./assets/img/product1.jpg" alt="">
                                  <div>
                                      <p>Red Printed Tshirt</p>
                                      <small>Price : 50000</small>
                                      <br>
                                      <a href="">Remove</a>
                                  </div>
                              </div>
                          </td>
                          <td><input type="number" name="" id="" value="1"></td>
                          <td> 50000</td>
                      </tr>
  
  
  
                  </table>
                    </div>


                </div>
                <div class="content content-3">
                  <div class="cart-container cart-page">
                  <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="./assets/img/product1.jpg" alt="">
                                <div>
                                    <p>Red Printed Tshirt</p>
                                    <small>Price : 50000</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" name="" id="" value="1"></td>
                        <td> 50000</td>
                    </tr>


                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="./assets/img/product1.jpg" alt="">
                                <div>
                                    <p>Red Printed Tshirt</p>
                                    <small>Price : 50000</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" name="" id="" value="1"></td>
                        <td> 50000</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="./assets/img/product1.jpg" alt="">
                                <div>
                                    <p>Red Printed Tshirt</p>
                                    <small>Price : 50000</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" name="" id="" value="1"></td>
                        <td> 50000</td>
                    </tr>



                </table>
                  </div>
                </div>
                
              </section>
            </div>
          
        </body>
</html>