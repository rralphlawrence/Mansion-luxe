<?php
include_once './include/header.php';
include_once './include/menu.php';
include_once './include/footer.php';
include_once '../includes/process.php';

if(!isset($_SESSION['isLoggedin'])){
    header("Location:../home.php");

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
}



if(isset($_POST['delete_btn_confirm'])){
    $EmpID=$_POST['delete_id_confirm'];

    $sqlforAccounts="DELETE FROM customers WHERE id=?";
    $sqlforProfiles="DELETE FROM customers WHERE id=?";

    $stmt = mysqli_stmt_init($conn);


    if(!mysqli_stmt_prepare($stmt, $sqlforProfiles)){
        echo "SQL Error";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$EmpID);
        mysqli_stmt_execute($stmt);
    }



    if(!mysqli_stmt_prepare($stmt, $sqlforAccounts)){
        echo "SQL Error";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$EmpID);
        mysqli_stmt_execute($stmt);
    }

}

?>

<script type="text/javascript">
		
    
		function sureToDelete(id){
			if(confirm("Are you sure you want to delete this Property?")){
				window.location.href='house_management_delete.php?id='+id;
			}
		}
	</script>

<table class="table users content-table table">
					
                    <thead>
                        
                            <th>CUSTOMER ID</th>
                            <th>CUSTOMER NAME</th>
                            
    
                            <th>ADDRESS</th>
                            <th>EMAIL</th>															
                            <th> DATE JOINED</th>							
                            <TH>ACTIONS</TH>
                    </thead>		

                        
                        <?php
                            $select = "SELECT * FROM customers WHERE UserType ='customer' ORDER BY id DESC";
                            $result = $conn->query($select);
                            while($row = $result->fetch_assoc()){
                        ?>
                        <tr>
                        
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['FullName'] ?></td>
                            <td><?php echo $row['Address'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['DateCreated'] ?></td>
                          
                            <td><a href="javascripit:void(0)" class="delete-confirm""><font color="red">Delete</font></a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <script>

$(document).ready(function () {

    $('.delete-confirm').on('click', function(e){

        e.preventDefault();

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        var deleteid = data[0];
        

        swal({
         title: "Are you sure to delete this account?",
         icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        
        $.ajax({
            type: "POST",
            url: "customers.php", 
            data: {
                "delete_btn_confirm":1,
                "delete_id_confirm": deleteid,
            },
         success: function(result){
            swal({
                title: "Successfully Account Deleted!",
                icon: "success",
            }).then((result) => {
                location.reload();
            });
        }
});
   
} 

});
    });

});

</script>