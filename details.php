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

$productID = $_GET['ID'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details | Mansion luxe</title>
    <link rel="stylesheet" href="./assets/css/nav.css">
    <script src="/assets/js/menu.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
     integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                            <a href="home.php">
                                <span aria-hidden="true">00</span>Home
                            </a>

                        </li>
                        <li>

                        <?php
                                if(isset($_SESSION['isLoggedin'])){ ?>
                         <a href="cart.php">
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
                            <a href="profile.php">
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
               <div class="small-container single-product">
                 <?php
                      $sqlProductDetails = "SELECT * FROM products WHERE product_id = '$productID' ";
                      $customer = $conn ->query($sqlProductDetails) or die ($conn->error);
                      $productResult = $customer->fetch_assoc();
                      
                 ?>
                   <div class="row">
                       <div class="col-2">
                           <img src="./admin/Uploads/<?php echo $productResult['image']; ?>" alt="" width="100%" class="ProductImg" id="ProductImg">
                           <div class="small-img-row">
                               <div class="small-img-col">
                                <img src="./admin/Uploads/<?php echo $productResult['image']; ?>" alt="" width="100%" class="small-img" >
                               </div>
                               <div class="small-img-col">
                                <img src="./admin/Uploads/<?php echo $productResult['image']; ?>" alt="" width="100%" class="small-img" >
                               </div>
                               <div class="small-img-col">
                                <img src="./admin/Uploads/<?php echo $productResult['image']; ?>" alt="" width="100%" class="small-img" >
                               </div>
                               <div class="small-img-col">
                                <img src="./admin/Uploads/<?php echo $productResult['image']; ?>" alt="" width="100%" class="small-img" >
                               </div>
                           </div>
                       </div>
                       <div class="col-2">
                            <p>Bedsheets and pillowcases</p>
                            <h2><?php echo $productResult['product_name']; ?></h2>
                            <h3>₱ <?php echo $productResult['product_price']; ?></h3>
                            <select name="Psize" id="">
                                <option value="">Select size</option>
                                  <option value="single">single</option>
                                  <option value="Double">Double</option>
                                  <option value="Queen">Queen</option>
                                  <option value="King">King</option>
                         </select>
                         <input type="number" name="" id="" value=1>
                         <a href="" class="btn">Add to cart</a>
                         <h3>Product details</h3>
                         <br>
                         <small><?php echo $productResult['product_quantity'];?> stocks available</small>
                         <br>
                         <br>
                         <p><?php echo $productResult['product_desc']; ?></p>
                       </div>
                      
                   </div>
               </div>

                <div class="blank" style="height: 200px;"></div>
               <div class="product-section">
               <?php
		
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
          
                <button><a href="details.php?ID=<?php echo $rws['product_id'];?>">Details</a></button>
              </div>
              
            
              <?php	}	?>
              </div>

               <script>
                var ProductImg = document.getElementById('ProductImg');
                var SmallImg = document.getElementsByClassName('small-img');

                SmallImg[0].onclick = function(){
                    ProductImg.src =SmallImg[0].src;
                }
                SmallImg[1].onclick = function(){
                    ProductImg.src = SmallImg[1].src;
                }
                SmallImg[2].onclick = function(){
                    ProductImg.src = SmallImg[2].src;
                }
                SmallImg[3].onclick = function(){
                    ProductImg.src = SmallImg[3].src;
                }


            </script>

                
            </body>

          
</html>