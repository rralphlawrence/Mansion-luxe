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
    <link rel="stylesheet" href="./assets/css/nav.css">
    <title>Add to cart | Mansion Luxe</title>
    <script src="/assets/js/menu.js" defer></script>
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
                            
                            
                          <?php  }
                          ?>
                            
                         

                        </li>
                        <li>
                        <?php
                                if(isset($_SESSION['isLoggedin'])){ ?>
                            <a href="profile..php">
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
                <div class="total-price">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td>500000</td>
                        </tr>
                        <tr>
                            <td>Shipping fee</td>
                            <td>500</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>250000</td>
                        </tr>
                    </table>
                </div>    
            </div>


        </body>
</html>