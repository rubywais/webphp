<!DOCTYPE HTML>
<html>
<head>
<title>Simple Login Form</title>
<meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>
<form class="box login" action="login.php" method="post">
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" tabindex="1" name="nama" placeholder="Username" required>
	  <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input type="password" tabindex="2" name="password" placeholder="Password" required>
	</fieldset>
	<footer>
	   <input type="submit" class="btnLogin" value="Login" tabindex="4"><a href="capture/index.php"><input type="button" class="btnLogin" value="Camera" tabindex="4"></a>
      </footer>
</form>
</body>
</html>
