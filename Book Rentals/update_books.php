
<?php

include 'config.php';
$id=$_POST["id"];
$title=$_POST["book_title"];
$author = $_POST["author"];
$edition = $_POST["edition"];
$category=$_POST["category"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$photo = $_POST["photo"];
$description = $_POST["description"];

echo $title;

if($mysqli->query('UPDATE books SET title ="'. $title .'",author="'.$author .'",image ="'.$photo.'",edition="'.$edition .'",category="'.$category .'",price="'.$price .'",qty="'.$qty .'",description="'.$description .'" WHERE id ='.$id)){
    echo 'Data updated';
    echo '<br/>';
    header ("location:view.php");
    
}
else 
{
    echo 'Data not updated';
    
}
// header ("location:edit.php");


?>
