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


if(isset($_GET['buynow']))
{
    $PId       = $_GET['ProductId'];
    $quantity  = $_GET['quantity'];

    $sql = "SELECT * FROM product WHERE PId ='$PId' ";			
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_array($result);

    $PName        = $row['PName'];
    $Price        = $row['Price'];   
    $image        = $row['image'];
    $sub_ID       = $row['SubCategory_Id'];

    
   $total = ($quantity * $Price);
    
   $sql_1 = "SELECT * FROM sub WHERE SId ='$sub_ID' ";			
   $result_1 = mysqli_query($conn, $sql_1); 
   $row_1 = mysqli_fetch_array($result_1);
    
   $SubName        = $row_1['SubName'];



}

if(isset($_GET['payNow']))
{
    $PId       = $_GET['ProductId'];
    $quantity  = $_GET['Quantity'];

    $sql = "SELECT * FROM product WHERE PId ='$PId' ";			
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_array($result);

    $PName        = $row['PName'];
    $Price        = $row['Price'];   
    $image        = $row['image'];
    $sub_ID       = $row['SubCategory_Id'];

    
   $total = ($quantity * $Price);
    
   $sql_1 = "SELECT * FROM sub WHERE SId ='$sub_ID' ";			
   $result_1 = mysqli_query($conn, $sql_1); 
   $row_1 = mysqli_fetch_array($result_1);
    
   $SubName        = $row_1['SubName'];



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />

<style>

    .main{width:1000px; background:; margin: auto auto;}
    .Card-date{display:flex;}

    @media (min-width: 1025px) 
    {
        .h-custom { height: 100vh !important;}
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) 
    {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow 
    {
        top: 13px;
    }

    .bg-grey 
    {
        background-color: #eae8e8;
    }

    @media (min-width: 992px) 
    {
        .card-registration-2 .bg-grey 
        {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }

    @media (max-width: 991px) 
    {
        .card-registration-2 .bg-grey 
        {
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
        }
    }

</style>


</head>
<body>
    
    <div class="main">

        <form action="Payment.php" method="get">
            
            <section class="h-100 h-custom" style="background-color: ;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div class="col-lg-8">
                                            <div class="p-5">

                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <h1 class="fw-bold mb-0 text-black">Products</h1>                                                    
                                                </div>

                                                <hr class="my-4">

                                                    <div class="row mb-4 d-flex justify-content-between align-items-center"> <!--Product-->
                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img src="<?php echo $image;?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                        </div>

                                                        <div class="col-md-3 col-lg-3 col-xl-4">
                                                            <h5 class="text-black mb-2"><?php echo $PName;?></h5>
                                                            <h6 class="text-muted"><?php echo $SubName;?></h6>                                                            
                                                        </div>
                    
                                                        <div class="col-md-3 col-lg-3 col-xl-1 d-flex">
                                                            <h6 class="mb-0"><?php echo $quantity;?></h6>
                                                        </div>

                                                        <div class="col-md-3 col-lg-2 col-xl-3 offset-lg-1">
                                                            <h6 class="mb-0">LKR <?php echo $total;?></h6>
                                                        </div>
                        
                                                    </div>  
                    
                                                <hr class="my-4">

                                                    <div class="pt-5">
                                                        <h6 class="mb-0"><a href="Home.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to Home</a></h6>
                                                    </div>
                                            </div>
                                        </div>       
                               
                                        <div class="col-lg-4 bg-grey">
                                            <div class="p-5">                

                                                <h5 class="text-uppercase mb-4">Card Payment</h5>

                                                <div class="mb-2">
                                                    <div class="form-outline">
                                                        <input type="text" name="CHOlderName"  class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplea2">Card Holder Name</label>
                                                    </div>
                                                </div>                  

                                                <div class="mb-2">
                                                    <div class="form-outline">
                                                        <input type="number" Name="CardNumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Examplea2">Card Number</label>
                                                    </div>
                                                </div>


                                                <div class="Card-date">
                                                    <div class="mb-2">
                                                        <div class="form-outline">
                                                            <input type="number" name="CardMonth"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" class="form-control form-control-lg" />
                                                            <label class="form-label" for="form3Examplea2">MM</label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-2">
                                                        <div class="form-outline">
                                                            <input type="number" name="CardYear" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" class="form-control form-control-lg" />
                                                            <label class="form-label" for="form3Examplea2">YY</label>
                                                        </div>
                                                    </div>                                            
                                                </div>

                                                <div class="mb-5 ">
                                                    <div class="form-outline">
                                                        <input type="number" name="CardCVV" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Examplea2">CVV</label>
                                                    </div>
                                                </div>

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-4">
                                                    <h5>Total : LKR <?php echo $total;?></h5>                    
                                                </div>

                                                <input type="hidden" name="ProductId" Value="<?php echo $PId;?>"> 
                                                <input type="hidden" name="Quantity" Value="<?php echo $quantity;?>">   
                                                <input type="hidden" name="total" Value="<?php echo $total;?>">     
                                                <button type="submit" name="payNow" class="btn btn-dark btn-block btn-lg">Pay Now</button>

                                                </div>                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>


    </div>


<?php

if(isset($_GET['payNow']))
{

    $Pid           = $_GET['ProductId'];
    $Quantity      = $_GET['Quantity'];
    $total         = $_GET['total'];

    $CHOlderName   = $_GET['CHOlderName'];
    $CardNumber    = $_GET['CardNumber'];
    $CardMonth     = $_GET['CardMonth'];
    $CardYear      = $_GET['CardYear'];
    $CardCVV       = $_GET['CardCVV'];

    if($CHOlderName == "" || $CardNumber == "" || $CardMonth == "" || $CardYear == "" || $CardCVV == "" )
    {
        $alert = "<script> alert('No Fill Card Details');</script>";
		echo "$alert";
    }
    
    else
    {
        $sql_p = "INSERT INTO payment( PID , Quentity, Total, Card_Holder_Name, Cart_Number, Cart_Expire_Date, Cart_CVV, UID ) VALUES('$Pid','$Quantity','$total','$CHOlderName','$CardNumber','$CardMonth', '$CardCVV', '$Id' )";	
	    $results_p = mysqli_query($conn, $sql_p); 
			
	    if(!$results_p)
	    {
		    $alert = "<script> alert('payment fail');</script>";
		    echo "$alert";
	    }
	    else
	    {				  
		    $alert = "<script> alert('Payment Successful');</script>";
		    echo "$alert";

            $sql_3 = "SELECT * FROM product WHERE PId ='$PId' ";			
            $result_3 = mysqli_query($conn, $sql_3); 
            $row_3 = mysqli_fetch_array($result_3);
        
            $PQuantity  = $row_3['Quantity'];            

            $Available = ($PQuantity - $Quantity);

            $sql3 = "UPDATE product SET Quantity = '$Available' WHERE PId = '$Pid' ";					
		    $results3 = mysqli_query($conn, $sql3); 

            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Home.php">';

	    }
    }       
}
?>












    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"
></script>

</body>
</html>