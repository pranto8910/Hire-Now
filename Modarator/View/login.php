<?php

$err_uname="";
$err_psw="";
$err_invalid="";
$errmassage="";
$flag=false;
$login = "";
$usernameErr = $passwordErr = "";
define("filepath", "../Controller/modarator.json");

if($_SERVER["REQUEST_METHOD"]=="POST"){


  if(empty($_POST['username']))
  {
    $err_uname="*Username Required";
    $flag=true;


  }

  if(empty($_POST['password']))
  {
    $err_psw="*Password Required";
    $flag=true;


  }


  if(!$flag)
      {

      $username = input_data($_POST["username"]);
      $password = input_data($_POST["password"]);

      $fileData = read();
      $users=json_decode($fileData);
  	foreach($users as $user)
  	{
  	if($user->username === $username && $user->password === $password)
  	$flag = true;
  	}
      if($flag)
      {
        session_start();
        $_SESSION['name']=$username;

  	header("Location: modaratorpanel.php");
      }
      else
      {
  	$err_invalid =  "Invalid Id";
      }
      }
  }
    function input_data($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

  ?>





  <center><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h1 align = "center">Login</h1>


       <!--php validation error dekhanor jonno-->


       <input type="text" placeholder="Enter Username" id="username" name="username">
     <span  style="color: red"> <?php echo $err_uname;?></span><br><br>



       <input type="password" placeholder="Enter Password" id="password"  name="password" >
                 <td><span  style="color: red"><?php echo $err_psw;?></span><br><br>



         <input type="submit" name="submit" value="Login">

  	</form>
   <?php
   echo "<h1>". $err_invalid . "</h1>" ;
  function read() {
  $file = fopen(filepath, "r");
  $fz = filesize(filepath);
  $fr = "";
  if($fz > 0) {
  $fr = fread($file, $fz);
  }
  fclose($file);
  return $fr;
  }
  ?>
  </body>
  </html>
