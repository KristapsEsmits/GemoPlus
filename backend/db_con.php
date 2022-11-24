<?php
$con = mysqli_connect("localhost:3308","root","","gemoplus"); #Maini šeit ja vajag, tikai db nosaukumu ,ja izmanto xampp parejo atstaj tadu pašu!
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>