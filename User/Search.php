<?php 
include("dbconnect.php");

session_start();
if(isset($_SESSION['email']))  // Associate Array
{	
	$email = $_SESSION['email'];

    $sql_s = "SELECT * FROM users WHERE Email='$email' ";			
    $result_s = mysqli_query($conn, $sql_s); 
    $row_s = mysqli_fetch_array($result_s);

    $UName = $row_s["UName"];
    $Id = $row_s["Uid"];
    $UImage = $row_s["Image"];
    
}



?>

<!DOCTYPE html> 
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Allinone</title>    
    
    <link rel="stylesheet" href="css/User_Order_Types.css">

    <!--- Boostrap 4 ---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

     <!--- Icons ---->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
    
    <style>
        body{ margin-top:-25px;}
        .dropdown-menu{margin-top: 20px;}
        .site-page{min-height:500px}
        .product_list{padding-top:30px}

        .Pro_container{	display: grid; grid-template-columns: 20% 20% 20% 20%; grid-row-gap: 10px; grid-column-gap: 50px; }
        .

        .buynow-layer{ width: 100%; height: 100%; position: absolute; left: 50%; right: 50%; transform: translate(-50%, -100%); background-color: rgba( 92, 95, 236, 0.6 ); justify-content: center; align-items: center; visibility: hidden; padding-top: 20%; padding-left: 28%; }        
        .buynow-layer .btn{ width: 70%;}
        .buynow-layer .btn:hover{background:orange}

        .detail-box{ width: 100%; display: flex; justify-content: space-between; padding:10px 10px; box-sizing: border-box; font-family:calibri;}
        .detail{ display: flex; flex-direction: column; }
        .detail h4{ color: #222222; margin: 20x 0px; font-size: 20px; font-weight: bold; letter-spacing: 0.2px; padding-right: 8px; }
        .detail span{ font-size: 15px; color: green; margin-left: 0px; }

        .price{ margin-top: 20px; color: black;  width:80px; display:flex; }
        .price span{ font-size: 12px;  color: rgba(26,26,26,0.5); margin-right:10px; margin-Top:0px; font-weight: bold; color:red}
        .price h4{ color: #222222; margin: 20x 0px; font-size: 15px; font-weight: bold; letter-spacing: 0.2px; padding-right: 5px; }
        .price-num{ color: #333333; font-weight: 600; font-size: 15px;; font-family: poppins; letter-spacing: 0.5px; margin-left: 0px; text-decoration: none; }

        .site-page{min-height:500px}





        .Pro_container1{ display: grid; grid-template-columns: 50% 50%; grid-row-gap: 10px; grid-column-gap: 40px; }
        .item-box1{ height:300px; width:400px; box-shadow: 2px 2px 30px rgba(0,0,0,0.2); border-radius: 10px; overflow: hidden; margin: 20px; }
        .item-img1{ position: relative; border-bottom: 1px solid rgb(166, 165, 165); margin: auto auto;}
        .item-img1 img{ height: 225px;  object-fit: cover; box-sizing: border-box;  }

        .detail-box1{ width: 100%; display: flex; justify-content: space-between; padding:10px 10px; box-sizing: border-box; font-family:calibri;}
        .detail1{ display: flex; flex-direction: column; }
        .detail1 h4{ color: #222222; margin: 20x 0px; font-size: 25px; font-weight: bold; letter-spacing: 0.2px; padding-right: 8px; }
        .detail1 span{ font-size: 17px; color: green; margin-left: 0px; }

        .price1{ margin-top: 20px; color: black;  width:120px; display:flex; }
        .price1 span{ font-size: 12px;  color: rgba(26,26,26,0.5); margin-right:10px; margin-Top:4px; font-weight: bold; color:red }
        .price1 h4{ color: #222222; margin: 20x 0px; font-size: 20px; font-weight: bold; letter-spacing: 0.2px; padding-right: 5px; }
        .price-num1{ color: #333333; font-weight: 600; font-size: 15px;; font-family: poppins; letter-spacing: 0.5px; margin-left: 0px; text-decoration: none; }

        .buynow-layer1{ width: 100%; height: 100%; position: absolute; left: 50%; right: 50%; transform: translate(-50%, -100%); background-color: rgba( 92, 95, 236, 0.6 ); justify-content: center; align-items: center; visibility: hidden; padding-top: 100px; padding-left: 130px;}
        .buynow-layer1 .btn{ width: 50%;}
        .buynow-layer1 .btn:hover{background:orange}


        .buy-btn1{ width: 100px; height: 30px; display: flex; justify-content: center; align-items: center; color: #252525; font-weight: 700; letter-spacing: 1px; font-family: calibri; border-radius: 20px; box-shadow: 2px 2px 30px rgba(0,0,0,0.2); background-color: #FFFFFF; margin-top: 10px; font-size: 15px; } 
        .buy-btn1:hover{ color: #FFFFFF; background-color: #eb4d4b; transition: all ease 0.3s; text-decoration: none;}

        .item-img1:hover .buynow-layer1{ visibility: visible; animation:fade 0.5s;}
        @keyframes fade{ 0%{ opacity: 0} 100%{ opacity: 1;}}

        .item-box-1{box-shadow: 2px 2px 30px rgba(0,0,0,0.2); border-radius: 10px; overflow: hidden; margin: 20px;}

        .top-right{ width: 13%; padding: 10px; float: right; margin-left:270px; }


    </style>

    

</head>

<body>
    <div class="main">
        <!--------------------------- Start Top Bar ------------------------------->
        <div class="top-bar" it="Topbar">
            <div class="top-nav">
                <div class="top-left">
                    <ul>                       
                        <li><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=DmwnWstsCgCPxpMQTtmhCtmPLcCxSSNKChhHFFHcrZDVcLLwtMfQdRWxhPzmRhjdBPtdnLLkNRdg">  <i class="fa fa-envelope" aria-hidden="true"></i>allinone@gmail.com</a> </li>
                        <li>|</li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>078 57 57 256</a> </li>                       
                    </ul>
                </div>
                <div class="top-right">
                    <ul>
                       
                        <li><a href="User_Home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <li>|</li>
                        <li><a href="#footer">About Us</a></li>
                                       
                    </ul>
                </div>
            </div>
        </div>
         <!--------------------------- End Top Bar -------------------------------->

        
         <!------------------------- Start Name Top Bar --------------------------->
         
         <div class="name-bar">
            <div class="name-mid">
                <div class="site-name">
                    <div class="name-img"><img src="Image/Icon/unnamed.png"></div>
                    <div class="name-1"><a href="#top-bar"><h1>ALLINONE.</h1></a></div>
                    <div class="name-2"><h3>Lk</h3></div>

                </div>
                <div class="search-bar">
                    
                    <form action="Search.php" method="get">
                        <div class="search-box">                         
                            <div class="search-boxs">
                                <input class="s-box" name="search" type="search" placeholder="Search Product" autofocus>	
                            </div>
                            <div class="search-btn">
                                <button type="submit" name="btnsearch" style="background:none; border:none; outline:none;" > <img src="Image/Icon/icons8-search-64.png" ></button>            
                            </div>                
                        </div>
                    </form>

                     <h5>                        
                        <?php 
                            if(isset($_SESSION['email']))
                            {
                                echo $UName;
                            }
                            else{
                                echo '<a href="Login.php">Login now</a>';
                            }
                         ?>                 
                    </h5>


                </div>
                <div class="login-cirt">
                    <ul>
                        <li>
                        <div class="dropdown show">

                        <?php 
                            if(isset($_SESSION['email']))
                            {
                                ?>
                                    <a class=""  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $UImage;?>" style="width: 45px; height: 45px" class="rounded-circle"  data-holder-rendered="true"/> </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="My_Ad.php">My Ads</a>                                    
                                    <a class="dropdown-item" href="Logout.php">Log out</a>
                                </div>

                                <?php                               
                            }
                            else
                            {
                                echo '<a href="Login.php"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="Image/User.png" style="width: 30px; height: 30px; border:none; margin-top:25px" class="rounded-circle"  data-holder-rendered="true"/> </a>';
                            }
                            
                         ?>
                                
                                

                                
                            </div>
                        </li>

                        <li><a class="cirt" href="#"><img src="Image/Icon/icons8-shopping-cart.gif" ></a></li>
                        <li>                                
                            <div class="cirt-number">
                                <p>0</p>
                            </div>                           
                        </li>                        
                    </ul>            
                </div>
                <div class="cirt-Total">
                    <ul>
                        <li>LKR 0</li>                
                    </ul>
                </div>
            </div>
        </div>   

        <!--------------------------- End Name Top Bar ---------------------------->       






        <!--------------------------- Start Site pager ------------------------------>
        <div class="site-page">
            <!-- Start navigation -->
            <div class="navigation">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Post Ad</button>
                <h2>Categorys</h2>
                <nav>
                    <ul>
                        <?php  
				            
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($conn,$sql);
                      
                            while($row = mysqli_fetch_array($result))
                            {
                                $id = $row['CId'];
				        ?>	

                        <li class="Drop-side">
                            
                            <div class="mainbutton">
                                <form action="" >
                                    <input type="hidden" name="Category_id" Value="<?php echo $id;?>">
                                    <button type="submit" name="Category"><?php echo $row['CName']; ?></button>
                                </form>
                            
                                <i class="fa bt fa-angle-right" aria-hidden="true"></i>
                            </div>
                    
                            <div class="sub" style="width: 170px; margin-left:165px;">
                                <div class="sub-1" >
                                    <ul>
                                        <?php  
				                            
                                            $sql1 = "SELECT * FROM sub WHERE Cid = '$id' ";
                                            $result1 = mysqli_query($conn,$sql1);
                      
                                            while($row1 = mysqli_fetch_array($result1))
                                            {
                                                $Sid = $row1['SId'];
				                        ?>                                            
                                            <li>
                                                <form action="Product.php" method="get">
                                                    <input type="hidden" name="Sub_Id" Value="<?php echo $Sid;?>">
                                                    <button type="submit" name="SubCategory"><?php echo $row1['SubName'];?></button>
                                                </form>                                                    
                                            </li>


                                        <?php } ?>                                        
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <?php } ?>
                        
                    </ul>

                </nav>
                
            </div>   
            <!--- End navigation --->




            <!----- Start product ------->
            
            <div class="product_list"> 

                 <!----- Start Details Only (Order Type 1) ------->
                <div class="gridbox" style="width:84%; ; margin-left:50px ; display: flex;">
                    <div class="product">              
                    <div class="Pro_container1">

                        <?php  

                            if(isset($_GET['btnsearch']))
                            {		 
                                $search    = $_GET['search'];	

                                $search = mysqli_real_escape_string($conn, $_GET['search']);

				                            
                                $sql_2 = "SELECT * FROM product  WHERE PName ='$search' OR Type ='$search' ";	
                                $result_2 = mysqli_query($conn, $sql_2);	
                      
                                while($row_2 = mysqli_fetch_array($result_2))
                                {
                                    $Pid          = $row_2['PId'];
                                    $order_type   = $row_2['order_type'];

                                    if($order_type == "Details")
                                    {
				        ?>

                        <div class="item-box1">
                        <div class="item-img1">
                            <img src="<?php echo $row_2['image']; ?>" alt="">    

                                <div class="buynow-layer1">                                     
                                     <form action="Details.php" method="get">  
                                         <input type="hidden" name="Pro_id" Value="<?php echo $Pid;?>">                                       
                                         <button type="Submit" name="Details" class="btn btn-orange">Details</button>  
                                     </form>                                                           
                                </div>  
                                
                        </div>              
            
                        <div class="detail-box1">
                            <div class="detail1">
                                <h4><?php echo $row_2['PName']; ?></h4>
                                <span><?php echo $row_2['Type']; ?></span>
                            </div>
                            <div class="price1">
                                <span>LKR</span>
                                <h4><?php echo $row_2['Price']; ?></h4>
                            </div>
                        </div>
                        </div><!--item-box--->
                        <?php }} ?>
                        <?php } ?>
                    </div>
                    </div>
                </div>
                 <!------ end Details Only(Order Type 1) -------->


                <!----- Start Buy Now Product(Order Type 2) ------->
                <div class="gridbox" style="width:84%; ; margin-left:50px ; display: flex;">
                    <div class="product">              
                    <div class="Pro_container">

                        <?php  

                            if(isset($_GET['btnsearch']))
                            {		 
                                $search    = $_GET['search'];	
				                            
                                $sql_2 = "SELECT * FROM product  WHERE PName ='$search' OR Type ='$search' ";	
                                $result_2 = mysqli_query($conn, $sql_2);	
                      
                                while($row_2 = mysqli_fetch_array($result_2))
                                {
                                    $Pid          = $row_2['PId'];
                                    $order_type   = $row_2['order_type'];

                                    if($order_type == "Order")
                                    {
				        ?>

                        <div class="item-box">
                        <div class="item-img">
                            <img src="<?php echo $row_2['image']; ?>" alt=""> 

                                <div class="buynow-layer">                                      
                                    <form action="Details.php" method="get">  
                                        <input type="hidden" name="Pro_id" Value="<?php echo $Pid;?>">                                       
                                        <button type="Submit" name="Details" class="btn btn-orange">Details</button>  
                                    </form>                                                           
                                </div>  
                        </div>              
            
                        <div class="detail-box">
                            <div class="detail">
                                <h4><?php echo $row_2['PName']; ?></h4>
                                <span><?php echo $row_2['Type']; ?></span>
                            </div>
                            <div class="price">
                                <span>LKR</span>
                                <h4><?php echo $row_2['Price']; ?></h4>
                            </div>
                        </div>
                        </div><!--item-box--->
                        <?php }} ?>
                        <?php } ?>
                    </div>
                    </div>
                </div>
                <!----- end Buy Now Product(Order Type 2) ------->
            </div>

            <!------- End product ------->            

        </div>
        <!---------------------------- End Site pager ----------------------------->
        






        


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

                                <input type="text"   class="form-control" name="description" id="description" placeholder="description" ><br/>

                                <input type="text"   class="form-control" name="Quantity" id="description" placeholder="Quantity" ><br/>
                  
                                <input type="Number" class="form-control" name="Price"       id="Price"       placeholder="Price" ><br/>
                  
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
                

                $file_name = $_FILES['image']['name'];
                $file_type = $_FILES['image']['type'];
                $file_size = $_FILES['image']['size'];
                $temp_name = $_FILES['image']['tmp_name'];
    
                $upload_to = 'image/';
    
                move_uploaded_file($temp_name, $upload_to . $file_name);

                $url = $upload_to . $file_name;
                

		        if($productName == "" || $Te_Number == "" || $description == "" || $Price == "" )
                {
                    $alert = "<script> alert('Empty text boes');</script>";	
				    echo "$alert"; 
                }

                else{

                    $sql_Sub = "SELECT * FROM sub  WHERE SId  ='$Subcategory_id' ";	
                    $result_Sub = mysqli_query($conn, $sql_Sub);          
                    $row_Sub = mysqli_fetch_array($result_Sub);

                    $ordertype = $row_Sub['Oreder_type'];


                    $sql_1 = "INSERT INTO product( PName, Tell_no, Description, Price, Category_Id, SubCategory_Id, Type, image, Uid, order_type, Quantity) VALUES('$productName','$Te_Number','$description','$Price','$category_Id','$Subcategory_id', '$Type', '$url', '$Id', '$ordertype', '$Quantity' )";	
			        $results_1 = mysqli_query($conn, $sql_1); 
			
			        if(!$results_1)
			        {
				        $alert = "<script> alert('$op Post ad fail');</script>";
				        echo "$alert";
			        }
			        else
			        {				  
			            $alert = "<script> alert('product post successful');</script>";
				        echo "$alert"; 
				        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Home.php">';
			        }	 
                }

			  
	        } 		
	    ?>

        
        <!---------------------------------------- End post ad Modal -------------------------------------------------> 
        

    
        





          









        <!------------------------------ Start Footer ------------------------------->
                                                                                     
        <div class="footer" id="footer">
            
              <!-- Site footer -->
              <footer class="site-footer">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <h6>About</h6>
                      <p class="text-justify">This website helps you to sell any goods you need and buy any goods you need through this website. And Bhan can easily be seen under any number of categories. This is a very friendly and easy-to-understand website for anyone. By selling products through the website, you can easily earn money by selling products.
                    </div>
          
                    <div class="col-xs-6 col-md-3">
                      <h6>Address</h6>
                      <ul class="footer-links">
                        <li>allinone@gmail.com</li>
                        <li>Bambalapitiya</li> 
                        
                      </ul>
                    </div>
                    
          
                    <div class="col-xs-6 col-md-3">
                      <h6>Contacts</h6>
                      <ul class="footer-links">                       
                        <li>078 56 56 256</li> 
                        <li>078 57 57 256</li> 
                        <li>033 57 57 256</li>  
                                      
                      </ul>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                      <p class="copyright-text">For ALL Products Selling and Buying      
                      </p>
                    </div>
          
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <ul class="social-icons">
                        <li><a class="facebook" href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a></li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
            </footer>

        </div>
        <!------------------------------- End Footer ------------------------------->


   

    </div><!---- main ----->

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

    
</body> 
</html>