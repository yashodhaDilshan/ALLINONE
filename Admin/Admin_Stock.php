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
  $sql = "SELECT * FROM product WHERE (PName LIKE '$search' OR Type LIKE '$search' )";
}
else
{
  $sql = "SELECT * FROM product";

}

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

        <div class="text">Stock</div>        

          <div class="conten">        
            <div class="buttons-div">
              <div class="addbutton">           
    
                <form action="#" method="post">
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"> Add Products </button>
                </form>
    
              </div>

              <form action="Admin_Stock.php" method="get">
                  
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
                    <th class="collom4" scope="col"> Product Id </th>
                    <th class="collom2" scope="co1"> Product Infor </th>  
                    <th class="collom3" scope="co1"> Available </th>              
                    <th class="collom4" scope="col"> Price </th>
                    <th class="collom4" scope="col"> Buttons </th>
              </thead>

              <?php		
                
                
                $result = mysqli_query($conn,$sql);				
						    while($row = mysqli_fetch_array($result))
					      {	
                   $order_type = $row['order_type'];

                  if($order_type == "Order")
                  {
				      ?>

              <tbody>
              <tr>
              <th scope="row"><div class="CId"><?php echo $row['PId']; ?></div></th>

              <td>
                <div class="d-flex align-items-center">
                  <img src="../User/<?php echo $row['image']; ?>" style="width: 45px; height: 45px"  data-holder-rendered="true"/>

                  <div class="ms-3" style="margin-left: 15px;">
                    <p class="fw-bold mb-1"><?php echo $row['PName']; ?></p>
                    <p class="text-muted mb-0">UserID - <?php echo $row['Uid']; ?></p>
                  </div>
                </div>
              </td>              

              <td><div class="description"><?php echo $row['Quantity']; ?></div> </td>
              <td><div class="description"><?php echo $row['Price']; ?></div> </td>

              <td>
                <div class="cbuttons" style="display: flex;">               

                    <form action="#" method="get" style=" margin-left: 20px;">
                        <input type="hidden" id="Id" name="Id" Value="<?php echo $row['PId']; ?>">                            
                        <input type="submit" id="Delete" name="Delete" class="btn btn-danger" Value="Delete">	
                    </form>	

                </div>
              </td>
              
            </tr>  
              </tbody>

              <?php }} ?>

            </table> 
          </div>
      </section>

    <!--------------------- End content ----------------------->


    
    
    <!---------------------------------------- Start post ad Modal ------------------------------------------------->   

        <?php 
            include("dbconnect.php");

            $sql_1 = "SELECT * FROM category";
            $result_1 = mysqli_query($conn, $sql_1);

            $Category_list = "";

            while($row_1 = mysqli_fetch_assoc($result_1))
            {
                $Category_list .= "<option value = \"{$row_1['CId']}\"> {$row_1['CName']} </option>";
            }

        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ads</h5>
                        <button button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">            
            
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <center><h2> <b> Post Ad</b></h2></center><br/>  

                                <select class="custom-select" id="category" style=" margin-bottom: 20px;" name="category">                      
                                    <option>Select category</option>
                                    <?php echo $Category_list; ?>  
                                </select>  <br/>  

                                <select class="custom-select" id="Subcategory" style=" margin-bottom: 20px;" name="Subcategory">               
                                </select> <br/>  

                                <select class="custom-select" id="Type" style=" margin-bottom: 20px;" name="Type">  
                                    <option>Select New or Used </option>
                                    <option value="New">New</option>
                                    <option value="Used">Used</option>    
                                </select>  

                                <input type="text"   class="form-control" name="productName" id="productName" placeholder="Product Name" autofocus><br/>    
                  
                                <input type="Number" class="form-control" name="Te_Number"   id="Te_Number"   placeholder="Telephone Number" ><br/>  

                                <input type="Number" class="form-control" name="AccountNo"   id="AccountNo"   placeholder="Bank Account Number" ><br/>

                                <input type="text"   class="form-control" name="Quantity"    id="description" placeholder="Quantity"  ><br/>
                  
                                <input type="Number" class="form-control" name="Price"       id="Price"       placeholder="Price" ><br/>                               

                                <input type="text"   class="form-control" name="description" id="description" placeholder="description" style="height:60px"><br/>  
                  
                                <input type="file" name="image" >  

                            </div>            
                        
                            <button type="submit" name="postAd" class="btn btn-primary" style=" width: 100%; margin-bottom: 20px;">Post Ad</button>
                        </form>            
                    </div>          
                </div>
            </div>
        </div>    

        <script>
            $(document).ready(function(){
                $("#category").on("change", function(){
                    var categoryId = $("#category").val();
                    var getURL = "get_subcategory.php?category_id=" + categoryId; 
                    $.get(getURL, function(data,status){
                        $("#Subcategory").html(data);
                    });
                    console.log(categoryId);
                });
                $("#Subcategory").on("change", function(){
                    var SubcategoryId = $("#Subcategory").val();                
                    console.log(SubcategoryId);
                });
            });
        </script>

        <?php 	
	        
	        $message="";
	
	        if(isset($_POST['postAd']))  // associative array
	        {	
		
		        $category_Id     = $_POST['category'];
		        $Subcategory_id  = $_POST['Subcategory'];
            $Type            = $_POST['Type'];
            $productName     = $_POST['productName'];
            $Te_Number       = $_POST['Te_Number'];  
            $description     = $_POST['description'];
            $Price           = $_POST['Price']; 
            $Quantity        = $_POST['Quantity']; 
            $AccountNo       = $_POST['AccountNo']; 
                

            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $temp_name = $_FILES['image']['tmp_name'];
    
            $upload_to = '../User/image/';
    
            move_uploaded_file($temp_name, $upload_to . $file_name);

            $url = $file_name;
                

		        if($productName == "" || $Te_Number == "" || $description == "" || $Price == "" || $Quantity == "" || $AccountNo == "" )
            {
                $alert = "<script> alert('one or more text boxes is empty');</script>";	
				        echo "$alert"; 
            }

            else{

                $sql_Sub = "SELECT * FROM sub  WHERE SId  ='$Subcategory_id' ";	
                $result_Sub = mysqli_query($conn, $sql_Sub);          
                $row_Sub = mysqli_fetch_array($result_Sub);

                $ordertype = $row_Sub['Oreder_type'];


              $sql_1 = "INSERT INTO product( PName, Tell_no, Description, Price, Category_Id, SubCategory_Id, Type, image, Uid, order_type, Quantity, AccountNo) VALUES('$productName','$Te_Number','$description','$Price','$category_Id','$Subcategory_id', '$Type', 'image/$url', '$Id', '$ordertype', '$Quantity', '$AccountNo' )";	
			        
              $results_1 = mysqli_query($conn, $sql_1); 
			
			        if(!$results_1)
			        {
				        $alert = "<script> alert('$op Post ad fail');</script>";
				        echo "$alert";
                        
			        }
			        else
			        {				  
			            $alert = "<script> alert('Product post successful');</script>";
				        echo "$alert"; 
				        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Stock.php">';
			        }	 
                }

			  
	        } 		
	    ?>        
        <!---------------------------------------- End post ad Modal -------------------------------------------------> 
        




    

    

    

    


    <!---------------------------------------- Start Delete  Modal ------------------------------------------------->

    <?php 

      include("dbconnect.php");

      if(isset($_GET['Delete']))
      {		 
	        $Id    = $_GET['Id'];	 	
	
	        $sql5 = "DELETE FROM product WHERE PId ='$Id'";			
	        $result5 = mysqli_query($conn, $sql5);	

		    if(!$result5)
			  {
          $alert = "<script> alert('Product Delete Fail');</script>";	
				  echo "$alert";
			  }
			  else
			  {
				  $alert = "<script> alert('Product Delete successful');</script>";	
				  echo "$alert";
				  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Admin_Stock.php">';

			  }
      }
    ?>

    <!----------------------------------------- End Delete  Modal -------------------------------------------------->



  </div>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>



























    


</body>
</html>