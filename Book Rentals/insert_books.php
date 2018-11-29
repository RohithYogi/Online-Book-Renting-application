
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';

$title=$_POST["book_title"];
$author = $_POST["author"];
$edition = $_POST["edition"];
$category=$_POST["category"];
$description = $_POST["description"];
$qty = $_POST["qty"];
$photo = $_POST["photo"];
echo $_SESSION["type"];
if($_SESSION["type"]==="user" ) {
   
        $mysqli->query("INSERT INTO  books( title,author,edition, category,type,qty,image, description) VALUES('$title', '$author', $edition ,'$category','donate',$qty, '$photo', '$description')");
             header ("location:donate.php");

         }
        
else {
    

    $mysqli->query("INSERT INTO  books( title,author,edition, category,qty, image, description) VALUES('$title', '$author', $edition ,'$category',qty, '$photo', '$description')");

    echo 'Data inserted';
    echo $_SESSION["type"];
    echo '<br/>';
    
         header ("location:add.php");

}



?>
