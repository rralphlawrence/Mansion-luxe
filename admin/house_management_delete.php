<?php
	
	include_once '../includes/process.php';


	$house_id = $_REQUEST['id'];
		$query = "DELETE FROM products WHERE product_id = '$house_id'";
	$result = $conn->query($query);
	if($result === TRUE){

        
		echo "<script type = \"text/javascript\">
					alert(\"Property Successfully deleted\");
					window.location = (\"./products.php\")
				</script>";
	}
?>
