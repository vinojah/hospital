<?php
	$con=new mysqli('localhost','root','','karuna_clinic_center');

if($con-> connect_errno)
{
	echo $con->connect_error;
	die();
}

	if(isset($_SESSION['Doctor_id'])){
		$row=$_SESSION['First_Name'];
		$Doctor_id=$_SESSION['Doctor_id'];
		echo "<p id='name'>Dr.".$row."</p>";
	}
$db = mysqli_connect('localhost', 'root', '', 'karuna_clinic_center');
				//$date=$_POST["date"];	
				
				//$docId==$_SESSION['Doctor_id'];
				//$doctorid=$_SESSION['Doctor_id'];
				//$time=$stime." to ".$etime;
				
$sql="DELETE from appointment where Appointment_id=".$_GET['id'].";";
	$db = mysqli_connect('localhost', 'root', '', 'karuna_clinic_center');

$Doctor_id=$_SESSION['Doctor_id'];


$row1=mysqli_query($db,"SELECT Email,Firstname FROM patient where Doctor_id='".$Doctor_id."'");
$row2=mysqli_fetch_assoc($row1);
$db = mysqli_connect('localhost', 'root', '', 'karuna_clinic_center');

$row3=mysqli_query($db,"SELECT Email,First_Name FROM doctor where Doctor_id='".$Doctor_id."'");
$row4=mysqli_fetch_assoc($row3); 
$row5=mysqli_query($db,"SELECT Appointment_id  FROM appointment where Doctor_id='".$Doctor_id."'");
$row6=mysqli_fetch_assoc($row5);
include "classes/class.phpmailer.php";
					

$mail1=new PHPMailer();
$mail1->IsSMTP();
$mail1->SMTPDebug=1;
$mail1->SMTPAuth=true;
$mail1->SMTPSecure='ssl';
$mail1->Host="smtp.gmail.com";
$mail1->Port=465;
$mail1->IsHTML(true);
$mail1->Username=("karunacliniccenter@gmail.com");
$mail1->Password="shiyani123";
$mail1->SetFrom("karunacliniccenter@gmail.com");
$mail1->Subject = "Appointment Cancellation Details";
$mail1->Body="Your Appointment Cancellation Details:<br><br>
                   Dear ".$row2['Firstname'].",
                   Your Appointment  is cancelled.. Sorry for the inconvenience!!";

$mail1->AddAddress($row2['Email']);
	if(($con->query($sql)) && ($mail1->Send()))
	{
		echo "<script> alert('Appointment cancelled'); </script>";
		 echo "<script>window.open('doctor_view_edit_appointments.php?mes=Appointment Canceled','_self')</script>";
	}
	else
	{
		echo "<script>window.open('doctor_view_edit_appointments.php','_self')</script>";
	}
?>