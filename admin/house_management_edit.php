
<?php
	include_once './include/header.php';
	include_once './include/menu.php';
	



if(isset($_GET['id'])){

$id = $_GET['id'];
$select = mysqli_query($conn,"SELECT * FROM products WHERE product_id = '$id'") or die(mysqli_error($conn));
$selresult = mysqli_fetch_array($select);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

   
</head>
<body>


				
					
					<form action="house_management_edit.php?id=<?php echo $selresult['product_id'] ?>" method="post" enctype="multipart/form-data">
						
						<div class="form">
  						
								<p>
									
									<label>Property Type <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="ProductName" value="<?php echo $selresult['product_name']; ?>" required="required" />
								</p>
								
							
								<p>
									
									<label>Property Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="Productdesc" value="<?php echo $selresult['product_desc']; ?>" required="required" />
								</p>
								<p>
									
									<label>Property Location <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="ProductQ" value="<?php echo $selresult['product_quantity']; ?>" required="required" />
								</p>
								<p>
									
									<label>Location Description <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="ProductPrice" value="<?php echo $selresult['product_price']; ?>" required="required" />
								</p>
									
							
						</div>
						
						<div class="cta">
						
					
					<input type="submit" value="UPDATE" name="send" />
			</div>
						

<?php
                        include_once '../includes/process.php';
                        $house_id = $_GET['id'];
							if(isset($_POST['send'])){

								$productname = $_POST['ProductName'];
								
								$Product_desc = $_POST['Productdesc'];
								$Product_quantity = $_POST['ProductQ'];
								$product_price = $_POST['ProductPrice'];
							
								
								
								$qr = "UPDATE products SET product_name='$productname', product_desc='$Product_desc',product_quantity='$Product_quantity' , product_price='$product_price' WHERE product_id = '$house_id'";
								$res =mysqli_query($conn,$qr) or die(mysqli_error($conn));
								if($res){
									echo "<script type = \"text/javascript\">
											alert(\"Property Updated successfully\");
											window.location = (\"./products.php\")
											</script>";
									}
								else 
								{
									echo "<script type = \"text/javascript\">
											alert(\"Property not Updated. Try again.\");
											window.location = (\"./products.php\")
											</script>";
								}
							}
						?>
					</form>
					
			
			
		
					
				
						
					
						
						
					
			
		


	
</body>
</html>