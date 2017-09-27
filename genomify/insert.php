<!DOCTYPE html>
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
	$org_name=$_POST['org_name'];
	$pos=$_POST['pos'];
	$gene_name=$_POST['gene_name'];
	$seq=preg_replace( "/\r|\n|\s+/", "",$_POST['seq']);
	


query("INSERT into gene(name,loc,gene_name,seq,time) values ('$org_name','$pos','$gene_name','$seq','$time' ) ");

echo '<div class="container-fluid">


	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>Data Successfully Submitted.</h2>
					<hr>
					




					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Go Home</a>
						
					</div><br>
					<div class="row">
					<a href="" class="btn btn-lg btn-success btn-block">Insert Again</a>
						
					</div>
					<br>
					<div class="row">
					<a href="search" class="btn btn-lg btn-info btn-block">View All</a>
						
					</div>
					<br>
					
			</div>
	</div>';


}

else {
 ?>

<div class="container-fluid">


	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>Insert Data</h2>
					<hr>
					




					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Home</a>
						
					</div>
					<br>
					
			</div>
	</div>




	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group text-center">
				<form action="" method="post">
					<input placeholder="Name of Organism" name="org_name" class="form-control" required></input>
					<input placeholder="Gene Name" name="gene_name" class="form-control" ></input>
					<input placeholder="location of gene" name="pos" class="form-control" required></input>
					
					<textarea class="lines form-control" placeholder="Gene Sequence" name="seq" required></textarea>

					<button name="submit" type="submit" class="btn btn-success btn-lg ">Submit</button>
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

