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
        .site-page{min-height:500px}
        .product_list{padding-top:30px}

        .Pro_container{	display: grid; grid-template-columns: 20% 20% 20% 20%; grid-row-gap: 10px; grid-column-gap: 100px; }
        .item-box{ height:auto;  width:220px }
        .item-img{ height: 230px;  width: 220px }
        .item-img img{ height:220px;  width: auto; object-fit: cover; box-sizing: border-box; margin: auto auto;}

        .buynow-layer{ width: 100%; height: 100%; position: absolute; left: 50%; right: 50%; transform: translate(-50%, -100%); background-color: rgba( 92, 95, 236, 0.6 ); justify-content: center; align-items: center; visibility: hidden; padding-top: 20%; padding-left: 28%; }        
        .buynow-layer .btn{ width: 70%;}
        .buynow-layer .btn:hover{background:orange}

        .detail-box{ width: 100%; display: flex; justify-content: space-between; padding:10px 10px; box-sizing: border-box; font-family:calibri;}
        .detail{ display: flex; flex-direction: column; }
        .detail h4{ color: #222222; margin: 20x 0px; font-size: 25px; font-weight: bold; letter-spacing: 0.2px; padding-right: 8px; }
        .detail span{ font-size: 15px; color: green; margin-left: 0px; }

        .price{ margin-top: 20px; color: black;  width:80px; display:flex; }
        .price span{ font-size: 12px;  color: rgba(26,26,26,0.5); margin-right:10px; margin-Top:4px; }
        .price h4{ color: #222222; margin: 20x 0px; font-size: 15px; font-weight: bold; letter-spacing: 0.2px; padding-right: 5px; }
        .price-num{ color: #333333; font-weight: 600; font-size: 15px;; font-family: poppins; letter-spacing: 0.5px; margin-left: 0px; text-decoration: none; }

        .site-page{min-height:500px}
        .product_list{ margin:150px auto 0 auto;}
        .tital{width:100%; background:#d8d8d8; margin-bottom:50px}
        .tital h1{text-align: center;}
        

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

            <!----- Start product ------->
            
            <div class="product_list">   
                
                <div class="tital">
                    <h1><?php echo $UName;?>'s Ads</h1>
                </div>

                <div class="gridbox" style="width:84%; ; margin-left:50px ; display: flex;">

                <div class="product">                
                    
                    <div class="Pro_container">

                        <?php  

                            
                                $sql_2 = "SELECT * FROM product  WHERE Uid ='$Id' ";	
                                $result_2 = mysqli_query($conn, $sql_2);	
                      
                                while($row_2 = mysqli_fetch_array($result_2))
                                {
                                   $proId =$row_2['PId'];
				        ?>

                        <div class="item-box">
                            <div class="item-img">
                                <img src="<?php echo $row_2['image']; ?>" alt="">    
            
                                                   
                                <div class="buynow-layer">

                                    <form action="Update_product.php" method="post">  
                                        <input type="hidden" name="Pro_id" Value="<?php echo $proId;?>">
                                        <button type="Submit" name="Edit" class="btn btn-orange" >Update</button>                                        
                                    </form>    

                                    <form action="#" method="get">  
                                        <input type="hidden" name="Pro_id" Value="<?php echo $proId;?>">                                       
                                        <button type="Submit" name="Delete" class="btn btn-orange">Delete</button>  
                                    </form>                                                           
                                </div> 
                                 
                            </div>              
            
                            <div class="detail-box">
                                <div class="detail">
                                    <a href="#"><?php echo $row_2['PName']; ?></a>
                                    <span><?php echo $row_2['Type']; ?></span>
                                </div>
                                <div class="price">
                                    <span>LKR</span>
                                    <a href="#" class="price-num"><?php echo $row_2['Price']; ?></a>
                                </div>
                            </div>
                        </div><!--item-box--->

                        <?php } ?>
                        
                    </div>
                </div>
                </div>

            </div>


            <!------- End product ------->    
            

        </div>
        <!---------------------------- End Site pager ----------------------------->


    
        
    <!---------------------------------------- Start Delete  ------------------------------------------------->



    <?php 

   

      if(isset($_GET['Delete']))
      {		 
	        $Id    = $_GET['Pro_id'];	 	
	
	        $sql4 = "DELETE FROM product  WHERE PId  ='$Id'";			
	        $result4 = mysqli_query($conn, $sql4);	

		    if(!$result4)
			  {
				  $msg = "faild";
			  }
			  else
			  {
				  $alert = "<script> alert('Delete successful');</script>";	
				  echo "$alert";
				  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=My_Ad.php">';

			  }
      }
    ?>      

    <!---------------------------------------- End Delete  ------------------------------------------------->






          









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