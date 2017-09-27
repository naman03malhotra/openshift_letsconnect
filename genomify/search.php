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
					<h2>Search for Data</h2>
					<hr>
					

					<div class="row">
					<a href="index" class="btn btn-lg btn-primary btn-block">Home</a>
					<a href="" class="btn btn-lg btn-info btn-block">Refresh</a>
						
					</div>
					<br>
					
			</div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
			<div class="form-group text-center">
			<form action="" method="post">
			<div class="col-md-6">
			
					<input placeholder="Search relavent data" name="search_key" class="form-control"></input>
			</div>	
			<div class="col-md-2">
				<select size="1"  name="field" required class="form-control">
								<option value="" style="display:none">Category</option>
								<option value="name">Name of Org.</option>
								<option value="loc">Location of Gene</option>
								<option value="gene_name">Gene Name</option>
								<option value="seq">Seq pattern</option>
				</select>
			</div>

					<button name="submit" type="submit" class="btn btn-success btn-lg ">Search</button>
				
	
				</form>
			</div>
		<div class="col-md-2"></div>
	</div>








    <div class="row col-md-12 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name Org</th>
            <th>Location</th>
             <th>Gene Name</th>
             <th>Time Ins.</th>
             <th class="text-center">View Seq.</th>

            <th class="text-center">Action</th>
        </tr>
    </thead>

    <?php
    $search_key=$_POST['search_key'];
    if(isset($_POST['search_key']))
    {
    	$field=$_POST['field'];
    	$q=query("SELECT * from gene where $field like '%$search_key%' order by id desc");
	
    } 
    else
    {
        $q=query("SELECT * from gene order by id desc");
    }
    while($row= mysqli_fetch_array($q))
    {
           echo '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['loc'].'</td>
                 <td>'.$row['gene_name'].'</td>
                   <td>'.date("jS M'y D h:i A",$row['time']).'</td>
                 <td class="text-center"><a class="btn btn-info btn-xs" target="_blank" href="view?id='.$row['id'].'"><span class="glyphicon glyphicon-eye-open"></span> View</a> </td>
                <td class="text-center"><a class="btn btn-info btn-xs" target="_blank" href="update?id='.$row['id'].'"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="delete?id='.$row['id'].'" target="_blank" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>';
        }

        ?>
           
    </table>
    </div>




			<?php

				$q= query("SELECT * from gene order by id desc");
					if(isset($_POST['submit']))
					{
						
					}
		     ?>
	



</div>




</body>
</html>




