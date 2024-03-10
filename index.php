<?php
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if(!empty($email)){
if(!empty($password)){

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "email_and_passworddb";

//create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(mysqli_connect_error()){
  die('coonectError('.mysqli_connect_errno().')'.msqli_connect_error());
}
else{
  $sql = "INSERT INTO emailpassword(email, password) values ('$email', '$password')";
  if ($conn->query($sql)){
    echo "Record Saved";
  }
  else{
    echo "Error:" .$sql ."<br>". $conn->error;
  }
  $conn->close();
}

}
else{
  echo "password should not be empty";
  die();
}
}
else{
  echo"email should not be empty";
  die();
}

?>