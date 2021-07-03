
<?php

include('header/header.php');


$suberr = $reporterr = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 if(isset($_POST["submit"])){

   if (empty($_POST["sub"]))
       {
          $suberr = " subject is required";
          $flag = True;
       }
       if (empty($_POST["report"]))
           {
              $reporterr = " Report is required";
              $flag = True;
           }

else
{

  echo '<script>alert("Successfully Repoted")</script>';
}




}

}

?>





<center><h1>Hire Now</h1>

<center>
	<form action="" method="post">
 <fieldset>
  <legend>Finalizing</legend>
  <label for="fname">Modarator Name:  </label>
   <label for="name" style="color:red;" ><?php echo $_SESSION["name"];?></label><br><br>
    <label for="lname">Subject :</label>
 <input type="text" id="sub" name="sub" value="">
	<span style="color: red"><?php echo $suberr; ?> </span><br><br>
 <label for="report">Report :</label>
<input type="textarea" id="report" name="report" value="">
	<span style="color: red"><?php echo $reporterr; ?> </span><br><br>
  <input type="submit" name="submit" value="Report">
 </fieldset>
</form>








<?php

include('footer/footer.php');



?>