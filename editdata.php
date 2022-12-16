<?php
include 'backend/db_con.php';
include 'darbinieki.php';

if (isset($_REQUEST['aed'])){

	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);

	$password = stripslashes($_REQUEST['passwords']);
	$password = mysqli_real_escape_string($con,$password);

    $phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($con,$phone);

	$name = stripslashes($_REQUEST['names']);
	$name = mysqli_real_escape_string($con,$name);

    $lastname = stripslashes($_REQUEST['lastnames']);
	$lastname = mysqli_real_escape_string($con,$lastname);

    $admin = $_REQUEST['admins'];

  $query = "UPDATE lietotaji SET Lietotajvards='$username',Parole='$password',Vards='$name',Uzvards='$lastname',Talr_Nr='$phone',Admin='$admin'";
  $result = mysqli_query($con,$query);


    if($result){
      echo("<h1 id='veiksmigi'>Veiksmīgi atjaunots!!</h1>");
    }
}
mysqli_close($con);
?>