<?php
include('config.php');
if($_GET['action']=='del')

{
$rid=$_GET['id'];
$sql="delete from tbluser where id=:id";
$query=$con->prepare($sql);
$query->bindParam(':id',$rid,PDO::PARAM_INT);
$query->execute();
echo "data delted";

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Read the data from database using PDO</title>
</head>
<body>
<h3>Read the data from database using PDO</h3>

<table>
	<tr>
		<th>Sno</th>
		<th>Name</th>
		<th>Phone No</th>
		<th>Email</th>
		<th>Posting</th>
		<th>Action</th>
	</tr>
<?php
$sql="select * from tbluser";
$query=$con->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
	$cnt=1;
	foreach ($results as $row ) {
		# code...


?>
<tr>
	<th><?php echo $cnt;?></th>
<th><?php echo $row->Name;?></th>
<th><?php echo $row->PhoneNumber;?></th>
<th><?php echo $row->Emailid?></th>
<th><?php echo $row->PostingDate;?></th>
<th><a href="update.php?id=<?php echo $row->id?>">Update</a> <a href="read.php?id=<?php echo $row->id?>&&action=del" onClick="return confirm('do you really want to delte');">Delete</a></th>
</tr>
<?php $cnt++; 	} } ?>
</table>



</body>
</html>