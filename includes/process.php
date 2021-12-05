<?php
session_start();
include_once "connect.php";


    if(isset($_POST["signup_btn"])){
        $Fname = $_POST["fname"];
        $Address = $_POST["address"];
        $Email = $_POST["email"];
        $Password = $_POST["password"];
        $UserType = $_POST["UserType"];
    
        if (emptyInputSignup($Fname, $Address, $Email,$Password,$UserType  ) !== false ){
            header("Location:./register.php?error=emptyinput");
            exit();

        }
       
        if (InvalidEmail( $Email ) !== false ){
            header("Location:./register.php?error=InvalidEmail");
            exit();

        }
        if (EmailExist( $conn, $Email,$Fname ) !== false ){
            header("Location:./register.php?error=EMAILTAKEN");
            exit();
           
        }
        createUser($conn , $Fname ,$Address , $Password, $UserType, $Email );


    }

    function emptyInputSignup(  $Fname, $Address, $Email,$UserType,$Password  ){
      
        
        if(empty($Email) || empty($Fname) || empty($Address) || empty($Password)|| empty($UserType)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function InvalidEmail( $Email ){
      
        
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function EmailExist($conn, $Email ,$Fname){
      
        $sqlemailExits = "SELECT * FROM customers where Email = ? OR FullName = ?;  ";
        $stmt = mysqli_stmt_init($conn );
       
        if(!mysqli_stmt_prepare($stmt, $sqlemailExits)){
            header("Location:./register.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss" , $Email,$Fname);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;


        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    
    function createUser($conn, $Email ,$Fname , $Password, $UserType, $Address){
      
        $sqlemailExits = "INSERT INTO `customers`(`FullName`, `Address`, `Email`, `password`, `UserType`)
         VALUES (?,?,?,?,?) ;";
        $stmt = mysqli_stmt_init($conn );
       
        if(!mysqli_stmt_prepare($stmt, $sqlemailExits)){
            header("Location:./register.php?error=stmtFailed");
            exit();
        }
            $hashedPass = password_hash($Password , PASSWORD_DEFAULT);


        mysqli_stmt_bind_param($stmt, "sssss" , $Email,$Fname,$Address, $hashedPass,$UserType);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location:./register.php?error=success");
        exit();
    }

    if(isset($_POST['login_btn'])){
        $Email = $_POST['email'];
        $Password = $_POST['password'];
    
        $sqlforNoAccount = "SELECT * FROM customers WHERE Email ='$Email'";
            $stmt = $conn->prepare($sqlforNoAccount);
            $stmt->execute();
            $result = $stmt->get_result();

    
        while ($row = $result->fetch_assoc()) {
                $iduser = $row['id'];
                $Fullname = $row['FullName'];
                $Email = $row['Email'];
                $UserType = $row['UserType'];
                $PasswordinDB = $row['password'];
        }
        
            if(password_verify($Password,$PasswordinDB) || $Password == $PasswordinDB){
                $_SESSION ['nameHolder'] = $Fullname;
                $_SESSION ['usertypeHolder'] = $UserType;
                $_SESSION ['UserId'] = $iduser;


                if($UserType == 'admin'){
                    header("Location:../admin/dashboard.php");
                    $_SESSION ['FullName'] = $Fullname ;
                    $_SESSION ['isLoggedin'] = true;


                    $_SESSION ['response'] = "Successfully Login!";
                        $_SESSION ['res_type']= "success";
                }
                if($UserType == 'customer'){
                    header("Location:.././home.php");
                    $_SESSION ['FullName'] = $Fullname ;
                    $_SESSION ['isLoggedin'] = true;
                    $_SESSION ['userID'] = $iduser;

                    $_SESSION ['response'] = "Successfully Login!";
                        $_SESSION ['res_type']= "success";
                }
    
            }else{
                $_SESSION ['response'] = "Please input your correct Employee ID and Password!";
                $_SESSION ['res_type']= "error";
                header("Location:.././home.php");
            }

          
    
    }

      
  
?> 


