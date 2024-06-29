<?php
   $connect = mysqli_connect("localhost", "root", "","placement"); // Establishing Connection with Server
   //mysql_select_db("placement") or die("Cant Connect to database"); // Selecting Database from Server
   
   
if(isset($_POST['submit']))
{ 
  
 $Name = $_POST['Fullname'];
 $USN = $_POST['USN'];
 $password = $_POST['PASSWORD'];
 $repassword = $_POST['repassword'];
 $Email = $_POST['Email'];
  $Question = $_POST['Question'];
   $Answer = $_POST['Answer'];
  

 $check = $connect->query("SELECT USN FROM slogin WHERE USN='".$USN."'") or die("Check Query");


 if(/*mysql_num_rows*/$check != $USN) 
 {
  if($repassword == $password)
  {
    
    
    if($query = $connect->query("INSERT INTO slogin(Name, USN ,PASSWORD,Email,Question,Answer) VALUES ('$Name', '$USN', '$password','$Email','$Question','$Answer')"))
    {
                       echo "<center> You have registered successfully...!! Go back to  </center>";
					             echo "<center><a href='index.php'>Login here</a> </center>";
					   
    }
  }
   else
    {
       echo "<center>Your password do not match</center>";
    }
   }
   else
   {
       echo "<center>This PEN already exists</center>"; 
  }
}
?>