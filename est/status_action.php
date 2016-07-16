<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'est');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$mail = $_POST["mail"];
echo $mail;
$sql = "SELECT * FROM account WHERE email='$mail';";

$fgdd = $_POST["fgdd"];
$intvv = $_POST["intvv"];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo $row["fgd"];
       echo $row["interview"];
    }
} else {
    echo "0 results";
}


?>