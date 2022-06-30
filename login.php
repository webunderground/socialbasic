<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
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
		@import "/css/LightFace.css";
	</style>
	<link rel="stylesheet" href="css/lightface.css" />
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
	  			content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a elit quis arcu lacinia consequat. Maecenas ac felis. Ut nisi orci, cursus id, mattis ac, molestie et, nisl. Phasellus id purus. Aliquam at dui. Cras ac urna eget lectus dictum pulvinar. Nulla facilisi. Vivamus vulputate pede vel nisl. Nam purus est, mollis quis, tempor ac, accumsan ac, orci. Vestibulum felis dolor, luctus vitae, dignissim vel, aliquam viverra, quam. Cras quam neque, mattis nec, fringilla et, molestie vel, libero. Integer purus. Mauris iaculis pellentesque turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis ipsum quis est condimentum scelerisque. Maecenas hendrerit nunc eget sem.<br \/><br \/>Curabitur id massa. Sed quis ipsum id quam venenatis scelerisque. Ut felis. Cras pellentesque tempus mi. Sed convallis pede eu nibh. Suspendisse potenti. Phasellus non felis. Nam sollicitudin laoreet massa. Cras quis nisl. Ut mauris odio, varius ac, pellentesque ut, rhoncus eget, ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam iaculis vestibulum felis. Donec vulputate nibh. Duis suscipit. Ut aliquet semper purus. Morbi et justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc egestas dapibus orci. Quisque vel lectus.<br \/><br \/>Phasellus in nunc sit amet dolor laoreet tincidunt. Nullam vitae arcu id ligula fringilla porttitor. Cras viverra tortor quis diam. Proin vitae mauris. Nunc aliquam turpis non mauris gravida pretium. Curabitur venenatis, orci sed ornare consequat, orci arcu sagittis nisi, quis ultrices sapien erat a libero. Ut posuere lorem aliquam nibh. Nam urna dui, euismod eget, varius eu, ornare vel, orci. Praesent mi elit, ultricies eleifend, suscipit quis, porta non, purus. Proin hendrerit luctus felis. Cras blandit nulla nec erat commodo vestibulum. Aliquam id enim eget nibh condimentum viverra. Nunc elementum, sapien in tincidunt viverra, tellus orci convallis sapien, quis fermentum metus sem quis velit. Proin sit amet nulla. Ut commodo. Donec tincidunt commodo eros. Nullam vestibulum commodo leo. Sed ante. Duis accumsan lorem eu nunc auctor suscipit.",
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
 <li id="sitename"><a href="http://programacion.net">social</a></li>
 </div>
</div>

<div id="wrapper">

<div id="div1">
<p<Programacion.net helps you connect and share with the <br>people in your life.</p>
</div>

<div id="div2">
<h1>Create an account</h1>


      <div class="caption">Site login</div>
      <div id="icon">&nbsp;</div>
      <div class="w3-container w3-padding w3-center">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
<table>
     <td>  <li>   Username: <input class="text" name="username" type="text"class="w3-input w3-border w3-round" rows="10" cols="40" /></li></p></td></tr>
      <td>  <li>  Password: <input class="text" name="password" type="password" /></li></td></tr>
          <tr><td colspan="2" align="center"><li><input  type="submit" name="submitBtn" value="Login"></li></td></tr>
         </table>
      </form>
      
      &nbsp;<a href="registro.php">Register</a>
      

		<br/><br/><br/></td></tr></table>
	</div>

	<div id="source">&nbsp;&nbsp;&nbsp;&nbsp;</div>
    </div>
</body>   
