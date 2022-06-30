
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<html>
<head>
<link href="css/face1.css" type="text/css" rel="stylesheet"/>
<style>
		@import "css/LightFace.css";
	</style>
	<link rel="stylesheet" href="css/LightFace.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools.js"></script>
	<script src="js/mootools-more-drag.js"></script>
	<script src="js/LightFace.js"></script>
	<script src="js/LightFace.IFrame.js"></script>
	<script src="js/LightFace.Image.js"></script>
	<script src="js/LightFace.Request.js"></script>
	<script src="js/LightFace.Static.js"></script>
	<script>
		
	 	function formFunction() {
	 		return new LightFace({
	 			title: $('demo1title').value,
	 			content: $('demo1content').value,
				draggable: true
	 		}).open();
	 	}

	 	function termsFunction() {
	  		box = new LightFace({ 
	 			title: 'Terms and conditions', 
				width: 400,
				height: 300,
	  			content: "Me comprometo a usar esta red social sin herir a los otros usuarios, ademas de seguir las instrucciones por parte de la redsocial para el que el servicio funcione correctamente.hasellus id purus. Aliquam at dui. Cras ac urna eget lectus dictum pulvinar. Nulla facilisi. Vivamus vulputate pede vel nisl. Nam purus est, mollis quis, tempor ac, accumsan ac, orci. Vestibulum felis dolor, luctus vitae, dignissim vel, aliquam viverra, quam. Cras quam neque, mattis nec, fringilla et, molestie vel, libero. Integer purus. Mauris iaculis pellentesque turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis ipsum quis est condimentum scelerisque. Maecenas hendrerit nunc eget sem.<br \/><br \/>Curabitur id massa. Sed quis ipsum id quam venenatis scelerisque. Ut felis. Cras pellentesque tempus mi. Sed convallis pede eu nibh. Suspendisse potenti. Phasellus non felis. Nam sollicitudin laoreet massa. Cras quis nisl. Ut mauris odio, varius ac, pellentesque ut, rhoncus eget, ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam iaculis vestibulum felis. Donec vulputate nibh. Duis suscipit. Ut aliquet semper purus. Morbi et justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc egestas dapibus orci. Quisque vel lectus.<br \/><br \/>Phasellus in nunc sit amet dolor laoreet tincidunt. Nullam vitae arcu id ligula fringilla porttitor. Cras viverra tortor quis diam. Proin vitae mauris. Nunc aliquam turpis non mauris gravida pretium. Curabitur venenatis, orci sed ornare consequat, orci arcu sagittis nisi, quis ultrices sapien erat a libero. Ut posuere lorem aliquam nibh. Nam urna dui, euismod eget, varius eu, ornare vel, orci. Praesent mi elit, ultricies eleifend, suscipit quis, porta non, purus. Proin hendrerit luctus felis. Cras blandit nulla nec erat commodo vestibulum. Aliquam id enim eget nibh condimentum viverra. Nunc elementum, sapien in tincidunt viverra, tellus orci convallis sapien, quis fermentum metus sem quis velit. Proin sit amet nulla. Ut commodo. Donec tincidunt commodo eros. Nullam vestibulum commodo leo. Sed ante. Duis accumsan lorem eu nunc auctor suscipit.",
	 			buttons: [
					{ 
						title: 'I Agree', 
						event: function() {  
							box.fade(0.5);
			 				var confirm = new LightFace({
			 					width: 200,
			 					title: 'Confirm',
								keys: {
									esc: function() { this.close(); box.unfade(); }
								},
			 					content: 'Do you agree?',
								buttons: [
									{ title: 'Yes', event: function() { this.close(); box.close(); }, color: 'green' },
									{ title: 'No', event: function() { this.close(); box.unfade(); } }
								]
			 				});
			 				confirm.open();
						},
						color: 'blue'
					},
					{
						title: 'Close',
						event: function() { this.close(); }
					}
				]
	 		});
	 		box.open();		
	 	}
		/*
		window.addEvent('domready',function() {
			contextFace = new LightFace.Static({
				title: 'Context',
				content: 'Hello!',
				width: 80,
				height: 100
			});
			document.id('context-link').addEvent('click',function(e){
				if(e) e.stop();
				contextFace.open(false,e.page.x,e.page.y);
			});
			var closer = function(e) {
				var parent = document.id(contextFace).getParent('.lightface');
				if(e.target != parent && !parent.contains(e.target)) {
					contextFace.close();
				}
			};
			document.id(document.body).addEvent('click',closer);
		});
		*/
		
		
	</script>

</head>
<body>

<div id="header_wrapper">
 <div id="header">
 <li id="sitename"><a href="">Social Basic</a></li>
 
 
 
 </div>
</div>

<div id="wrapper">

<div id="div1">
<p<Programacion.net helps you connect and share with the <br>people in your life.</p>
<img src="img\logo.png" width="500" height="500">
</div>

<div id="div2">
<h1>Create an account</h1>


  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>User</label><br>
                <li><input type="text" name="username" class="form-control" value="<?php echo $username; ?>"></li>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label><br>
               <li> <input type="password" name="password" class="form-control" value="<?php echo $password; ?>"></li>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Repeat Password</label><br>
                <li><input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"></li>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <li><input type="submit"></li>
                
            </div>
			<div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form></blockquote>
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
