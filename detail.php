<!DOCTYPE html>
<?php 
	include ('functions/functions.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
</head> 

<body>
<!--Main wrapper start-->
<div class="main_wrapper">
	
	<!--Header start-->
	<div class="header_wrapper"> <!--Header starts -->
		<img id="logo" src="images/logo.png" />
		<img id="banner" src="images/ad_banner.gif"/>
	</div> 	
	<!--Header ends-->


	<div class="menubar"> 
		<ul id="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#">All Products</a></li>
			<li><a href="#">My Account</a></li>
			<li><a href="#">Sign Up</a></li>
			<li><a href="#">Shopping Cart</a></li>
			<li><a href="#">Contact Us</a></li>

		</ul>
		<div id="form">
			<form method="get" action="result.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search products"/>
				<input type="submit" name="search" value="Search">

			</form>
		</div>
	</div>

	<!--Content wrapper starts-->
	
	<div class="content_wrapper">
		<div class="sidebar"> 
			<div id="sidebar_title">Categories</div>
				<ul id="cats">
				<?php getCategories();?>
				</ul>
				
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands();?>
				</ul>
			</div>
	
		<div class="content_area"> 
			<div id="shopping_cart">
				<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

					Welcome Guest!
					<b style="color:yellow;">Shopping Cart  </b>- Total Items: Total Price: <a href="cart.php" style="color:yellow;">Go to Cart</a>

				</span>
				
			</div>
			<div id="products_box">
				<?php  getProducts();?>
			</div>
		</div>
	</div> <!--Content wrapper ends-->

	
	<div class="footer"> 
		<h2 style="text-align:center; padding:10px;">&copy by ilam</h2>
	</div>

</div> <!--main wrapper ends -->

</body>
</html>
