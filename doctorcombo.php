<?php
//echo "<script>alert('cid');</script>";
$con=new mysqli('localhost','root','','karuna_clinic_center');

if($con-> connect_errno)
{
	echo $con->connect_error;
	die();
}

$sql = "select * from doctor where id={$_POST['id']}";
$res = $con->query($sql);

echo "<option value=''>Select</option>";
	while ($row=$res->fetch_assoc()) {
		echo "<option value='{$row["Doctor_id"]}'>{$row["First_Name"]}</option>";
		echo "sdfdsfadsfadsfsd";
	}

?>