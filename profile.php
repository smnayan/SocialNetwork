<?php 
  
  session_start();
  include("header.php");
  
  if(isset($_SESSION['user_email'])){
	  header("location: index.php");
  }

?>

<html>
<head>
<?php
   
    $user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email='$user'";
	$run_user = mysqli_query($conn , $get_user);
	$row = mysqli_fetch_array($run_user);
				
	//$user_id = $row['user_id'];
	$user_name = $row['user_name'];
?>
<title> 
   <?php echo "$user_name";?>
</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="row">
	     <div class="col-sm-2">
		 </div>
		 <div class="col-sm-8">
		    <?php
			    echo "
				  <div>
				       <div> <img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'></div>
					   
					   <form action='profile.php?u_id=$user_id' method='POST' enctype='multipart/form-data'>
					   
					     <ul class='nav pull-left' style='position:absolute; top: 10px; left:40px;'>
					        <li class='dropdown'>
							    <button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>
								  Change cover
								</button>
								<div class='dropdown-menu'>
								     <center>
									     <p>Click<strong>Select Cover</strong> and then click the <br><strong>Update Cover </strong></p>
										 <label class='btn btn-info'>Select Cover
										 <input type='file' name='u_cover' size='60'>
										 
										 </label><br><br>
										 <button name='submit' class='btn btn-info'>Update Cover</button>
									 </center>
								
								</div>
							</li>   
					      </ul>
					   </form>
				  </div>
				  <div id='profle-img'>
				       <img src='users/$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
					   
					   <form action='profile.php?u_id=$user_id' method='POST' enctype='multipart/form-data'>
					   
					   <label id='update_profile'>Select Profile
					   <input type='file' name='u_image' size='60'>
					   
					   </label><br></br>
					   <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
					   
					   </form>
				  
				  </div>
				";
			?>
		 </div>
	</div>
</body>

</html>