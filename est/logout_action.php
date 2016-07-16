<?php 
session_start();
if(!empty($_SESSION["user"]))
{
session_destroy();
echo "You're logged out<br>";
echo "<a href='login.php'>Login now</a>";
}
else if(empty($_SESSION["user"])){
	echo "You're not logged in. <a href='login.php'>Login now</a>;";
}

?>