<?php 

session_start();
//$errors = [];
$errors = array();
$user_id = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'karuna_clinic_center');

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($db,$_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT Email FROM patient WHERE Email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }elseif(isset($_POST['reset-password'])){
$row1=mysqli_query($db,"SELECT Email,Password FROM patient where Email='".$_POST['email']."'");
$row2=mysqli_fetch_assoc($row1);
if($row2>0){
  include "classes/class.phpmailer.php";
$mail=new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug=1;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host="smtp.gmail.com";
$mail->Port=465;
$mail->IsHTML(true);
$mail->Username=("karunacliniccenter@gmail.com");
$mail->Password="shiyani123";
$mail->SetFrom("karunacliniccenter@gmail.com");
$mail->Subject="Information about your password";
$password=$row2['Password'];
$message = "Your password is ".$password;
$mail->Body=$message;
$mail->AddAddress($row2['Email']);
if(!$mail->Send()){
    echo "<script>alert('Email not register with us');</script>"; 
  }
else{

  echo  "<script>alert('Your Password has been sent Successfully');</script>";
  
  }
//  header("location:./Login.php");
}


}

}

  // Send email to user with the token in a link they can click on
/*
include "classes/class.phpmailer.php";
$mail=new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug=1;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host="smtp.gmail.com";
$mail->Port=465;
$mail->IsHTML(true);
$mail->Username=("karunacliniccenter@gmail.com");
$mail->Password="shiyani123";
$mail->SetFrom("karunacliniccenter@gmail.com");
$mail->Subject=("Reset your password on karunacliniccenter patient account");
$mail->Body=("Hi there, click on this  to reset your password on our site");
$mail->AddAddress($_POST["email"]);
if(!$mail->Send()){
    echo "Mailer Error";
  }
else{
    echo header('location: pending.php?email=' . $email);
  }

   }
  // generate a unique random token of length 100
 
    
   
  }


// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pass = md5($new_pass);
      $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      header('location: index.php');
    }
  }
}
*/
?>