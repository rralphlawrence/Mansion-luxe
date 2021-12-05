<?php
include_once './include/header.php';
include_once './include/menu.php';
include_once './include/footer.php';
include_once '../includes/process.php';

if(!isset($_SESSION['isLoggedin'])){
    header("Location:../home.php");
}


if(isset($_SESSION['nameHolder'])){
    if($_SESSION['usertypeHolder'] == 'admin'){
        //wala na header dito kasi nasa dean side na naman tayo
        
    }
    else if($_SESSION['usertypeHolder'] == 'customer'){
        header("Location:../home.php");
    }else{
        header("Location:../home.php");
    }
  }

?> 
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
<main>

<div class="main-content">
        <div class="info-card">
            <div class="card">
           <div class="card-icon">
               <span><i class="fas fa-layer-group"></i></span>
           </div> 


           <?php
                            $query = "SELECT COUNT(UserType) AS Number_customers FROM customers";    
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                        ?>  
           <div class="card-details">
               <h4>PAYMENTS TODAY</h4>
               <h2><?= $row['Number_customers']; ?> <?php echo " "?></h2>
           </div>
           <a href="">View Payments</a>
        </div>
        <div class="card">
           <div class="card-icon">
               <span><i class="fas fa-users"></i></span>
           </div> 
           <div class="card-details">
               <h4>CLIENTS TOTAL REGISTER</h4>
               <h2> 45</h2>
           </div>
           <a href="">View Clients</a>
        </div>
        <div class="card">
           <div class="card-icon">
               <span><i class="fas fa-user-secret"></i></span>
           </div> 
           <div class="card-details">
               <h4>ACTIVE CLIENTS</h4>
               <h2>675</h2>
           </div>
           <a href="">View Active Clients</a>
        </div>
        
    </div>

    </div>

    </div> 
</main>