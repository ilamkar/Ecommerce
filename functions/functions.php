<?php
			include ('includes/database.php');

	
	
	// getting the categories
	function getCategories(){
		global $connect;
		$run_categories=mysqli_query($connect,"SELECT * from categories");
		while($row_categories=mysqli_fetch_array($run_categories)){
			
			$category_id=$row_categories['category_id'];
			$category_title=$row_categories['category_title'];

			echo "<li><a href='#'>$category_title</a></li>";
		}
	}

	// getting the brands
	function getBrands(){
		global $connect;
		$run_brands=mysqli_query($connect,"SELECT * from brands");
		while($row_brands=mysqli_fetch_array($run_brands)){
		
			$brand_id = $row_brands['brand_id'];
			$brand_title =$row_brands['brand_title'];

			echo "<li><a href='#'>$brand_title</a></li>";
		}
	}
?>