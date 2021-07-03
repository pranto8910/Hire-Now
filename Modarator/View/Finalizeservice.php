
<?php


session_start();



 if(isset($_POST["submit"])){
echo '<script>alert("Successfully Hired")</script>';
}



?>





<!DOCTYPE html>
<html>
<body>

<center><h1>Hire Now</h1>

<center>
	<form action="" method="post">
 <fieldset>
  <legend>Finalizing</legend>
  <label for="fname">User Name:  </label>
   <label for="name" style="color:red;" ><?php echo $_SESSION["name"];?></label><br>
    <label for="fname">---------------- </label><br><br>

  <input type="submit" name="submit" value="Hire Now">
 </fieldset>
</form>








</body>
</html>
