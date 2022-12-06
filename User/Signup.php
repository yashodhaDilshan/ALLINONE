
<?php 	
	include("dbconnect.php");
	 $message="";
	
	if(isset($_POST['submit']))  // associative array
	{	
		
		$Name = $_POST['Uname'];
		$email = $_POST['Email'];
        $T_no = $_POST['Te_Number'];
        $Pass = $_POST['Password'];        

        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $temp_name = $_FILES['image']['tmp_name'];
    
        $upload_to = 'image/';
    
        move_uploaded_file($temp_name, $upload_to . $file_name);

        $url = $upload_to . $file_name;

		if($Name == "" || $email == "" || $T_no == "" || $Pass == "" )
        {
          	$alert = "<script> alert('Empty text boes');</script>";	
			echo "$alert"; 

        }

        else{

          $sql2 = "INSERT INTO users( UName, Email, Te_No, Type, Password, Image) VALUES('$Name','$email','$T_no','User','$Pass','$url')";	
			    $results2 = mysqli_query($conn, $sql2); 
			
			    if(!$results2)
			    {
				    $alert = "<script> alert(' User Registration Fail');</script>";	
				    echo "$alert"; 
			    }
			    else
			    {				  
			      	$alert = "<script> alert('user registered successfully');</script>";	
				    echo "$alert"; 
				    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Login.php">';
			    }	 
        }			  
	    } 	

	  ?>

	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="css/Signup.css">

	<style>
		.main-box{
			width: 25%;
			height: 650px;
			margin-top:15px;		
		}
	</style>
	
</head>

<body>
	<div class="main-box">		
		<div class="tital"><center><h1>Sign up</h1></center></div>	
		
		
		<form action="Signup.php" method="post" enctype="multipart/form-data">	
			
			<div class="box">		
			<center>
				<div class="input-box">					
					
					<div class="button-box">
						
						<a href="Login.php"><div class="sign1">Login</div></a>
						<a href=""><div class="log1">Sign up</div></a>
					</div>
					
					<input type="text"    class="form-control" name="Uname"     id="Uname"     placeholder="User Name" autofocus><br/>    
                  	<input type="Email"   class="form-control" name="Email"     id="Email"     placeholder="Email"><br/>  
                  	<input type="Number"  class="form-control" name="Te_Number" id="Te_Number" placeholder="Telephone Number" ><br/>                   
                  	<input type="Password"class="form-control" name="Password" id="Password" placeholder="Password" ><br/>                   
						
					<input type="file" name="image" ><br/> 				
					
					<input type="submit" value="Signup" name="submit" class="submitbtn">	
					
					
					<input type="reset"  value="Reset" id="reset"  class="resetbtn">
						
					<!--</form>-->
				
				</div>	
			</center>
		 </div>		 
	  </form>
   </div>
</body>
</html>