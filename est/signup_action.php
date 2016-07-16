<?php 
//echo "sign up with linkedin";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'est');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$email 		= $_POST['email'];
$pass 		= $_POST['pass'];
$name		= $_POST['name'];
$lname		= $_POST['lname'];
$role		= $_POST['role'];
$availcheck = 0;


//$sql = "SELECT * FROM account WHERE email='$username' AND pass='$pass';";
$check	= "SELECT * FROM account";
$resultcheck = mysqli_query($conn, $check);
if (mysqli_num_rows($resultcheck) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultcheck)) {
    	if($row["email"] == $email) {
    		$availcheck = 1;
    	}
        
    }
} else {
   
}

if($availcheck == 0){
$insert	= "INSERT INTO account (name,lname,email,pass,role) VALUES ('$name','$lname','$email','$pass','$role');";
if (mysqli_query($conn, $insert)) {
    echo "New record created successfully<br>";
    echo "<br><a href='login.php'>Login</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if($availcheck == 1){
	echo "<br>E-Mail already registered<br>";
	echo "<br><a href='ewaform.php'>Signup</a>";
}	

mysqli_close($conn);


?>