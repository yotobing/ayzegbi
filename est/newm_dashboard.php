<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'est');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($_SESSION['user'] == null){
	echo "You're not logged in";
}
else{
echo "WELCOME FUTUREEEEEEEEEEEE LIDER!!!<br><br>";
echo "Welcome ".$_SESSION['user']."<br><br>";

$nameee = $_SESSION['user'];
$sql = "SELECT * FROM account WHERE name='$nameee';";
$fgd = 0;
$intv = 0;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fgd = $row["fgd"];
        $intv = $row["interview"];
    }
    
} 
else {
    echo "ERROR";
}

echo "NEXT TO DO!!!<br>";
if($fgd == 0){
	echo "Focus Group Discussion.<br>";
}
else if($fgd == 1){
	echo "Sorry, you're failed in FGD Process.<br>";
}

else if($fgd == 2 && $intv == 0){
	echo "You passed FGD process.<br>";
	echo "Next, interview process.<br>";
}
else if($fgd == 2 && $intv == 1){
	echo "You passed FGD process.<br>";
	echo "Sorry, you're rejected in interview process.<br>";
}
else if($fgd == 2 && $intv == 2){
	echo "You passed FGD process.<br>";
	echo "Congratulations, you're accepted as an AIESECer.<br>";
}

echo "<a href='logout_action.php'>Logout</a>";
}
?>