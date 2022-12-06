<?php 

session_start();
if(session_destroy())
{
	$msg = " Log out Succsessfull ";
    echo "<script type='text/javascript'>alert('$msg');</script>";
	header("refresh:0; url=Home.php");
	
}

?>
