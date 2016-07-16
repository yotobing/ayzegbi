<?php 
session_start();
if(empty($_SESSION["user"]))
{
	echo "You're not logged in. "."<a href='login.php'>Click Here</a>";
	
}
else if(!empty($_SESSION["user"])) {
	

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'est');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$nameee = $_SESSION['user'];
$sql = "SELECT * FROM account WHERE name='$nameee';";
$sql1 = "SELECT * FROM account WHERE role = 'ewa';";
$sqlcheck = "SELECT  FROM account WHERE name = '$nameee';";
$check = 0;
$result = mysqli_query($conn, $sqlcheck);
$mail;

#HEADER---------------------------------------------------------------------

echo "Welcome ".$_SESSION['user']."<br><br>";
$n = 0;
#---------------------------------------------------------------------------
#PROFILE--------------------------------------------------------------------
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        #echo "id: " . $row["email"]."<br>". "pass: " . $row["pass"]. "<br>";
        echo "Name: ". $row["name"]."<br>";
        echo "Role: ". $row["role"]."<br>";
        $email = $row["email"];
    }
    
} 
else {
    echo "ERROR";
}

#---------------------------------------------------------------------------

#SELECTION CHECK------------------------------------------------------------
echo "SELECTION NEW MEMBER!!!";
$result1 = mysqli_query($conn, $sql1);
echo "<table>
			<tr>
			<td>Number</td>
			<td>Name</td>
			<td>Status</td>
			<td>Change StatusStatus</td>
			</tr>
			<tr>";
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
        #echo "id: " . $row["email"]."<br>". "pass: " . $row["pass"]. "<br>";
        echo "<td>";
        echo $n;
        echo "</td>";
        echo "<td>";
        echo $row["name"];
        echo "</td>";
        echo "<td>";
if($row["fgd"] == 0){
echo "Not yet FGD.";
}
else if($row["fgd"] == 1){
echo "Reject FGD";
}
else if($row["fgd"]==2){
echo "Accept FGD";

}
else if($row["interview"]==1){
echo "Reject Interview";
}
else if($row["interview"]==2){
echo "Accept Interview";

}
echo "</td>";
}
if($row["fgd"] == 0){
echo "<td><form action='status_action.php' method='post'>
<input type='hidden' name='mail' value='"; $email; echo "'>
<input type='radio' name='fgdd' value='1'>Reject FGD<br>
<input type='radio' name='fgdd' value='2'>Accept FGD<br>
<input type='hidden' name='intvv' value='0'>
<input type='submit'>
</td>";  
}
if($row["fgd"] == 1 || $row["fgd"] == 2){
echo "<td><form action='status_action.php' method='post'>
<input type='hidden' name='mail' value='"; $email; echo "'>
<input type='radio' name='intvv' value='1'>Reject Interview<br>
<input type='radio' name='intvv' value='2'>Accept Interview<br>
<input type='submit'>
</td>";  
}
else if($row["interview"] == 1 || $row["interview"] == 2)
	echo "<td></td>"
;} 

else {
    echo "ERROR";
}


echo "</tr></table>";


#LOGOUT---------------------------------------------------------------------
echo "<a href='logout_action.php'>Logout</a>";



#---------------------------------------------------------------------------



}


?>
