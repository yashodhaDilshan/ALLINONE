<?php 
include("dbconnect.php");

session_start();
if(!isset($_SESSION['email']))  // Associate Array
{	
	header("location:../User/Login.php");
}

$email = $_SESSION['email'];

$sql_s = "SELECT * FROM users WHERE Email='$email' ";			
$result_s = mysqli_query($conn, $sql_s); 
$row_s = mysqli_fetch_array($result_s);

$UName = $row_s["UName"];
$Id = $row_s["Uid"];
$UImage = $row_s["Image"];


$sql_qry = "SELECT SUM(Total) AS count FROM payment ";
$duration = $conn->query($sql_qry);
$record = $duration->fetch_array();
$total = $record['count'];

  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    
    <link rel="stylesheet" href="css/Add_User.css"> 

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    
<style>
    .sidebar li{ position: relative; margin: 8px 0; list-style: none; margin-left: -0px;}
    .home-section{margin-top:-25px; min-height:800px;}
</style>

</head>
<body>

  <div class="main_Wrap">

    <!------------------ Start Side Navigation -------------------->
      <div class="sidebar">
        <div class="logo-details">          
          <div class="logo_name" style="margin-left:50px" >ALLINONE</div>
          <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
            <a href="../User/Home.php">
              <i class='bx bx-home-alt'></i>
              <span class="links_name">Site</span>
            </a>
            <span class="tooltip">Site</span>
          </li>
          <li>
            <a href="Admin_Stock.php">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Stock</span>
            </a>
            <span class="tooltip">Stock</span>
          </li>
          <li>
            <a href="Admin_Payment.php">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Payments</span>
            </a>
            <span class="tooltip">Payments</span>
          </li>
          
          <li>
            <a href="Admin_Category.php">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Category</span>
            </a>
            <span class="tooltip">Category</span>
          </li>
          <li>
            <a href="Admin_Sub_Category.php">
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Sub Category</span>
            </a>
            <span class="tooltip">Sub Category</span>
          </li>          
          
          <li>
            <a href="Admin_User.php">
              <i class='bx bx-user' ></i>
              <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
          </li>  
           
          <li class="profile">
            <div class="profile-details">           
              <div class="name_job">
                <div class="name"><?php echo $UName; ?></div>
                <div class="job">Admin</div>
              </div>
            </div>
            <a href="../User/Logout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
          </li>
        </ul>
      </div>
  
    <!------------------ End Side Navigation -------------------->


    <!--------------------- Start content ----------------------->

      <section class="home-section">

        <div class="text">Payment</div>        

          <div class="conten">        
            <div class="buttons-div">
              
            <h3>All Payment Total : LKR  <?php echo $total;  ?> </h3>
              
            </div>
    
            <table class="table" style=" margin-top: -20px;">
              <thead class="thead-dark">
                <tr>
                    <th class="collom3" scope="col"> Payment Id </th>
                    <th class="collom2" scope="co1"> Customer Name </th>
                    <th class="collom3" scope="co1"> Product Name </th>  
                    <th class="collom3" scope="co1"> Quantity </th>              
                    <th class="collom4" scope="col"> Total </th>
                    
              </thead>

              <?php		
               
                $sql = "SELECT * FROM payment";
                $result = mysqli_query($conn,$sql);				
						    while($row = mysqli_fetch_array($result))
					       {	
                    $PID = $row['PID']; 
                    $Uid = $row['UID'];

                    $sql_n = "SELECT * FROM product WHERE PId = '$PID' ";
                    $result_n = mysqli_query($conn,$sql_n);	
                    $row_n = mysqli_fetch_array($result_n);

                    $PName = $row_n['PName']; 

                    $sql_na = "SELECT * FROM users WHERE Uid = '$Uid' ";
                    $result_na = mysqli_query($conn,$sql_na);	
                    $row_na = mysqli_fetch_array($result_na);

                    $UName = $row_na['UName']; 

				      ?>

              <tbody>
              <tr>
              <th scope="row"><div class="CId"><?php echo $row['PaymentID']; ?></div></th>

              <td><div class="description"><?php echo $UName; ?></div> </td>
              
              <td><div class="description"><?php echo $PName; ?></div> </td>
              

              <td><div class="description"><?php echo $row['Quentity']; ?></div> </td>


              <td><div class="description"><?php echo $row['Total']; ?></div> </td>
              
            </tr>  
              </tbody>

              <?php } ?>

            </table> 
          </div>
      </section>

    <!--------------------- End content ----------------------->


    <!---------------------------------------- Start Insert Form Modal ------------------------------------------------->   

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">            
            
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">

                  <center><h2> <b> Add User</b></h2></center><br/>  
                  <input type="text"    class="form-control" name="Uname"     id="Uname"     placeholder="User Name" autofocus><br/>    
                  <input type="Email"   class="form-control" name="Email"     id="Email"     placeholder="Email"><br/>  
                  <input type="Number"  class="form-control" name="Te_Number" id="Te_Number" placeholder="Telephone Number" ><br/>                   
                  <input type="Password"class="form-control" name="Password" id="Password" placeholder="Password" ><br/>                   

                  <select class="custom-select" id="inputGroupSelect02" style=" margin-bottom: 20px;" name="Option">                      
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>    
                  </select>    
                </div>

                <input type="file" name="image" >

                <button type="submit" name="Insert" class="btn btn-primary" style=" width: 100%; margin-bottom: 20px;">Add User</button>
              </form>
            
          </div>
          
        </div>
      </div>
    </div>

    <?php 	
	    include("dbconnect.php");
	    $message="";
	
	    if(isset($_POST['Insert']))  // associative array
	    {	
		
		    $Name = $_POST['Uname'];
		    $email = $_POST['Email'];
        $T_no = $_POST['Te_Number'];
        $Pass = $_POST['Password'];
        $op = $_POST['Option'];   

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

          $sql2 = "INSERT INTO users( UName, Email, Te_No, Type, Password, Image) VALUES('$Name','$email','$T_no','$op','$Pass','$url')";	
			    $results2 = mysqli_query($conn, $sql2); 
			
			    if(!$results2)
			    {
				    $alert = "<script> alert('$op Add User fail');</script>";	
				    echo "$alert"; 
			    }
			    else
			    {				  
			      $alert = "<script> alert('Add User successful');</script>";	
				    echo "$alert"; 
				    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_User.php">';
			    }	 
        }

			  
	    } 		
	  ?>

    <!---------------------------------------- End Insert Form Modal ------------------------------------------------->


    

    <!---------------------------------------- Start Update Form Modal ------------------------------------------------->
   
    <?php 

      include("dbconnect.php");

      if(isset($_GET['Edit']))
      {		 
	        $Id    = $_GET['Id'];	 	
	
	        $sql3 = "SELECT * FROM users  WHERE Uid  ='$Id'";			
	        $result3 = mysqli_query($conn, $sql3);		
	        $row3 = mysqli_fetch_array($result3);
	
          $UName        = $row3['UName'];
		      $email        = $row3['Email'];
		      $Te_No        = $row3['Te_No'];
		      $Type         = $row3['Type'];		
          $Password     = $row3['Password'];	
          $image    	  = $row3['Image'];	

		
      }
    ?>

    <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">            
              
              <form action="#" method="post">
                  <div class="form-group">
  
                    <center><h2> <b> Update Category</b></h2></center><br/>  

                    <img src="<?php echo $image; ?>" style="width: 150px; height: 150px; margin-left: 150px; margin-bottom: 20px;"   data-holder-rendered="true"/><br/>
                    Name
                    <input type="text" class="form-control" name="UName"  id="CId"   value="<?php echo $UName; ?>" autofocus><br/>    
                    Email
                    <input type="text" class="form-control" name="UEmail" id="CName" value="<?php echo $email; ?>" ><br/> 
                    Telephone Number 
                    <input type="text" class="form-control" name="Utelno" id="Cdes"  value="<?php echo $Te_No; ?>" ><br/> 
                    Type
                    <select class="custom-select" id="inputGroupSelect02" style=" margin-bottom: 20px;" name="Option">                      
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>    
                    </select>    
                    Password
                    <input type="text" class="form-control" name="Upassword"  id="password"  value="<?php echo $Password; ?>" ><br/>         
                  </div>
  
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
                </form>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  
    <?php 	
	    include("dbconnect.php");
	    $message="";
	
	    if(isset($_POST['Update']))  // associative array
	    {			
		    
		    $Name      = $_POST['UName'];
        $Email     = $_POST['UEmail'];
        $TelePhone = $_POST['Utelno'];
        $type      = $_POST['Option'];
        $password  = $_POST['Upassword'];

        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $temp_name = $_FILES['image']['tmp_name'];

        $upload_to = 'image/';

        if(move_uploaded_file($temp_name, $upload_to . $file_name))
        {
            $url = $upload_to . $file_name;

            $sql4 = "UPDATE users SET UName = '$Name', Email = '$Email', Te_No = '$TelePhone', Type = '$type', Password = '$password', Image = '$url'  WHERE Uid = '$Id' ";					
			      $results4 = mysqli_query($conn, $sql4); 

            if(!$results4)
			      {
				        $msg = "faild";
			      }
			      else
			      {
				      $alert = "<script> alert('Update successful');</script>";	
				      echo "$alert";
				      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_User.php">';	    
				 
			      }	 


        }

        else{

          $sql4 = "UPDATE users SET UName = '$Name', Email = '$Email', Te_No = '$TelePhone', Type = '$type', Password = '$password'  WHERE Uid = '$Id' ";					
			    $results4 = mysqli_query($conn, $sql4); 

          if(!$results4)
			      {
				        $msg = "faild";
			      }
			      else
			      {
				      $alert = "<script> alert('Update successful');</script>";	
				      echo "$alert";
				      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_User.php">';	    
				 
			      }	 
        }
		    
	    } 		
	  ?>

    <!---------------------------------------- End Update Form Modal ------------------------------------------------->


    


    <!---------------------------------------- Start Delete  Modal ------------------------------------------------->

    <?php 

      include("dbconnect.php");

      if(isset($_GET['Delete']))
      {		 
	        $Id    = $_GET['Id'];	 	
	
	        $sql5 = "DELETE FROM users  WHERE Uid  ='$Id'";			
	        $result5 = mysqli_query($conn, $sql5);	

		    if(!$result5)
			  {
          $alert = "<script> alert('Delete User Fail');</script>";	
				  echo "$alert";
			  }
			  else
			  {
				  $alert = "<script> alert('Delete User successful');</script>";	
				  echo "$alert";
				  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_User.php">';

			  }
      }
    ?>

    <!----------------------------------------- End Delete  Modal -------------------------------------------------->



  </div>
































    


</body>
</html>