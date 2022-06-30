



<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<div id="header_wrapper">
 <div id="header">
 <li id="sitename"><a href="http://programacion.net">Facesocial</a></li>
 <form action="post">
 <li>Email or Phone<br><input type="text" name="email"></li>
 <li>Password<br><input type="password" name="password"><br><a href="">Forgotten account?</a></li>
 <li><input type="submit" name="login" value="Log In"></li>
 </form>
 </div>
</div>

<div id="wrapper">

<div id="div1">
<p<Programacion.net helps you connect and share with the <br>people in your life.</p>
<img src="img\red.jpg">
</div>

<div id="div2">
<h1>Create an account</h1>
<?php if ((!isset($_POST['submitBtn'])) || ($error != '')) {?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerform"><li><input type="text" placeholder="Mobile number or email address"></li>
<li><input type="password" placeholder="Re-enter mobile number or email address"></li>
<li><input type="password" placeholder="New password"></li>
<p>Birthday</p>
<li>
<select><option>Day</option></select>
<select><option>Month</option></select>
<select><option>Year</option></select>
<a href="">Why do I need to provide my date of birth?</a>
</li>
<li><input type="radio">Female <input type="radio">Male</li>
<li id="terms">By clicking Create an account, you agree to our <a href="">Terms</a> and that <br>you have read our <a href="">Data Policy</a>, including our <a href="">Cookie Use</a>.</li>
<li><input type="submit" value="Create an account"></li>
<li id="create_page"><a href="">Create a Page</a> for a celebrity, band or business.</li>
</div>

</div>

<div id="footer_wrapper">

<div id="footer1">
English (UK) <a href="">??????</a><a href="">??????</a><a href=""> ????</a><a href="">?????</a><a href="">?????</a><a href="">?????</a><a href="">??????</a><a href="">???????</a><a href="">?????</a><a href="">??????</a>
</div>
<div id="footer2">
<a href="">Sign Up</a><a href="">Log In</a><a href="">Messenger</a><a href="">Programacion.net</a><a href="">Mobile</a><a href="">Find Friends</a><a href="">Badges</a><a href="">People</a><a href="">Pages</a><a href="">Places</a><a href="">Games</a><a href="">Locations</a><a href="">Celebrities</a><a href="">Groups</a><a href="">Moments</a><a href="">About</a><a href="">Create Advert</a><a href="">Create Page</a><a href="">Developers</a><a href="">Careers</a><a href="">Privacy</a><a href="">Cookies</a><a href="">Ads</a><a href="">Terms</a><a href="">Help</a>
<p>Design By Programacion.net</a>
</div>

</div>
</body>
</html>
