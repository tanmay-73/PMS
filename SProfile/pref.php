<?php
  session_start();
  if($_SESSION["username"]){
    echo "Welcome, ".$_SESSION['username']."!";
  }
   else {
	   header("location: index.php");
}

?>
<?php
$connect = mysqli_connect("localhost", "root", "","placement"); // Establishing Connection with Server
// mysql_select_db("details"); // Selecting Database from Server
if(isset($_POST['submit']))
{
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$pn = $_POST['PEN'];
$sun = $_SESSION["username"];
$phno = $_POST['Num'];
$email = $_POST['Email'];
$date = $_POST['DOB'];
$cursem = $_POST['Cursem'];
$branch = $_POST['Branch'];


$beaggregate = $_POST['Beagg'];
$back = $_POST['Backlogs'];
$hisofbk = $_POST['History'];
$detyear = $_POST['Dety'];
if($pn !=''||$email !='')
{
	if($pn == $sun)
    {
    if($query = $connect->query("INSERT INTO `placement`.`basicdetails` ( `FirstName`, `LastName`, `PEN`, `Mobile`, `Email`, `DOB`, `Sem`, `Branch`,`BE`, `Backlogs`, `HofBacklogs`, `DetainYears`, `Approve`)
          VALUES ('$fname', '$lname', '$pn', '$phno', '$email', '$date', '$cursem', '$branch','$beaggregate', '$back', '$hisofbk', '$detyear', '0')"))
    {
				echo "<center>Details has been received successfully...!!</center>";
      }


		else echo "FAILED";
}

else{
	  echo "<center>enter your PEN only...!!</center>";
}
}
}
?>


<?php
$connect = mysqli_connect("localhost", "root", "","placement"); // Establishing Connection with Server
// mysql_select_db("details"); // Selecting Database from Server
if(isset($_POST['update']))
{
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$pn = $_POST['PEN'];
$sun = $_SESSION["username"];
$phno = $_POST['Num'];
$email = $_POST['Email'];
$date = $_POST['DOB'];
$cursem = $_POST['Cursem'];
$branch = $_POST['Branch'];

$beaggregate = $_POST['Beagg'];
$back = $_POST['Backlogs'];
$hisofbk = $_POST['History'];
$detyear = $_POST['Dety'];

if($pn !=''||$email !='')
{
	if($pn == $sun)
	{

	$sql = $connect->query("SELECT * FROM `placement`.`basicdetails` WHERE `PEN`='$pn'");
	if($sql->num_rows == 1)
	{

		if($query = $connect->query("UPDATE `details`.`basicdetails` SET `FirstName`='$fname', `LastName`='$lname', `Mobile`='$phno', `Email`='$email', `DOB`='$date', `Sem`='$cursem', `Branch`= '$branch', `BE`='$beaggregate', `Backlogs`='$back', `HofBacklogs`='$hisofbk', `DetainYears`='$detyear' ,`Approve`='0'
           WHERE `basicdetails`.`PEN` = '$pn'"))
               {
				echo "<center>Data Updated successfully...!!</center>";
               }

            else echo "<center>FAILED</center>";

	}
	else echo "<center>NO record found for update</center>";
	}
else
	echo "<center>enter your PEN only</center>";
}
}
?>
