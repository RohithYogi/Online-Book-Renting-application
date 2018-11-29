
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$title=$_POST["book_title"];
$author = $_POST["author"];
$edition = $_POST["edition"];
$category=$_POST["category"];
$description = $_POST["description"];

echo $_SESSION["type"];

   
        $mysqli->query("INSERT INTO  books( title,author,edition, category,type ,description) VALUES('$title', '$author', $edition ,'$category','request', '$description')");
             header ("location:request.php");

    




?>
