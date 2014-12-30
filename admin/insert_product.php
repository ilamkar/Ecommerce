
<!DOCTYPE html>
<html>
<?php
include "database.php";
?>
<head>
	<title>Inserting Product</title>

	<!-- Text editor -->
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="750px" border="2" bgcolor="orange">
			<tr align="center">
				<td colspan="3"><h2>Insert new post here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Product Title :</b></td>
				<td><input type="text" name="product_title" size="60" required></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category :</b></td>
				<td>
				<select name="product_category">
				<option>Select a Category</option>
			<?php 

			$run_categories=mysqli_query($connect,"SELECT * from categories");
			
			while($row_categories=mysqli_fetch_array($run_categories)){
			
			$category_id=$row_categories['category_id'];
			$category_title=$row_categories['category_title'];

			echo "<option value='$category_id'>$category_title</option>";
		}


			?>
				</select>
			</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Brand :</b></td>
				<td>
		<select name="product_brand">
				<option>Select a Brand</option>
			<?php
			$run_brands=mysqli_query($connect,"SELECT * from brands");
			while($row_brands=mysqli_fetch_array($run_brands)){
		
			$brand_id = $row_brands['brand_id'];
			$brand_title =$row_brands['brand_title'];

			echo "<option value='$brand_id'>$brand_title</option>";
		}
		?>
		</select>

				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Image :</b></td>
				<td><input type="file" name="product_image"></td>
			</tr>
			<tr>
				<td align="right"><b>Product Price :<b/></td>
				<td><input type="text" name="product_price" required></td>
			</tr>
			<tr>
				<td align="right"><b>Product Description :<b/></td>
				<td><textarea name="product_desc" rows="10" cols="20"></textarea></td>
				
			</tr>
			<tr>
				<td align="right"><b>Product Keyworks :</b></td>
				<td><input type="text" name="product_keywords" size="50" required></td>
			</tr>
			<tr align="center"> 
				<td colspan="3"><input type="submit" name="insert_post" value="Insert Product now"></td>
			</tr>
		
		
		</table>
	</form>
</body>
</html>
<?php
	if(isset($_POST['insert_post'])){

		// getting the text data from form field
		$product_title	= $_POST['product_title'];
		$product_category= $_POST['product_category'];
		$product_brand	= $_POST['product_brand'];
		$product_price	= $_POST['product_price'];
		$product_desc	= $_POST['product_desc'];
		$product_keyword= $_POST['product_keywords'];

		//getting the image from the field
		$product_image =$_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		//moving image to the folder
		move_uploaded_file($product_image_tmp,"product_images/$product_image");

		$insert_product = "INSERT INTO products(product_category,product_brand,product_title,product_price,product_description,
			product_image,product_keyword) VALUES('$product_category','$product_brand','$product_title','$product_price',
			'$product_desc','$product_image','$product_keyword')";

		//inserting into database
		$insert_pro = mysqli_query($connect,$insert_product);


			if($insert_pro){
				echo "<script>alert('The product has been inserted')</script>";
				echo "<script>window.open('insert_product.php','_SELF')</script>";
			}else{
				echo "<script>alert('Not inserted')</script>";
				echo mysqli_error($connect);
			}

	}


?>