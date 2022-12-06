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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    
    <link rel="stylesheet" href="css/Category.css"> 

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    <style>
        body{margin-top:-26px}
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

        <div class="text">Category</div>        

          <div class="conten">        
            <div class="buttons-div">
              <div class="addbutton">           
    
                <form action="#" method="post">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"> Create Category </button>
                </form>    
              </div>              
            </div>
    
            <table class="table" style=" margin-top: -20px;">
              <thead class="thead-dark">
                <tr>
                  <th class="collom1" scope="col"> id </th>
                  <th class="collom2" scope="co1"> Name </th>              
                  <th class="collom3" scope="col"> description </th>
                  <th class="collom4" scope="col"> Buttons </th>
                </tr>
              </thead>

              <?php		
                include("dbconnect.php");
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn,$sql);				
						    while($row = mysqli_fetch_array($result))
					      {	
				      ?>

              <tbody>
                <tr>
                  <th scope="row"><div class="CId"><?php echo $row['CId']; ?></div></th>
                  <td><div class="CName"><?php echo $row['CName']; ?></div></td>
                  <td><div class="description"><?php echo $row['Cdescription']; ?></div> </td>
                  <td>
                    <div class="cbuttons" style="display: flex;">                
                      
                        <form action="#" method="get" style=" margin-left: 30px;">
                            <input type="hidden" id="Id" name="Id" Value="<?php echo $row['CId']; ?>">                            
                            <input type="submit" id="Edit" name="Edit" class="btn btn-dark" data-toggle="modal" data-target="#exampleModa2" Value="Edit">	
                        </form>

                        <form action="#" method="get" style=" margin-left: 20px;">
                            <input type="hidden" id="Id" name="Id" Value="<?php echo $row['CId']; ?>">                            
                            <input type="submit" id="Delete" name="Delete" class="btn btn-danger" Value="Delete">	
                        </form>
                        
                    </div>
                  </td>
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
            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">            
            
            <form action="#" method="post">
                <div class="form-group">

                  <center><h2> <b> Crate Category</b></h2></center><br/>                   
                  <input type="text" class="form-control" name="CName" id="CName" placeholder="Categort Name"><br/>  
                  <input type="text" class="form-control" name="description" id="description"  placeholder="Categort description" ><br/>         
                </div>

                <button type="submit" name="Insert" class="btn btn-primary">Create</button>
              </form>
            
          </div>
          
        </div>
      </div>
    </div>

    <?php 	
	    
	    $message="";
	
	    if(isset($_POST['Insert']))  // associative array
	    {	 
		    $Name = $_POST['CName'];
		    $description  = $_POST['description']; 		
		    

        if($Name == "" || $description == "" )
        {
          $alert = "<script> alert('Empty text boes');</script>";	
				  echo "$alert"; 

        }
        else{

          $sql = "INSERT INTO category(CName, Cdescription) VALUES('$Name','$description')";					
			    $results = mysqli_query($conn, $sql); 
			
			    if(!$results)
			    {
				      $msg = "faild";
			    }
			    else
			    {				  
			        $alert = "<script> alert('Create Category successful');</script>";	
				      echo "$alert"; 
				      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Category.php">';
			    }	 

        }			  
	    } 		
	  ?>

    <!---------------------------------------- End Insert Form Modal ------------------------------------------------->


    

    <!---------------------------------------- Start Update Form Modal ------------------------------------------------->

   
    <?php 

      

      if(isset($_GET['Edit']))
      {		 
	        $Id    = $_GET['Id'];	 	
	
	        $sql2 = "SELECT * FROM category  WHERE CId ='$Id'";			
	        $result2 = mysqli_query($conn, $sql2);		
	        $row2 = mysqli_fetch_array($result2);
	
		     
		      $cName        = $row2['CName'];
		      $cdescription = $row2['Cdescription'];
		
		
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
                    <input type="text" class="form-control" name="Ucid" id="CId"   value="<?php echo $Id; ?>" autofocus><br/>    
                    <input type="text" class="form-control" name="Ucname" id="CName" value="<?php echo $cName; ?>" ><br/>  
                    <input type="text" class="form-control" name="Ucdescription" id="Cdes"  value="<?php echo $cdescription; ?>" ><br/>         
                  </div>
  
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
                </form>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  
    <?php 	
	 
	    $message="";
	
	    if(isset($_POST['Update']))  // associative array
	    {			
		    $Id = $_POST['Ucid'];
		    $Name = $_POST['Ucname'];
		    $description  = $_POST['Ucdescription']; 		
		    
			  $sql3 = "UPDATE category SET CName = '$Name', Cdescription = '$description' WHERE CId = '$Id' ";					
			  $results3 = mysqli_query($conn, $sql3); 
			
			  if(!$results3)
			  {
				  $msg = "faild";
			  }
			  else
			  {
				  $alert = "<script> alert('Update successful');</script>";	
				  echo "$alert";
				  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Category.php">';
				  
          		 
				  
				  
				 
			  }	 
	    } 		
	  ?>


      <!---------------------------------------- End Update Form Modal ------------------------------------------------->




    <!---------------------------------------- Start Delete  Modal ------------------------------------------------->



      <?php 

   

      if(isset($_GET['Delete']))
      {		 
	        $Id    = $_GET['Id'];	 	
	
	        $sql4 = "DELETE FROM category  WHERE CId ='$Id'";			
	        $result4 = mysqli_query($conn, $sql4);	

		    if(!$result4)
			  {
				  $msg = "faild";
			  }
			  else
			  {
				  $alert = "<script> alert('Delete successful');</script>";	
				  echo "$alert";
				  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Category.php">';

			  }
      }
    ?>


      

    <!---------------------------------------- End Delete  Modal ------------------------------------------------->



  </div>
































    


</body>
</html>