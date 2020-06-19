<?php
$con=new mysqli('localhost','root','','karuna_clinic_center');

if($con-> connect_errno)
{
	echo $con->connect_error;
	die();
}

?>
<?php
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select First_Name,Doctor_id from doctors where Category='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['Doctor_id']); ?>"><?php echo htmlentities($row['First_Name']); ?></option>
  <?php
}
}
?>