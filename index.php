<?php
include('config.php');
if(isset($_POST['insert']))

{
//getting post values
	$name=$_POST['fullname'];
	$phnno=$_POST['phonenumber'];
	$emailid=$_POST['emailid'];
	$sql="insert into tbluser(Name,PhoneNumber,Emailid) value(:fname,:phno,:emlid)";
$query=$con->prepare($sql);
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phno',$phnno,PDO::PARAM_INT);
$query->bindParam(':emlid',$emailid,PDO::PARAM_STR);
$query->execute();
$lastinsertid=$con->lastInsertId();
if($lastinsertid)
{
echo "Data Inserted";
}
else
{
	echo "Something went wrong";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Values using PDO </title>
</head>
<body>
<form method="post">
	<p><?php // print_r(PDO::getAvailableDrivers()); //query to check available drivers?></p>
	<h3>Insert data into the database using PDO</h3>
	Name :<input type="text" name="fullname" required><br />
	Phone Number <input type="text" name="phonenumber" required><br />
	Email :<input type="email" name="emailid"  required><br />
	<input type="submit" name="insert" value="Submit">
</form>
</body>
</html>
