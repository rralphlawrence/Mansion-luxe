<!DOCTYPE html>

<?php

?>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home | Mansion luxe</title>
            <link rel="stylesheet" href="../assets/css/styles.css">
            <script src="/assets/js/menu.js" defer></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
             integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
             crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>


        <body>
            <div class="split-screen">
               
                <div class="left">
                    <section class="copy">
                        <h2>MANSION LUXE</h2>
                        <p>Delightful beddings feels wonderful</p>
                    </section>

                </div>
                <div class="right">
                            <form autocomplete="off" class="forms" id="forms" action="process.php" method="POST">
                                <section class="copy sign">
                                    <h2 class="sign">Sign Up</h2>
                                    
                                </section>
                                <div class="login-container">
                                        <p style="color:rgb(87, 87, 87)">Already have an account? <a href=".././home.php">Log in</a></p>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                   

                                    <br>

                                <div class="input-container name" >
                                    <label for="fname">Full Name</label> 
                                    <input autocomplete="off" type="text"  id="fname" name="fname" onkeypress="return OnAlert(event)" onkeydown=" NowAlert();" required>
                                    <small id="alert" class="alert"></small>
                                    <i class='bx bx-check-shield' ></i>
                                    <i id="error" class='bx bx-error-alt'></i>
                                    
                                </div>
                                <div class="input-container name">
                                    <label for="bname">Address</label>
                                    <input autocomplete="off" type="text"  id="bname" name="address" required">
                                    <small id="alert"></small>
                                    <i class='bx bx-check-shield' ></i>
                                    <i class='bx bx-error-alt'></i>
                                </div>
                                <div class="input-container name">
                                    <label for="email">Email</label>
                                    <input autocomplete="off" type="email"  id="email" name="email" required placeholder="sample@gmail.com">
                                    <i class='bx bx-error-alt'></i>
                                    <i class='bx bx-check-shield' ></i>
                                </div>
                                <div class="input-container password">
                                    <label for="password">Password</label>
                                    <input autocomplete="off" type="password"  id="password" name="password" placeholder="Must be at least 6 characters" minlength="6" required>
                                    <i style="cursor: pointer;" class='bx bx-hide' id="eye" aria-hidden="true" onclick="toggle();"></i>
                                </div>
                                <input type="hidden" name="UserType" value="customer">
                                <div class="input-container cta">
                                        <button  type="submit" class="signup-btn" name="signup_btn">Sign up </button>
                                </div>
                              
                                    <br>
                                   
                              
                            </form>

                </div>

            </div>

<script>

        function OnAlert(evt){

            var error = document.getElementById('error');
            var name = document.getElementById('fname');
            var str  = document.getElementById("fname").value;
            var Alert = document.getElementById("alert");
         // Only ASCII character in that range allowed
                            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                 if ((ASCIICode < 65 || ASCIICode > 90) && (ASCIICode < 97 || ASCIICode > 122)){

                                     
                                    if((ASCIICode == 32 || ASCIICode == 45)){
                                        return true;
                                     }else{
                                            Alert.style.display="block";
                                        Alert.innerHTML="Only Alphabets allowed";
                                        Alert=false;
                                            error.style.display="block";
                                            error.style.color="#e74c3c";
                                        return false;
                                     }
                                     
                                 }else{
                                   
        
                                    return true;
                                 }
                                                              
        }
        

        
        
        </script>


<script>

        function NowAlert(){

        var error = document.getElementById('error');
        var name = document.getElementById('fname');
        var str  = document.getElementById("fname").value;
        var Alert = document.getElementById("alert");
            
        if(!((/^[a-zA-Z ]+$/.test(str)) || str.length == 0)) {
         name.style.color="#e74c3c";
         Alert.style.display="block";
         Alert.innerHTML="Only Alphabets allowed";
         Alert=false;
            error.style.display="block";
            error.style.color="#e74c3c";

        }else{

            Alert.style.display= "block";
             Alert.innerHTML="";
             name.style.color="black";
             error.style.display="none";
              Alert=true;
        }
      

        

        }
        
        
        </script>



        </body>
<script src="./assets/js/modal.js"></script>

 </html>