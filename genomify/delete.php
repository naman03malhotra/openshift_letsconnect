n<!DOCTYPE html>
<html>
<?php  include('includes/header.php');   ?>
<style type="text/css">
	.form-control{
		margin: 10px;
		border-radius: 0px;
	}
	.lines {
		height: 200px !important;	}

</style>

<body>

<?php  include('includes/nav.php');   ?>
<br>
<br>
<br>

<div class="container-fluid">
	


</div>
<br>


<?php  
if(isset($_POST['submit']))
{

	
$id=$_GET['id'];

query("DELETE from gene where id='$id'");

echo '<div class="container-fluid">


	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>Data Deleted Successfully</h2>
					<hr>
					




					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Go Home</a>
						
					</div><br>
					<div class="row">
					<a href="search" class="btn btn-lg btn-info btn-block">View All</a>
						
					</div><br>
					
					<br>
					
			</div>
	</div>';


}

else {
	

	
 ?>

<div class="container-fluid">


	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					
					




					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Home</a>
						
					</div>
					<h2>Are you sure you want to delete the data?</h2>
					<hr>
					<br>
					
			</div>
	</div>




	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group text-center">
				<form action="" method="post">
					<button class="btn btn-lg btn-danger" name="submit" type="submit">Yes</button>
					<a href="index" class="btn btn-lg btn-primary">No</a>

				</form>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>




</div>




</body>
</html>

<?php

}

