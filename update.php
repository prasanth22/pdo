<?php
include('config.php');
if(isset($_POST['update']))

{
	$rid=$_GET['id'];
//getting post values
	$name=$_POST['fullname'];
	$pphonenumber'];hnno=$_POST['
	$emailid=$_POST['emailid'];
	$sql="update  tbluser set Name=:fname,PhoneNumber=:phno,Emailid=:emlid where id=:id";
$query=$con->prepare($sql);
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phno',$phnno,PDO::PARAM_INT);
$query->bindParam(':emlid',$emailid,PDO::PARAM_STR);
$query->bindParam(':id',$rid,PDO::PARAM_STR);
$query->execute();

echo "Data Updated";

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Values using PDO </title>
</head>
<body>
<form method="post">
	<h3>Update data into the database using PDO</h3>
<?php
$rid=$_GET['id'];
$sql="select * from tbluser where id=:id";
$query=$con->prepare($sql);
$query->bindParam(':id',$rid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
	$cnt=1;
	foreach ($results as $row ) {

?>
	Name :<input type="text" name="fullname" value="<?php echo $row->Name;?>" required><br />
	Phone Number <input type="text" name="phonenumber" value="<?php echo $row->PhoneNumber;?>" required><br />
	Email :<input type="email" name="emailid" value="<?php echo $row->Emailid;?>" required><br />
<?php }} ?>
	<input type="submit" name="update" value="Update">
</form>
</body>
</html>
