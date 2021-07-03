<?php


include('header/header.php');




$name=$email=$uname=$pass=$conf_pass=$phone=$nid=$address="";
$name_err=$email_err=$pass_err=$uname_err=$nid_err=$phn_err=$add_err=$conf_pass_err=$geder_err="";
$flag = 1;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['submit']))
  {
    if(empty($_POST['name']))
    {
        $name_err="NAME CAN NOT BE EMPTY";
    $flag = 0;
    }else
    {
      $name=$_POST['name'];
    }
    if(empty($_POST['Email']))
    {
        $email_err="EMAIL CAN NOT BE EMPTY";
    $flag = 0;
    }else{
      $email=$_POST['Email'];
    }
    if(empty($_POST['uname']))
    {
        $uname_err="USERNAME CAN NOT BE EMPTY";
    $flag = 0;
    }else{
      $uname=$_POST['uname'];
      $uname = strtoupper($uname);
    }
    if(empty($_POST['pass']))
    {
        $pass_err="PASSWORD CAN NOT BE EMPTY";
    $flag = 0;
    }
    else{
      $pass=$_POST['pass'];
    }
    if(empty($_POST['con_pass']))
    {
        $conf_pass_err="CONFIRM PASSWORD CAN NOT BE EMPTY";
    $flag = 0;
    }else{
      $conf_pass=$_POST['con_pass'];
    }
    if(empty($_POST['nid']))
    {
      $nid_err="NATIONAL ID NUMBER CAN NOT BE EMPTY";
    $flag = 0;
    }else{
      $nid=$_POST['nid'];
    }
    if(empty($_POST['phone']))
    {
      $phn_err="PHONE NUMBER CAN NOT BE EMPTY";
    $flag = 0;
    }else{
      $phone=$_POST['phone'];
    }
    if(empty($_POST['address']))
    {
      $add_err="ADDRESS CAN NOT BE EMPTY";
    $flag = 0;
    }else{
      $address=$_POST['address'];
    }
    if($pass != $conf_pass)
    {
      $pass_err="PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH";
      $flag = 0;
    }
else{

    if(file_exists('../Controller/modarator.json'))
              {
                   $current_data = file_get_contents('../Controller/modarator.json');
                   $array_data = json_decode($current_data, true);
                   $extra = array(
                         'username' =>     $_POST['uname'],
                         'email' =>     $_POST['Email'],
                         'Name'   =>     $_POST['name'],
                         'password' =>     $_POST['pass'],
                         'Address' =>     $_POST['address'],
                         'phone'    =>     $_POST["phone"],
                          'nid'     =>     $_POST["nid"]
                   );
                   $array_data[] = $extra;
                   $final_data = json_encode($array_data);
                   if(file_put_contents('../Controller/modarator.json', $final_data))
                   {
                       echo '<script>alert("Data Added in modarator.json file")</script>';
                   }
              }
              else
              {
                   $error = 'JSON File not exits';
              }
     }


}
}




?>


<head>
  <title>Registration For Modarator</title>

<body>
<center><form class="box" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" name="registration">

      <h1>Registration For Modarator</h1>


          <input type="text" name="name" placeholder='NAME' value="<?php echo $name;?>"></td>


          <td id="name_err"><?php echo $name_err;?></td><br>



          <input type="text" name="Email" placeholder='EMAIL' value="<?php echo $email;?>"></td>



          <td id="email_err"><?php echo $email_err;?></td><br>



              <td><input type="text" name="uname" id="uname" placeholder='USERNAME' value="<?php echo $uname;?>"></td>


              <td id="uname_err"><?php echo $uname_err;?></td><br>



              <td><input type="password" name="pass" id="pass" placeholder='PASSWORD'></td>


              <td id="pass_err"><?php echo  $pass_err;?></td><br>



              <td><input type="password" name="con_pass" id="con_pass" placeholder='CONFIRM PASSWORD'></td>


              <td id="conf_pass_err"><?php echo  $conf_pass_err;?></td><br>


         <input type="text" name="nid" placeholder='NATIONAL ID NUMBER' value="<?php echo $nid;?>"></td>


         <td id="nid_err"><?php echo  $nid_err;?></td><br>



         <td><input type="text" name="phone" placeholder='PHONE NUMBER' value="<?php echo $phone;?>"></td>


         <td id="phn_err"><?php echo  $phn_err;?></td><br>




           <input type="text" placeholder='ADDRESS' name="address" value="<?php echo $address;?>" ></td>


         <td id="add_err"><?php echo  $add_err;?></td><br><br>



       <input type="submit" name="submit" value="REGISTER" id='btn'></td>






   </form></center>
<?php

include('footer/footer.php');



?>