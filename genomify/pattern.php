<!DOCTYPE html>
<html>
<?php  include('includes/header.php');   ?>

<body>

<?php  include('includes/nav.php');   ?>
<br>
<br>
<br>

<div class="container-fluid">
	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>Know Pattern Frequency</h2>
					<hr>
					

					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Home</a>
						
					</div>
					<br>
					
			</div>
	</div>


</div>
<br>

<style type="text/css">
	.form-control{
		margin: 10px;
		border-radius: 0px;
	}
	.lines {
		height: 200px !important;	}

</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group text-center">
				<form action="" method="post">
					<input placeholder="Enter a sub-squence like ATGCTTGA" name="pattern" class="form-control"></input>
					

					<button type="submit" class="btn btn-success btn-lg ">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>




</div>




</body>
</html>