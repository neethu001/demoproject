<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

	
</head>
<body bgcolor="#c5d052f0" style="background-color:#c5d052f0">
					<?php
				$sql = "SELECT * FROM users";
if( isset($_GET['export']) ){
    $fname = mysqli_real_escape_string($con, htmlspecialchars($_GET['export']));
    $sql = "SELECT * FROM users WHERE fname ='$fname'";
}
$result = $con->query($sql);

?>


 
    


<?php

while($row = $result->fetch_assoc()){
$output = ''; 
?>
  


	<table class="table table-bordered">
  
	
	
<?php



 
 

 if(mysqli_num_rows($result) > 0)
 {
  while($row = $result->fetch_assoc()){
  $output .= '
   <table class="table table-bordered">
    <tr>
    <td>'.$row["fname"];' </td>
    <td>'.$row["dept"];'</td>
    </tr>
	</table>
  ';




 


  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

}

?>
		</table>	
		</div>
	</div>

 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    
    
    <br />
    
   </div>  
  </div>  
 </body>  
</html>
