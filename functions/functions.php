<?php
			include ('includes/database.php');

	
	
	// getting the categories
	function getCategories(){
		global $connect;
		$run_categories=mysqli_query($connect,"SELECT * FROM categories");
		while($row_categories=mysqli_fetch_array($run_categories)){
			
			$category_id=$row_categories['category_id'];
			$category_title=$row_categories['category_title'];

			echo "<li><a href='#'>$category_title</a></li>";
		}
	}

	// getting the brands
	function getBrands(){
		global $connect;
		$run_brands=mysqli_query($connect,"SELECT * FROM brands");
		while($row_brands=mysqli_fetch_array($run_brands)){
		
			$brand_id = $row_brands['brand_id'];
			$brand_title =$row_brands['brand_title'];

			echo "<li><a href='#'>$brand_title</a></li>";
		}
	}

	function getProducts(){
		global $connect;
		$get_products ="SELECT * FROM products ORDER BY RAND() LIMIT 0,6";

		$run_products = mysqli_query($connect,$get_products);

		while ($row_products =mysqli_fetch_array($run_products)) {
			
			$prod_id = $row_products['product_id'];
			$prod_category = $row_products['product_category'];
			$prod_brand = $row_products['product_brand'];
			$prod_title = $row_products['product_title'];
			$prod_price = $row_products['product_price'];
			//$prod_desc = $row_products['product_description'];
			$prod_image = $row_products['product_image'];
			//$prod_keyword = $row_products['product_keyword'];

			echo "<div id='single_product'>
					<h3>$prod_title</h3>
					<img src='admin/product_images/$prod_image' width='180' height='180' />
					<p><b>$ $prod_price</b></p>

					<a href='details.php?pro_id=$prod_id' style='float:left;'>Details</a>

					<a href='index.php?pro_id=$prod_id'><button style='float:right;'>Add to Cart</button></a>

			</div>";
		}
	}
?>