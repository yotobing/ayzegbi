<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'est');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$mail = $_POST["email"];
$sql = "SELECT * FROM account WHERE email='$mail';";



$fgdd = $_POST["fgdd"];
$intvv = $_POST["intvv"];


?>