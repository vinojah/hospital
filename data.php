<?php
function loadcategory(){

	$db=new Dbconnect;
	$con=$db->connect();
	$stmt=$con->prepare("select * from doctor");
	$stmt->execute();
	$category=$stmt->fetchall(PDO::FETCH_ASSOC);
	return category;
}

?>