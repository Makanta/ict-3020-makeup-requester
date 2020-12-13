<?php 
include('db_connection/connect.php');

$sql = 'SELECT * FROM reasons';
$values = mysqli_query($connect, $sql);
$results = mysqli_fetch_all($values, MYSQLI_ASSOC);

 ?>
<!DOCTYPE html>
<html>
<?php  include('header.php'); ?>

<div class="container">

 <h1>Students Information</h1>
<h3>Requests(<?php echo count($results);?>)</h3>
      
<?php foreach($results as $result){ ?>

       <div class="container">
              <div class="group-list">
                            <p class="list-group-item list-group-item-action list-group-item-light">
                                   
                                   <a href="more_info.php?id=<?php echo $result["id"] ?>"><?php echo $result['firstName'];?></a>
                            </p>
              </div>
       </div>      

<?php } ?>

</div>

<?php include('footer.html'); ?>
</body>
</html>
