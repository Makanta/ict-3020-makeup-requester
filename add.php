<?php 
       include('db_connection/connect.php');

       $errors = array('size'=>'','type'=>'', 'error'=>'');

      if(isset($_POST['submit'])){

          $firstName = mysqli_real_escape_string($connect, $_POST['fName']);
          $lastName = mysqli_real_escape_string($connect, $_POST['lName']);
          $message = mysqli_real_escape_string($connect, $_POST['sms']);

          
  $sql = "INSERT INTO reasons(firstName,lastName,message) VALUES('$firstName','$lastName','$message')";
                  
    if(mysqli_query($connect, $sql)){
     // echo 'Success';
  header('Location:https://moodle.unza.zm/course/view.php?id=2363');
    }else{
      echo 'sending failed!'.mysqli_error($connect);
    }



        $file  = $_FILES['file'];

          //  print_r($file);

             $fileName = $file['name'];
             $fileSize = $file['size'];
             $fileError = $file['error'];
            $file_Tmp = $file['tmp_name'];
            $fileType = $file['type'];

           // echo $message;
           
            $fileType = strtolower($fileType);

            $fileExt = explode('.', $fileName);

            if($fileError === 0){

                   if(end($fileExt)==='pdf' ){

                            if($fileSize <= 1023000){
                                  $load = 'uploads/'.$fileName;
                                  move_uploaded_file($file_Tmp, $load);
                            }else{
                              $errors['size'] = 'You can not upload a file more than ';
                            }

                   }else{
                     $errors['type'] = 'file could not upload, You are only allowed to upload pdf documents';
                   }

            }else{
              $errors['error'] = 'There was an error while uploading the file!';
            }


              
          
        }
            

 	?>

 <!DOCTYPE html>
 <html>
 <?php include('header.php'); ?>

   <div class="container">

   	     <div class="row">
   	     	   <div class="col-md-8">
   	     	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
   	     	    
   	     	     <div class="form-group">
   	     	     		 <label  for="fName">Enter your first name</label><br>
   	     	     		 <input type="text" name="fName" required id="fName">
   	     	     </div><br>

 					<div class="form-group row-sm-8">

   	     	     		 <label for="lName">Enter your last name</label><br>
   	     	     		 <input type="text" name="lName" required id="lName">
   	     	     </div><br><br>
   	     	     <div class="form-group">
   	     	     		 <label for="sms">Enter the reason you missed the assesment</label><br>
   	     	     		 <textarea name="sms" required cols="50" rows="10" id="sms">
   	     	     		 	
   	     	     		 </textarea>
   	     	     </div><br><br>
                                 </div>

                            <div class="col-sm-4">
   	            		  
   	            		  	<label for="file">Upload pdf for proof</label><br>
   	            		  	<input type="file" name="file" required id="file">
   	            		  	<small style="color: red;"><?php 
                                  
                                  if($errors){
                                    echo $errors['size'];
                                    echo $errors['type'];
                                    echo $errors['error'];
                                  }

                         ?></small>
   	      	            	</div> <br><br>


                   <div class="row justify-content-md-center">
                   	<div class="col-md-3">
   	     	     <input type="submit" name="submit" value="submit">
   	     	     <br><br>
   	     	     </div>
   	     	     		</div>	

   	     </form>

   	          
   	     </div>
   </div>

 <?php include('footer.html'); ?>
</html>
