<?php 
     include("db_connection/connect.php");
     if(isset($_GET['id'])){

			$id = mysqli_real_escape_string($connect, $_GET['id']);

				$sql = "SELECT * FROM reasons WHERE id = $id";

				$results = mysqli_query($connect, $sql);
				$students = mysqli_fetch_all($results, MYSQLI_ASSOC);

				 mysqli_free_result($results);
				 
				 mysqli_close($connect);
             
	 }



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include('header.php'); ?>

	 <div class="container">
	
	 <?php foreach ($students as  $student) { ?>

          <h3> <?php echo $student['firstName']. " " . $student['lastName']; ?> </h3> 
             <br><br>
		         
				    <?php echo $student["message"] ?>
			<br><br>

				   <?php echo $student['dateTime']; ?>
               <br><br>
	 <?php }?>
		
	 </div>
 
        

 <?php include('footer.html'); ?>
 </html>