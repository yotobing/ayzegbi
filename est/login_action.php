<?php
session_start();
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'est');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
	$n = 0;
	$username = $_POST['email'];
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM account WHERE email='$username' AND pass='$pass';";
  $name = 0;
  $role= 0;
	$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        #echo "id: " . $row["email"]."<br>". "pass: " . $row["pass"]. "<br>";
        echo "Welcome ". $row["name"];
        $name = $row["name"];
        $role = $row["role"];
    }
    $n = 1;
} else {
    $n =0;
  }
    
$n1 = strcmp($role,'VP');
$n2 = strcmp($role,'Manager');
$n3 = strcmp($role,'EwA');




if ($n == 0){
header('Refresh: 0;url=login.php');    
}
else if($n == 1 && $n3==0){
$_SESSION['user'] = $name;

#header('Refresh: 3;url=newm_dashboard.php');
echo "<br><a href='newm_dashboard.php'>Continue</a>";
}
else {
$_SESSION['user'] = $name;
#header('Refresh: 3;url=dashboard.php');
echo "<br><a href='dashboard.php'>Continue</a>";
}


  



?>