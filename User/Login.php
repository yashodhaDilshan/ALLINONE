
<?php 
if(isset($_POST['Email']))  // Associate Array
{
	session_start();
	$_SESSION['email'] = $_POST['Email'];

	
}
?>

	<?php 
	
	$message="";
	
	if(isset($_POST['submit']))  // Associate Array
	{
		include("dbconnect.php");
		
		$Email = $_POST['Email'];
		$password  = $_POST['Password']; 
		
		if($Email == "" && $password == "")
		{
			$msg = "fill the boess";
			echo "<script type='text/javascript'>alert('$msg')</script>";
		}
		else
		{
			$sql = "SELECT * FROM users WHERE Email='$Email' and Password='$password'";			
	    	$result = mysqli_query($conn, $sql); 
		
			if(mysqli_num_rows($result) == 1 )
			{
				$row = mysqli_fetch_array($result);
				
				if($row["Type"] == "Admin")
				{
					$msg = "Admin Login succsessfull";
					echo "<script type='text/javascript'>alert('$msg')</script>";
					header("refresh:0; url=../Admin/Admin_Stock.php");			
				}
				
				else
				{					
					$msg = "user Login succsessfull";
					echo "<script type='text/javascript'>alert('$msg')</script>";
					header("refresh:0; url=Home.php");			
				}				
			}
		
			else
			{
				$msg = " Email or password is wrong ";
				echo "<script type='text/javascript'>alert('$msg')</script>";
			}
		}		
		
	}
	
	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/Login.css">
	
</head>

<body>
	<div class="main-box">		
		<div class="tital"><center><h1>Login</h1></center></div>	
		
		
		<form action="Login.php" method="post" enctype="multipart/form-data">	
			
			<div class="box">		
			<center>
				<div class="input-box">							
					
					<div class="button-box">
						
						<a href=""><div class="log1">Login</div></a>
						<a href="Signup.php"><div class="sign1">Sign up</div></a>
					</div>
					
				    <input type="Email"     name="Email"        placeholder=" Enter Email">
					<input type="password" name="Password"    placeholder=" Enter Password" >				
					
					<input type="submit" value="Login" name="submit" class="submitbtn">							
					<input type="reset"  value="Reset" id="reset"  class="resetbtn">
						
					<!--</form>-->
				
				</div>	
			</center>
			</div>		 
	  	</form>
   </div>
</body>
</html>