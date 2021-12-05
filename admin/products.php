<?php
include_once './include/header.php';
include_once './include/menu.php';
include_once './include/footer.php';
include_once '../includes/process.php';

if(!isset($_SESSION['isLoggedin'])){
    header("Location:../home.php");
}

?>
<body>

<div class="print">
    <span data-tooltip="PRINT RECORDS">
        <button type="button" data-modal-target="#modal" class="buttonss" id="btnPrint">
            <span class="button__texts">PRODUCTS</span>
            <span class="button__icons">
            <ion-icon name="receipt-outline"></ion-icon>
        </span>
        </button>
    </span>
      
</div>
<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to approve this Property?")){
	            window.location.href='house_management_approve.php?id='+id;	    
			}
		}
    
		function sureToDelete(id){
			if(confirm("Are you sure you want to delete this Property?")){
				window.location.href='house_management_delete.php?id='+id;
			}
		}
		function sureToEdit(id){
			if(confirm("Are you sure you want to Edit this Property?")){
				window.location.href='house_management_edit.php?id='+id;
			}
		}



	</script>
</head>
<body>





			
					<table class="table users content-table table">
					
						<thead>
							
								<th>PRODUCT ID</th>
								<th>PRODUCT NAME</th>
								
		
								<th>DETAILS</th>
								<th>QUANTITY</th>
								<th>PRICE</th>															
								<th> IMAGE</th>							
								<th> Action</th>
						</thead>		

							
							<?php
								$select = "SELECT * FROM products ORDER BY product_id DESC";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
							
								<td><?php echo $row['product_id'] ?></td>
								<td><?php echo $row['product_name'] ?></td>
								<td><?php echo $row['product_desc'] ?></td>
								<td><?php echo $row['product_quantity'] ?></td>
								<td><?php echo $row['product_price'] ?></td>
            					<td><img class="thumb" src="./Uploads/<?php echo $row['image'];?>" width="150" height="200"></td>
								<td><a href="javascript:sureToDelete(<?php echo $row['product_id'];?>)" class="ico del"><font color="red">Delete</font></a><a href="javascript:sureToEdit(<?php echo $row['product_id'];?>)" class="ico edit"> Edit</a></td>
							</tr>
							<?php
								}
							?>
						</table>

                        <?php
							if(isset($_POST['send'])){
								
								$target_path = "./Uploads/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
								
								$image = basename($_FILES['image']['name']);
								
								
								
								$product = $_POST['Productname'];
								
								$description = $_POST['ProductDesc'];
								$pquantity = $_POST['Quantity'];
								$Pprice = $_POST['Price'];
							
								
								
								$qr = "INSERT INTO products (product_name,image,product_desc,product_quantity,product_price) 
													VALUES ('$product','$image','$description','$pquantity','$Pprice')";
								$res =mysqli_query($conn,$qr) or die(mysqli_error($conn));
								if($res>0){
									echo "<script type = \"text/javascript\">
											alert(\"Property added successfully\");
											window.location = (\"products.php\")
											</script>";
									}
								}
								else 
								{
									echo "<script type = \"text/javascript\">
											alert(\"Property not added. Try again.\");
											window.location = (\"products.php\")
											</script>";
								}
							}
						?>
            <div class="modal" id="modal">
                <div class="modal-header">
                     <div class="title"></div>
                        <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form action="products.php" method="post" enctype="multipart/form-data">
						
						<div class="form">
  						
								<p>
									
									<label>PRODUCT NAME <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="Productname" required="required" />
								</p>
								
								<p>
									<span class="req">PRODUCT IMAGE</span>
									<label>IMAGE <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image" required="required" />
								</p>
								<p>
									
									<label>DETAILS <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="ProductDesc" required="required" />
								</p>
								<p>
									
									<label>QUANTITY<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="Quantity" required="required" />
								</p>
								<p>
									
									<label>PRICE <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="Price" required="required" />
								</p>
							
							
						</div>
						
						<div class="cta">
					
					<input type="submit" class="sumit-btn" value="submit" name="send" />
						</div>
					</form>
                        </div>
                   </div>

                   
                   <div id="overlay"></div>

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

<script>

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal)
})
})

overlay.addEventListener('click', () => {
const modals = document.querySelectorAll('.modal.active')
modals.forEach(modal => {
    closeModal(modal)
})
})

closeModalButtons.forEach(button => {
button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
})
})

function openModal(modal) {
if (modal == null) return
modal.classList.add('active')
overlay.classList.add('active')
}

function closeModal(modal) {
if (modal == null) return
modal.classList.remove('active')
overlay.classList.remove('active')
}
</script>

<script>
                function onlyNumberKey(evt) {
        
                                 // Only ASCII character in that range allowed
                                 var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                 if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                        return false;
                                return true;

                            
                        }
                    

                    </script>