<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>OnBoRe</title>
</head>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
p{
	font-family: Impact, Charcoal, sans-serif;
}
</style>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #FF5733;
  color: white;
}

.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 20px;
  border: none;
  font-size: 20px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 10px solid #ccc;  
  }
}
</style>
	<body background="books_shelf_graffiti_125860_1920x1080.jpg">
		<h1 style="text-align: center; font-family: Comic Sans MS, cursive, sans-serif;color: white">Library Management</h1>
	<div class="topnav">
		<a class="active" href="#home">Home</a>
  		<a href="#about">About</a>
  		<a href="#contact">Contact</a>
  		<input type="text" placeholder="Search..">
	</div>
		<p style="color:white;font-family: verdana,cursive;font-size: 120%">Welcome to the OnBoRe website, here you can either rent a book for a few days or you can donate a book.</p> 
		<br>
		<p style="color:white;font-family: verdana,cursive;font-size: 120%;">So let's get started. What do you want to do?</p>
		<br>
		<button class="button" style="vertical-align:middle"><span>Log-In</span></button>
		<button class="button" style="vertical-align:middle"><span>Sign-Up</span></button>
	</body>	
</html>

<?php
	include 'includes/footer.php';