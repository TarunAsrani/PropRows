<?php 
include_once "connection.php";
session_start();

if (!(isset($_SESSION['agent_id']) && isset($_SESSION['agent_email']))) {
	header("Location: index.php");
     exit();
}
if(isset($_GET['id'])){
	$pageid = $_GET['id'];
}

$query = "select * from properties where properties.property_id = '$pageid'";
#$query = "select * from properties where properties.property_id = '$pageid'";
$result = mysqli_query($con, $query);

if(!$result){
	echo "Error Found!!!";
}

while($property_result = mysqli_fetch_assoc($result)){
			$property_id = $property_result['property_id'];
			$property_title = $property_result['property_title'];
			$property_details = $property_result['property_details'];
			$delivery_type = $property_result['delivery_type'];
			$availablility = $property_result['availablility'];
			$price = $property_result['price'];
			$property_address = $property_result['property_address'];
			$bed_room = $property_result['bed_room'];
			$liv_room = $property_result['liv_room'];
			$parking = $property_result['parking'];
			$kitchen = $property_result['kitchen'];
			$utility = $property_result['utility'];
			$property_type = $property_result['property_type'];
			$floor_space = $property_result['floor_space'];
}
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thebootstrapthemes.com/live/thebootstrapthemes-realestate/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2017 02:45:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Add Property - Prop Rows</title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="assets/jquery-1.9.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

<script src='assets/google_analytics_auto.js'></script></head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="images/pngegg.png" width=10% alt="Realestate"></a>

            <div class="menu">
              <ul class="pull-right">
              	<li><a href="index.php">Home</a></li>
                <li><a href="list-properties.php">List Properties</a>
                	 <ul class="dropdown">
                    	<li><a href="sale.php">Properties on Sale</a></li>
                        <li><a href="rent.php">Properties on Rent</a></li>
                    </ul>
                </li>

              </ul>
           </div>
</div>
<!-- #Header Starts -->
</div><!-- banner -->
<div class="inside-banner">
  <div class="container">
    <h2>Add Property</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
			<?php 
				parse_str($_SERVER['QUERY_STRING'], $query_params);
			?>
				<div class="alert alert-danger" role="alert"><?php echo $query_params['error']; ?>
		</div>
			<form action="updateProperty.php" method="post">
                <input type="text" class="form-control" placeholder="Property Title" name="property_title" value="<?php echo $property_title;?>">
                <input type="text" class="form-control" placeholder="Property Details" name="property_details" value="<?php echo $property_details;?>">
                <select name="delivery_type" class="form-control">
                <option value="Rent" <?php if($delivery_type==='Rent') echo 'selected';?>>Rent</option>
                <option value="Sale"  <?php if($delivery_type==='Sale') echo 'selected';?>>Sale</option>
              </select>
              <select name="availablility" class="form-control">
                <option value="0" <?php if($availablility===0) echo 'selected';?>>Available</option>
                <option value="1" <?php if($availablility===1) echo 'selected';?>>Unavailable</option>
              </select>
               <input type="number" class="form-control" placeholder="Price" name="price" value="<?php echo $price;?>">
               <input type="number" class="form-control" placeholder="Bed Room" name="bed_room" value="<?php echo $bed_room;?>">
               <input type="number" class="form-control" placeholder="Living Room" name="liv_room" value="<?php echo $liv_room;?>">
               <input type="number" class="form-control" placeholder="Parking" name="parking" value="<?php echo $parking;?>">
               <input type="number" class="form-control" placeholder="Kitchen" name="kitchen" value="<?php echo $kitchen;?>">
               	<select name="property_type" class="form-control">
                <option>Property Type</option>
                <option value="Apartment" <?php if($property_type==='Apartment') echo 'selected';?>>Apartment</option>
                <option value="Building" <?php if($property_type==='Building') echo 'selected';?>>Building</option>
                <option value="Office-Space" <?php if($property_type==='Office-Space') echo 'selected';?>>Office-Space</option>
              </select>
              <input type="text" class="form-control" placeholder="Floor Space" name="floor_space" value="<?php echo $floor_space;?>">
				<input type="text" class="form-control" placeholder="Utility " name="utility" value="<?php echo $utility;?>">
				<input type="number" hidden value=<?php echo $pageid?> name="property_id">
                <input type="text" class="form-control" placeholder="Property Address" name="property_address" value="<?php echo $property_address;?>">
      <button type="submit" class="btn btn-success" name="Submit">Update Listing</button>

</form>


        </div>

</div>
</div>
</div>




<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Information</h4>
                   <ul class="row">
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php">Home</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.html">About</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.html">Contact</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                    <h4>Newsletter</h4>
                    <p>Get notified about the latest properties in our marketplace.</p>
                    <form class="form-inline" role="form">
                            <input type="text" placeholder="Enter Your email address" class="form-control">
                                <button class="btn btn-success" type="button">Notify Me!</button></form>
            </div>

            <div class="col-lg-3 col-sm-3">
                    <h4>Follow us</h4>
                    <a href="#"><img src="images/facebook.png" alt="facebook"></a>
                    <a href="#"><img src="images/twitter.png" alt="twitter"></a>
                    <a href="#"><img src="images/linkedin.png" alt="linkedin"></a>
                    <a href="#"><img src="images/instagram.png" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Contact us</h4>
                    <p><b>Prop Rows</b><br>
                      <span class="glyphicon glyphicon-map-marker"></span>Pune<br>
                      <span class="glyphicon glyphicon-envelope"></span> tarunhans2907@gmail.com<br>
                      <span class="glyphicon glyphicon-earphone"></span> +91-xxx-xxx-xxxx</p>
            </div>
        </div>
<p class="copyright">Copyright 2017. All rights reserved.	</p>


</div></div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Login</h4>
          <form class="" role="form">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>
        </div>
        <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and get updated with all the properties deal happening around.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='register.html'">Join Now</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</body>

<!-- Mirrored from thebootstrapthemes.com/live/thebootstrapthemes-realestate/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2017 02:45:26 GMT -->
</html>
