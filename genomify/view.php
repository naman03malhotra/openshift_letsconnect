<style type="text/css">
	
</style>

<!DOCTYPE html>
<html>
<?php  include('includes/header.php');   ?>
<link rel="stylesheet" type="text/css" href="css/gly.css">

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



<div class="container-fluid">
	<div class="row">

		
			<div class="col-md-8 col-md-offset-2 text-center">
					<h2>View Data</h2>
					<hr>
					

					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Home</a>
						
					</div>
					<br>
					
			</div>
	</div>

	







    <div class="row col-md-12 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th class="text-center">Sequence Data</th>
            
        </tr>
    </thead>

    <?php 
    $id= $_GET['id'];

    $q=query("SELECT seq from gene where id='$id'");
  $row= mysqli_fetch_array($q);
    
           echo '<tr>
                <td style="word-break:break-word;">'.$row['seq'].'</td>
                
            </tr>';
        

        ?>
           
    </table>
    </div>




			
	



</div>




</body>
</html>




