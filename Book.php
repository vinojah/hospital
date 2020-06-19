<?php
$con=new mysqli('localhost','root','','karuna_clinic_center');

if($con-> connect_errno)
{
	echo $con->connect_error;
	die();
}

?>
<?php
session_start();
if(!isset($_SESSION['Patient_id'])){
	header("location:Login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<title> Online Channelling </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<style>
		* {
			box-sizing: border-box;
		}
		.header::after {
			content: "";
			clear: both;
			display: table;
		}
		
		.bottom type::after {
			content: "";
			clear: both;
			display: table;
		}
		
		[class*="col-"] {
			float: left;
			padding: 15px;
		}
		
		.col-1 {width: 8.33%;}
		.col-2 {width: 16.66%;}
		.col-3 {width: 25%;}
		.col-4 {width: 33.33%;}
		.col-5 {width: 41.66%;}
		.col-6 {width: 50%;}
		.col-7 {width: 58.33%;}
		.col-8 {width: 66.66%;}
		.col-9 {width: 75%;}
		.col-10 {width: 83.33%;}
		.col-11 {width: 91.66%;}
		.col-12 {width: 100%;}
	
		.title{
			
						height:200px;
			background-image:url("Aurora-Soft-Blue-abstract-wallpapers-illusions-polish-shape-abstract-aurora-1920x1080.jpg");
			height:200px;
			border-radius: 25px 25px 0px 0px;
			font-family:Brush Script MT;
			font-size:60px;
			color: white;
			padding:5px;
			line-height:0.5px;
		}
		
		.header{
			background-color:  #d5dbdb;
			text-decoration: none;
			font-family:Algerian;
			color:#0b8276;
			font-size:25px;
			text-align:center;
		}
					legend {
				color: #002080;
				font-size: 18px;
				font-weight:bold;
			}
			.field input,textarea,select {
		
				margin-left: 150px;
			}
		
		#footer div {
				background-color: #66d9ff;
				width: 40%;
				border-radius: 5px;
			}
			

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.contact{
			background-color:   #d5dbdb ;
			padding:0.1%;
			border-radius: 15px;
			margin-bottom:10px;
			font-size:20px;
			line-height:45px;
		}
		
a:visited{
		color:blue;
		}
		a:active{
		color:white;
		}
		a:link{
		text-decoration:none;
		}


.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.b{
			font-family:Agency FB;
			font-size:30px;
		}
.combostyle{
	width: 200px;
  padding: 5px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
	</style>



</head>
<body>

<div class="title col-12">
	<div class="a col-10">
		<h1>Karuna Clinic Center</h1>
		
		<h2 style="font-family:Agency FB;font-size:30px;">You Can Trust Us</h2>
		</div>
		<div class="b col-2">
	<?php
	if(isset($_SESSION['Patient_id'])){
		$row=$_SESSION['Firstname'];
		echo "<p id='name'>".$row."</p>";
	}
	?>
		<p><image src="images\login-icon-png-20.png" width="40%" height="40%"></br><a href="logout.php" style="font-family:Agency FB;font-size:30px;"> Logout</a></p>
		</div>
	</div>
	
	<div class="header col-12">
	
		<div  class="Home col-4">
			<a href="Home.php">Home</a>
		</div>
		
		
		
		<div class="Customer col-4">
			<a href="Services.php">Services </a>
		</div>
		
		<div class="Contact col-4">
			<a href="Contact.php">Contact Us</a>
		</div>
	</div>
		
		
		
<div>
	<span></span>
	<br>
	<hr>
	<br>

		<form role="form" action="Book.php" name="book" method="post" >
			<!-- DEPENDENT COMBO BOXS ------------------------------------------------------------------>
			<label for="Category" class="combostyle"> Category </label>
			<select id="catergary" class="combostyle">
			<option value=""> Select </option>
			<?php
				$sql="select * from category";
				$res=$con->query($sql);
							while($row=$res->fetch_assoc())
							{
								echo"<option value='{$row["id"]}'>{$row["category_name"]}</option>";
							}
			?>
			</select>
			<!-- -------------------------------------------------------------------------------- -->
			
			<!-- 2nd COMBO BOX ------------------------------------------------------------------ -->
			<div class="form-group">
				<label for="doctor" class="combostyle" style="padding-right: 35px;"> Doctor </label>
				<select id="doctorname" name="doctorname" class="combostyle">
					<option value=""> Select </option>

				</select>
			</div>
			<!-- --------------------------------------------------------------------------------- -->
					<!--------------------------------------------------------------->
					<!--date--------------------->
					<div class="form-group">
				<label for="date" class="combostyle" style="padding-right: 35px;"> Date </label>
				<input type="date" id="date" class="combostyle" onchange="dayfinder()" name="date" required> 				
				<label id="demo"></label>
				<input type="hidden" id="myText" name="myText" value="">
				
			</div>	

			<!-- FIND DAY NAME -------------------------------------------------------------- -->
			<script>

			function dayfinder(){

				
				

				var dayval =document.forms["book"]["date"].value;

				var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
				var d = new Date(dayval);
				var dayName = days[d.getDay()];
				document.getElementById("demo").innerHTML = dayName;
				
				document.getElementById("myText").value = dayName;

			}


			</script>
			<!-- ---------------------------------------------------------------------------- -->
			<!-- --------------------------------------------------------------------------------- -->		
			
			<span style="padding-right: 103px;"></span><button type="submit" name="submit" class="btn btn-o btn-primary button">Book an appointment</button>
		
			

<!--available day--------------------->
<?php

if(isset($_POST["submit"])){

		$docId=$_POST["doctorname"];
		$avilability = false;

		$sql="select * from work_days where Doctor_id='$docId'";
		$res=$con->query($sql);

		while ($row=$res->fetch_assoc()) {

			$dayid = $row["day_id"];

			$sql2="select * from days where day_id='$dayid'";
			$res2=$con->query($sql2);

			while ($row2=$res2->fetch_assoc()) {
				$dayname = $row2["day_name"];
				
				$daytake=$_POST["myText"];
				//echo"<script>alert('$daytake');</script>";
				if($dayname==$daytake){
					$avilability = true;


				} else{
					$avilability = false;	

				}

			}			
		}

		if ($avilability==true){
			echo"<script>alert('date is available');</script>";
			$sql3="select * from doctor where Doctor_id='$docId'";
			$res3=$con->query($sql3);

			while ($row3=$res3->fetch_assoc()) {
				$stime = $row3["StartTime"];
				$etime = $row3["EndTime"];
				?>
				<br>
				<?php echo "Your appointment time is ".$stime." to ".$etime;?>
			</div>
				
				

				<?php
				
		
		}



			
		} else{
			echo"<script>alert('date is not available');</script>";

		}
		


	
if ($avilability==true){
	if(isset($_POST["submit"])){
				// ADD TO DATABASE ---------------------------------------------------------------
		$db = mysqli_connect('localhost', 'root', '', 'karuna_clinic_center');
//$email = mysqli_real_escape_string($db,$_POST['email']);
  // ensure that the user exists on our system
  //$query = "SELECT Email FROM patient WHERE Email='$email'";
  //$results = mysqli_query($db, $query);

				$date=$_POST["date"];	
				$docId=$_POST["doctorname"];
				$patientid=$_SESSION['Patient_id'];
				$time=$stime." to ".$etime;
				$sql4="insert into appointment(Date,Time,Doctor_id,Patient_id) values('$date','$time','$docId','$patientid')";
				
			$row1=mysqli_query($db,"SELECT Email,Firstname FROM patient where Patient_id='".$patientid."'");

$row2=mysqli_fetch_assoc($row1);
$row3=mysqli_query($db,"SELECT Email,First_Name FROM doctor where Doctor_id='".$docId."'");
$row4=mysqli_fetch_assoc($row3); 
$row5=mysqli_query($db,"SELECT Appointment_id  FROM appointment where Patient_id='".$patientid."'");
$row6=mysqli_fetch_assoc($row5);
				if($con->query($sql4)){
					include "classes/class.phpmailer.php";
					//sending mail to patient
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
$mail1->Subject = "Appointment Details";
$mail1->Body="Your Appointment Details:<br><br>
                   Dear Customer ,
                   You have an appointment on $date at $time with Dr.".$row4['First_Name'].".
                   Your Appointment Number- '".$row6['Appointment_id']."' ";

$mail1->AddAddress($row2['Email']);

//Sending mail to doctor
$mail2=new PHPMailer();
$mail2->IsSMTP();
$mail2->SMTPDebug=1;
$mail2->SMTPAuth=true;
$mail2->SMTPSecure='ssl';
$mail2->Host="smtp.gmail.com";
$mail2->Port=465;
$mail2->IsHTML(true);
$mail2->Username=("karunacliniccenter@gmail.com");
$mail2->Password="shiyani123";
$mail2->SetFrom("karunacliniccenter@gmail.com");
$mail2->Subject = "Appointment Details";
$mail2->Body="Your Appointment Details:<br><br>
                   Dear doctor ,
                   You have an appointment on $date at $time with ".$row2['Firstname']."";


$mail2->AddAddress($row4['Email']);
if(($mail1->Send()) && ($mail2->Send())){
	//echo "<script type='text/javascript'>alert('We have sent an Email about Your Appointment details);</script>";
	echo "<script type='text/javascript'>alert('You have successfully booked Your Appointment!!!!');</script>";

	}
else{
	echo "<script type='text/javascript'>alert('Booking is not successful');</script>";
	
	}




			}
	else{
		echo "<script type='text/javascript'>alert('Error while adding records');</script>";
	}


		//--------------------------------------------------------------------------------
}
	}	}
?>

	<div class="contact col-12">
		<div class="img col-3">
		<img src="images\logo-right.png" width="70%" height="150px">
		</div>
		<div class="address col-3">
		<p style="align:center"><address >No-212/5,</br> Chankannai North,</br> Jaffna,</br> Sri Lanka.</address></p><br/>
		</div>
		<div class="phone col-3">
		<p> &#9742 +944658352464</p>
		<p> &#9742 +946789765432</p>
		</div>
		<div class="time col-3">
		<p style="font-family:Agency FB";>Week days</p>
		<p style="font-family:Agency FB";>7.30am to 8.30am</p>
		<p style="font-family:Agency FB";>Weekend</p>
		<p style="font-family:Agency FB";>7.30am to 10.30am</p>
		</div>
	</div>


	<script src="jquery-3.3.1.min.js"></script>
	<!-- SENDILNG CATOGARY TO DOCTORCOMBOPHP ------------------------- -->
	
	<script>
		$("#catergary").change(function(){
			cid=$(this).val();
			$.post("doctorcombo.php",{id:cid},function(data){
				$("#doctorname").html(data);
				//alert(cid);
			});
		});
	</script>

	<!-- ------------------------------------------------------------ -->

</body>
</html>