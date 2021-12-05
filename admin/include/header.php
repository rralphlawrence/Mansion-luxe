<?php  ob_start(); 
include_once '../includes/process.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/maindesign.css">

    <!-- Boxicons CDN Link -->

    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>

     <!-- CHARTS -->
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript" src="https://www.google.com/jsapi"></script>


    
     <title>Single Entry Accounting</title>
    <link rel="shortcut icon" type="image/png " href="../img/logo.png">


    <link rel="stylesheet" href="../assets/styles/sweetalert.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="../assets/js/sweetalert.min.js"></script>


   </head>
   <body>
   <header class="header">
            <div class="header__container">
                <img src="assets/img/perfil.jpg" alt="" class="header__img">

                <a href="#" class="header__logo"><?php echo $nameHolder = $_SESSION['nameHolder'] ?></a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>
    </body>

    
   
</html>