<?php 
// $db = mysqli_connect('localhost', 'fc', '');
// if (!$db){
// die("Database db Failed" . mysqli_error($db));
// }
// $select_db = mysqli_select_db($db, 'fossdb');
// if (!$select_db){
// die("Database Selection Failed" . mysqli_error($db));
// define('DB_SERVER','localhost');
// define('DB_USERNAME','root');
// define('DB_PASSWORD','');
// define('DB_DATABASE','fossdb');
// $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) ;

   include('config.php');

session_start();

$error="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	  $myusername =$_POST['username'];
    $mypassword = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die(mysqli_error($db));;
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      if($count == 1) {
        session_register("myusername");
         $_SESSION['username'] = $myusername;
         $_SESSION['loggedin'] = true;

         // header('Location: http://localhost/login/welcome.php');
         // exit;
         error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);


flush();
header("Location:http://localhost/login/welcome.php");
die('should have redirected by now');

      }
      else {
         $error = "Your Login Name or Password is invalid";
      }


}

 ?>

<html>	
<head>
	<title>Login Page</title>
</head>
<div><?php echo $error ?></div>
<body>
	<form action="login.php" method="POST">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="submit" value="submit">

	</form>
</body>


 </html>