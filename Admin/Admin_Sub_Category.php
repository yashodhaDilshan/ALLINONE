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

if(isset($_GET['btnSearch']))
{
  $search = mysqli_real_escape_string($conn, $_GET['Search']);
  $sql = "SELECT * FROM sub WHERE (SubName LIKE '$search' OR Oreder_type LIKE '$search')";
}
else
{
  $sql = "SELECT * FROM sub";

}

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

        <div class="text">Sub Category</div>        

          <div class="conten">        
            <div class="buttons-div">
              <div class="addbutton">           
    
                <form action="#" method="post">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"> Add Sub Category </button>
                </form>
    
              </div>

              <form action="Admin_Sub_Category.php" method="get">
                  
                <div class="search">
                    <div class="Sbox">
                        <input class="form-control" type="search" name="Search" placeholder="Search" aria-label="Search" style="width:500px">
                    </div>
                    <div class="Sbutton">                  
                        <input type="submit" id="search" name="btnSearch" class="btn btn-primary" Value="search" style="Margin-left:155px">	
                    </div>           
                </div>

              </form>  
            </div>
    
            <table class="table" style=" margin-top: -20px;">
              <thead class="thead-dark">
                <tr>
                  <th class="collom1" scope="col"> id </th> 
                  <th class="collom2" scope="co1"> Name </th>              
                  <th class="collom2" scope="col"> Category Name </th>
                  <th class="collom2" scope="col"> Order_Type </th>
                  <th class="collom2" scope="col"> Buttons </th>
                </tr>
              </thead>

                    <?php		
               
                        
                        $result = mysqli_query($conn,$sql);				
						            while($row = mysqli_fetch_array($result))
					            {	
                            $category_id = $row['Cid'];

                            $sql_2 = "SELECT * FROM category WHERE CId = $category_id ";
                            $result_2 = mysqli_query($conn,$sql_2);
                            $row_2 = mysqli_fetch_array($result_2)	

				              ?>

              <tbody>
                <tr>
                  <th scope="row"><div class="CId"><?php echo $row['SId']; ?></div></th>
                  <td><div class="CName"><?php echo $row['SubName']; ?></div></td>
                  <td><div class="CName"><?php echo $row_2['CName']; ?></div></td>
                  <td><div class="description"><?php echo $row['Oreder_type']; ?></div> </td>
                  <td>
                    <div class="cbuttons" style="display: flex;">                
                      
                        <form action="#" method="get" style=" margin-left: 30px;">
                            <input type="hidden" id="Id" name="Id" Value="<?php echo $row['SId']; ?>">                            
                            <input type="submit" id="Edit" name="Edit" class="btn btn-dark" data-toggle="modal" data-target="#exampleModa2" Value="Edit">	
                        </form>

                        <form action="#" method="get" style=" margin-left: 20px;">
                            <input type="hidden" id="Id" name="Id" Value="<?php echo $row['SId']; ?>">                            
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
            <h5 class="modal-title" id="exampleModalLabel">Sub Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">            
            
            <form action="#" method="post">
                <div class="form-group">

                  <center><h2> <b> Add Sub Category</b></h2></center><br/>               
                  
                  <select class="custom-select" id="Category" style=" margin-bottom: 20px;" name="Category">
                    <option value="Select Category">Select Category</option>   
                    
                    <?php               
                        $sql_1 = "SELECT * FROM category";
                        $result_1 = mysqli_query($conn,$sql_1);				
						            while($row_1 = mysqli_fetch_array($result_1))
					              {	
				            ?>                      
                      <option value="<?php echo $row_1['CId']; ?>"><?php echo $row_1['CName']; ?></option>  

                    <?php } ?> 
                    
                  </select> <br/>  

                  <input type="text" class="form-control" name="SubName" id="SubName" placeholder="Sub Categort Name"><br/>                    

                  <select class="custom-select" id="SubCategory" style=" margin-bottom: 20px;" name="orderType">    
                      <option value="Select order Type">Select order Type</option>                 
                      <option value="Order">      Order      </option>              
                      <option value="Details">    Details    </option> 
                  </select> 

                        
                </div>

                <button type="submit" name="Insert" class="btn btn-primary">Create</button>
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
		
		    $Category  = $_POST['Category'];
		    $SubName   = $_POST['SubName'];
		    $orderType = $_POST['orderType']; 		
		    

        if($Category == "Select Category" || $SubName == "" || $orderType == "Select order Type" )
        {
          $alert = "<script> alert('Empty text boes');</script>";	
				  echo "$alert"; 

        }
        else{

          $sql = "INSERT INTO sub(SubName, Cid, Oreder_type) VALUES('$SubName','$Category','$orderType')";					
			    $results = mysqli_query($conn, $sql); 
			
			    if(!$results)
			    {
				      $msg = "faild";
			    }
			    else
			    {				  
			        $alert = "<script> alert('Create Category successful');</script>";	
				      echo "$alert"; 
				      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Sub_Category.php">';
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
	
	        $sql2 = "SELECT * FROM sub WHERE SId ='$Id' ";			
	        $result2 = mysqli_query($conn, $sql2);		
	        $row2 = mysqli_fetch_array($result2);
	
		     
		      $Name          = $row2['SubName'];
		      $SCid          = $row2['Cid'];
          $Oreder_type   = $row2['Oreder_type'];
		
		
      }
    ?>  

    <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sub Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">            
            
            <form action="#" method="post">
                <div class="form-group">

                  <center><h2> <b> Add Sub Category</b></h2></center><br/>               
                  
                  <select class="custom-select" id="Category" style=" margin-bottom: 20px;" name="Category">                   
                    
                    <?php               
                        $sql_1 = "SELECT * FROM category WHERE Cid ='$SCid' ";
                        $result_1 = mysqli_query($conn,$sql_1);				
						            while($row_1 = mysqli_fetch_array($result_1))
					              {	
				            ?>                      
                      <option value="<?php echo $row_1['CId']; ?>"><?php echo $row_1['CName']; ?></option>  

                    <?php } ?> 
                    
                  </select> <br/>  

                  <input type="text" class="form-control" name="SubName" id="SubName"  value="<?php echo $Name; ?>" ><br/>                    

                  <select class="custom-select" id="SubCategory" style=" margin-bottom: 20px;" name="orderType">    
                      <option value="<?php echo $Oreder_type; ?>"><?php echo $Oreder_type; ?></option>                  
                      <option value="Add to cirt">Add to cirt</option>
                      <option value="Order">      Order      </option>    
                      <option value="Pre Order">  Pre Order  </option> 
                      <option value="Details">    Details    </option> 
                  </select> 

                        
                </div>
                <input type="hidden" class="form-control" name="Sid" value="<?php echo $Id; ?>" >
                <button type="submit" name="Update" class="btn btn-primary">Update</button>
              </form>
            
          </div>
          
        </div>
      </div>
    </div>
  
    <?php 	
	    include("dbconnect.php");
	    $message="";
	
	    if(isset($_POST['Update']))  // associative array
	    {		
        $SId = $_POST['Sid'];	
		    $Category  = $_POST['Category'];
		    $SubName   = $_POST['SubName'];
		    $orderType = $_POST['orderType']; 

			  $sql3 = "UPDATE sub SET SubName = '$SubName', Cid = '$Category', Oreder_type = '$orderType' WHERE SId  = '$SId' ";					
			  $results3 = mysqli_query($conn, $sql3); 
			
			  if(!$results3)
			  {
				  $msg = "faild";
			  }
			  else
			  {
				  $alert = "<script> alert('Update successful');</script>";	
				  echo "$alert";
				  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Sub_Category.php">';
				  
          		 
				  
				  
				 
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
	
	        $sql4 = "DELETE FROM sub  WHERE SId  ='$Id'";			
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

    <!------------------------------------------- End Delete  Modal ------------------------------------------------->



  </div>
































    


</body>
</html>