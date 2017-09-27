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
	$seq=$_POST['seq'];
	$id=$_GET['id'];
	


query("UPDATE gene set name='$org_name',loc='$pos',gene_name='$gene_name',seq='$seq',time='$time' where id='$id'");

echo '<div class="container-fluid">


	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>Data Successfully Updated</h2>
					<hr>
					




					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Go Home</a>
						
					</div><br>
					<div class="row">
					<a href="search" class="btn btn-lg btn-success btn-block">View All</a>
						
					</div>
					<br>
					
			</div>
	</div>';


}

else {
	$id=$_GET['id'];

	$q=query("SELECT * from gene where id='$id'");
	$row=mysqli_fetch_array($q);
 ?>

<div class="container-fluid">


	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>Update Data</h2>
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
					<input placeholder="Name of Organism" value="<?php echo $row['name'];?>" name="org_name" class="form-control"></input>
										<input placeholder="gene name" value="<?php echo $row['gene_name'];?>" name="gene_name" class="form-control"></input>
<input placeholder="location of gene" value="<?php echo $row['loc'];?>" name="pos" class="form-control"></input>
					<textarea class="lines form-control"  placeholder="sequence" name="seq"><?php echo $row['seq'];?></textarea>

					<button name="submit" type="submit" class="btn btn-success btn-lg ">Update</button>
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

