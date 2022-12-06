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


if(isset($_GET['Details']))
{
    $PId = $_GET['Pro_id'];

    $sql = "SELECT * FROM product WHERE PId ='$PId' ";			
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_array($result);

    $PName        = $row['PName'];
    $Tele_No      = $row['Tell_no'];
    $Description  = $row['Description'];
    $Price        = $row['Price'];
    $Type         = $row['Type'];
    $image        = $row['image'];
    $order_type   = $row['order_type'];
    $Quantity     = $row['Quantity'];

    
    $availability = $Quantity >= 1; 



}

?>

<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Allinone</title>    
    <link rel="stylesheet" href="css/Details.css">

    <!--- Boostrap 4 ---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

     <!--- Icons ---->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
    
    <style>
        body{ margin-top:-25px;} 
        .dropdown-menu{margin-top: 30px;}         
        .main_image{height:400px; Width:auto; background: ; padding:25px} 
        .col{background:;  Width:400px; padding-top:40px; padding-left:30px; border-left: 1px solid rgb(200, 200, 200); }
        .buttons .btn{width:150px; margin-right:10px}
        .detail-box{display: flex; border:1px solid rgb(200, 200, 200); margin: auto auto;}
        .details-list{margin-top:20px}
        .details-list ul li h6{display: inline-block; font-weight: bold; }
        .order-types{margin: auto auto;}
        h6{display: inline-block; font-weight: bold; }

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
                       
                        <li><a href="Home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
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
            <div class="order-types">


                <div class="detail-box">

                    <?php  if($order_type == "Order")
                        { 
                    ?>
                
                    <div class="main_image">	
                        <img src="<?php echo $image ?>" id="main_product_image" height="350" width='auto'>	
                    </div>

                  
                    <div class="col">	
                                               
                        <h2> <?php echo $PName ?> </h2>	                  
                        <p><?php echo $Description ?> </p>	
                           
                        <h4 style="color: #FF6347">LKR <?php echo $Price ?></h4>	

                        <div class="details-list">
                            <ul>
                                <li><h6>Availability : </h6> <?php echo $Quantity;  ?> </li>
                                <li><h6>Condition :  </h6> <?php echo $Type ?> </li>
                                <li><h6>Tel_No :  </h6> <?php echo $Tele_No ?> </li>
                            </ul>
                        </div>                          
                        
                        <?php 
                        if(isset($_SESSION['email']))
                        {
                        ?>
                            <form action="Payment.php" method="get">                        
                                <h6>Quantities  : </h6> <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $Quantity;?>" value="1">                        
                        
                                <div class="buttons ">	
                                    <input type="hidden" name="ProductId" Value="<?php echo $PId;?>">      
                                    <button type="submit" name="buynow" class="btn btn-info" >Buy Now</button>	                                    
                                </div>	
                            </form>

                        <?php                               
                        }
                        else
                        {                                
                        ?>  <form action="Login.php" method="get">                        
                                <h6>Quantities  : </h6> <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $Quantity;?>" value="1">                        
            
                                <div class="buttons ">	
                                    <button type="submit" name="buynow" class="btn btn-info" >Buy Now</button>	                                    
                                </div>	
                            </form>                     

                        <?php
                        }                            
                         ?>
                            
                    </div>                 

                    <?php } ?>
                </div>

                <div class="detail-box">

                    <?php  if($order_type == "Details")
                           { 
                    ?>
                
                    <div class="main_image">	
                        <img src="<?php echo $image ?>" id="main_product_image" height="350" width='auto'>	
                    </div>
                
                    <div class="col">	
                                               
                        <h2> <?php echo $PName ?> </h2>	                  
                        <p><?php echo $Description ?> </p>	
                           
                        <h3 style="color: #FF6347">LKR <?php echo $Price ?></h3>	

                        <div class="details-list">
                            <ul>
                                <li><h6>Availability : </h6> <?php echo $Quantity;  ?> </li>
                                <li><h6>Condition :  </h6> <?php echo $Type ?> </li>
                                <li><h6>Tel_No :  </h6> <?php echo $Tele_No ?> </li>
                            </ul>
                        </div>              
                            
                        <div class="buttons ">	
                        
                        </div>	
                            
                    </div>

                    <?php } ?>


                </div>

            </div>	

        </div>
        
        <!---------------------------- End Site pager ----------------------------->

        
                                                      









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