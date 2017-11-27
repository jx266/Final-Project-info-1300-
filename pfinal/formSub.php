<?php
session_start();

$firstName = $_SESSION['fname'];
$lastName = $_SESSION['lname'];
$email = $_SESSION['email'];

unset($_SESSION['email']);

// combine the first and last name, with a space in the middle.
// In PHP the "." is like +, but for strings.
$fullName = $firstName . " " . $lastName;
?>

<html>


<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>
<link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <img id = "home" src = "images/home.jpg" alt = "Home">

  <div id="response">
    <h1>Form Submitted</h1>
    <p>
      Thanks, <?php echo( htmlspecialchars($fullName) ); ?>.
    </p>
    <p>
      We appreciate your advice for Poker Club website.
    </p>
    <p>
      If you want to participate our activities, we will sent you the activity information to <?php echo( htmlspecialchars($email) ); ?>.
    </p>

</body>


</div>
</html>
