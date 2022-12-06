<?php 
include("dbconnect.php");

session_start();
if(!isset($_SESSION['email']))  // Associate Array
{	
	header("location:Login.php");
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
        .site-page{min-height:500px; background:; width:300px; border-right:none}
        .product_list{padding-top:30px}
        .form{margin-top:170px; margin-bottom:70px}

        .top-right{ width: 13%; padding: 10px; float: right; margin-left:270px; }      
        

    </style>   

</head>

<body>
    <div class="main">
        <!--------------------------- Start Top Bar ------------------------------->
        <div class="top-bar">
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
                        <li><a href="#">About Us</a></li>
                                       
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
                    <div class="search-box">
                        <div class="search-boxs">
                            <input class="s-box" name="search" type="text" placeholder="Search Product" autofocus>	
                        </div>
                        <div class="search-btn">
                            <a href="#"><img src="Image/Icon/icons8-search-64.png" ></a>
                        </div>
                    </div>
                     <h5> <?php echo $UName; ?></h5>
                </div>
                <div class="login-cirt">
                    <ul>
                        <li>
                            <div class="dropdown show">
                                <a class=""  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $UImage;?>" style="width: 45px; height: 45px" class="rounded-circle"  data-holder-rendered="true"/> </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="">My Ads</a>                                    
                                    <a class="dropdown-item" href="Logout.php">Log out</a>
                                </div>
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
            
        <div class="form">

    <?php 

      

        if(isset($_POST['Edit']))
        {		 
	        $Id    = $_POST['Pro_id'];	 	
	
	        $sql2 = "SELECT * FROM product  WHERE PId  ='$Id'";			
	        $result2 = mysqli_query($conn, $sql2);		
	        $row2 = mysqli_fetch_array($result2);
	
		     
		      $Name        = $row2['PName'];
		      $Tell_no     = $row2['Tell_no'];
              $Description = $row2['Description'];
		      $Price       = $row2['Price'];
		
		
         }
    ?>
            
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <center><h2> <b> Update Ad</b></h2></center><br/>                          

                    <input type="text"   class="form-control" name="productName" id="productName" value="<?php echo $Name; ?>" autofocus><br/>    
                  
                    <input type="Number" class="form-control" name="Te_Number"   id="Te_Number"   value="<?php echo $Tell_no; ?>" ><br/>  

                    <input type="text"   class="form-control" name="description" id="description" value="<?php echo $Description; ?>" ><br/>
                  
                    <input type="Number" class="form-control" name="Price"       id="Price"       value="<?php echo $Price; ?>" ><br/>
                  
                    <input type="file" name="image" >  

                </div>            

                <input type="hidden" id="Id" name="Id" Value="<?php echo $Id; ?>">  
                <button type="submit" name="postAd" class="btn btn-primary" style=" width: 100%; margin-bottom: 20px;">Post Ad</button>
            </form>      
        </div>
                    
    <?php 	


	 
     $message="";
 
     if(isset($_POST['postAd']))  // associative array
     {	
         $id           = $_POST['Id'];		
         $Name         = $_POST['productName'];
         $Te_no        = $_POST['Te_Number'];
         $description  = $_POST['description']; 	
         $Price        = $_POST['Price']; 	
         
           $sql3 = "UPDATE product SET PName = '$Name', Tell_no = '$Te_no', Description = '$description', Price = '$Price' WHERE PId = '$id' ";					
           $results3 = mysqli_query($conn, $sql3); 
         
           if(!$results3)
           {
               $msg = "faild";
           }
           else
           {
               $alert = "<script> alert('Update successful');</script>";	
               echo "$alert";
               echo '<META HTTP-EQUIV="Refresh" Content="0; URL=My_Ad.php">';      
              
           }	 
     } 		
   ?>
        

    </div>
        <!---------------------------- End Site pager ----------------------------->





        <!---------------------------------------- Start post ad Modal ------------------------------------------------->   


       





          









        <!------------------------------ Start Footer ------------------------------->
                                                                                     
        <div class="footer">
            
              <!-- Site footer -->
              <footer class="site-footer">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <h6>About</h6>
                      <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
                    </div>
          
                    <div class="col-xs-6 col-md-3">
                      <h6>Categories</h6>
                      <ul class="footer-links">
                        <li><a href="#">Vehicul</a></li>
                        <li><a href="#">fashion</a></li>
                        <li><a href="#">Computer</a></li>
                        <li><a href="#">Laptop</a></li>
                        <li><a href="#">phone</a></li>
                        <li><a href="#">Tab</a></li>
                      </ul>
                    </div>
          
                    <div class="col-xs-6 col-md-3">
                      <h6>Quick Links</h6>
                      <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>                
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Customer review</a></li>
                      </ul>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                      <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
                   <a href="#">Scanfcode</a>.
                      </p>
                    </div>
          
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
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