
<?php

include 'config.php';

$title=$_POST["book_title"];
$author = $_POST["author"];
$edition = $_POST["edition"];
$category=$_POST["category"];
$price = $_POST["price"];
$photo = $_POST["photo"];
$description = $_POST["description"];

echo '$title';

if($mysqli->query("INSERT INTO  books( title,author,edition, price, category, image, description) VALUES('$title', '$author', $edition,$price ,'$category', '$photo', '$description')")){
    echo 'Data inserted';
    echo '<br/>';
}
else 
{
    echo 'Data not inserted';
    
}

 header ("location:add.php");

?>
