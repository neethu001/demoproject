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
	

	<?php 
	$error_message = "";$success_message = "";

	// Register user
	if(isset($_POST['btnsignup'])){
		$fname = trim($_POST['fname']);
		$dept = trim($_POST['dept']);
		$sem = trim($_POST['sem']);
		$dob = trim($_POST['dob']);
		$uninumber = trim($_POST['uninumber']);
		$phnum = trim($_POST['phnum']);
		$address = trim($_POST['address']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmpassword = trim($_POST['confirmpassword']);

		$isValid = true;

		// Check fields are empty or not
		if($fname == '' || $dept == '' || $sem == '' || $dob == '' || $uninumber == '' || $phnum == '' || $address == '' || $email == '' || $password == '' || $confirmpassword == ''){
			$isValid = false;
			$error_message = "Please fill all fields.";
		}

		// Check if confirm password matching or not
		if($isValid && ($password != $confirmpassword) ){
			$isValid = false;
			$error_message = "Confirm password not matching.";
		}

		// Check if Email-ID is valid or not
		if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	$isValid = false;
		  	$error_message = "Invalid Email-ID.";
		}

		if($isValid){

			// Check if Email-ID already exists
			$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			if($result->num_rows > 0){
				$isValid = false;
				$error_message = "Email-ID is already existed.";
			}
			
		}

		// Insert records
		if($isValid){
			$insertSQL = "INSERT INTO users(fname,dept,sem,dob,uninumber,phnum,address,email,password ) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($insertSQL);
			$stmt->bind_param("sssssssss",$fname,$dept,$sem,$dob,$uninumber,$phnum,$address,$email,$password);
			$stmt->execute();
			$stmt->close();

			$success_message = "Account created successfully.";
		}
	}
	?>
</head>
<body bgcolor="#c5d052f0" style="background-color:#c5d052f0">
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<h2></h2>
			</div>

			<div class='col-md-6' >
					
				<form method='post' style="margin:0  auto"   action=''>

					<h2 align="justify" style="color:#000099;">Registration</h2>
					<?php 
					// Display Error message
					if(!empty($error_message)){
					?>
						<div class="alert alert-danger">
						  	<strong>Error!</strong> <?= $error_message ?>
						</div>

					<?php
					}
					?>

					<?php 
					// Display Success message
					if(!empty($success_message)){
					?>
						<div class="alert alert-success">
						  	<strong>Success!</strong> <?= $success_message ?>
						</div>

					<?php
					}
					?>
				
					<div class="form-group">
					    <label for="fname">First Name:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="fname" id="fname" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname"> Department:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="dept" id="dept" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Semester</label>
					    <input type="text" class="form-control"  style="width:70%;"  name="sem" id="sem" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Date of Birth</label>
					    <input type="text" class="form-control"  style="width:70%;"  name="dob" id="dob" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">University Number:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="uninumber" id="uninumber" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Phone number:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="phnum" id="phnum" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Address:</label>
					    <input type="textarea" class="form-control" style="width:70%;"  name="address" id="address" required="required" maxlength="80">
					</div>
				
					<div class="form-group">
					    <label for="email">Email address:</label>
					    <input type="email" class="form-control" style="width:70%;"  name="email" id="email" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="password">Password:</label>
					    <input type="password" class="form-control" style="width:70%;"   name="password" id="password" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="pwd">Confirm Password:</label>
					    <input type="password" class="form-control" style="width:70%;"  name="confirmpassword" id="confirmpassword" required="required" maxlength="80">
					</div>
					
					<button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
				</form>
				
			</div>
			<form style="margin:10% 55%;">
				<h2>Search</h2></form>
				<?php
				$sql = "SELECT * FROM users";
if( isset($_GET['search']) ){
    $fname = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM users WHERE fname ='$fname'";
}
$result = $con->query($sql);
?>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<?php
while($row = $result->fetch_assoc()){
    ?>
	<table class="table table-bordered">
    <tr>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['dept']; ?></td>
    <td><?php echo $row['sem']; ?></td>
    <td><?php echo $row['dob']; ?></td>
    <td><?php echo $row['uninumber']; ?></td>
	<td><?php echo $row['phnum']; ?></td>
	<td><?php echo $row['address']; ?></td>
	<td><?php echo $row['email']; ?></td>
    </tr>
	</table>

	<?php
	$connect = mysqli_connect("localhost", "root", "", "tutorial");
$output = '';

if(isset($_POST["export"]))
{

 echo "hi";
 
 


 if(mysqli_num_rows($result) > 0)
 {
 $output = '';

  $output .= '  
   <table class="table" bordered="1">  
                    <tr>  
                         <th>First Name:</th>  
                         <th>Department</th>  
                         <th>Semester</th>  
       <th>Date of Birth</th>
       <th>University Number</th>
	    <th>Phone number</th>
		 <th>Address</th>
		  <th>Email address</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["fname"].'</td>  
                         
						
						 <td>'.$row["dept"].'</td>
						 <td>'.$row["sem"].'</td>
						 <td>'.$row["dob"].'</td>
						 <td>'.$row["uninumber"].'</td>
						 <td>'.$row["phnum"].'</td>  
                         <td>'.$row["address"].'</td>  
       <td>'.$row["email"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
   
 }
}?>
    <?php
}
?>
			
		</div>
	</div>
	----------------------------
	<?php
$connect = mysqli_connect("localhost", "root", "", "tutorial");
$sql = "SELECT * FROM users";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    
   
    <br />
    <form method="post" action="my.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
 </body>  
</html>
---------------------------------
</body>
</html>