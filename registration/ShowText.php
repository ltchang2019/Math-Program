<?php

session_start();
$user = $_SESSION['username'];
$completedStatus = $_SESSION["questionsCompleted"];
//See original: https://www.w3schools.com/php/php_mysql_connect.asp
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "English Program";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SESSION["questionsCompleted"] ==  "false"){

    if($_SESSION["displayBoolean"] == "true"){
	$sql = "SELECT * FROM Users WHERE username = '$user'";
    $statement = $conn -> query($sql);

    foreach($statement as $row){
        $groupNumber = $row["groupNumber"];
        break;
    }

	$textName = $_GET["textName"];
    $_SESSION["textName"] = $textName;

	$sql1 = "SELECT * FROM Assignments WHERE textName = '$textName' AND groupNumber = '$groupNumber' ";
    $statement1 = $conn -> query($sql1);

    foreach($statement1 as $row1){
        $link = $row1["link"];
        break;
    }
        print "<iframe src=" . $link . '" width="100%" height=615></iframe>';
}
}
}
catch(PDOException $e) {
    print "Connection failed: " . $e->getMessage();
}
?>
