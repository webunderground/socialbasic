<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<html
<head>
<link href="css/face1.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>
<body>
<body>

<div id="header_wrapper">
 <div id="header">
 <li id="sitename"><a href="home.php">Social Basic</a></li>
 
 
 
 </div>
</div>

<div id="wrapper">

<div id="div1">
<h6>user:<?php echo htmlspecialchars($_SESSION["username"]); ?></h6>
  <div class="w3-border">
    <div class="w3-container w3-margin ">
<form action="user.php" method="get">
		<input type="text" name="tag" placeholder="Search user" />
		<input type="submit" value="Buscar">
		</form>
            
</div></div> </div>


<div class="w3-container w3-margin-left">
    

           


 <?php
date_default_timezone_set('America/Bogota');    
$DateAndTime2 = date('m-d-Y h:i:s a', time());  
echo "The current date and time  $DateAndTime2.";
?></p>
 
     <h2>search:</h2><br>
<?php  
 //hashtag.php  
 if(isset($_GET["tag"]))  
 {  
      $tag = preg_replace("#[^a-zA-Z0-9_]#", '', $_GET["tag"]);  
      echo '<h1>' . $tag . '</h1>';  
      $connect = mysqli_connect("localhost", "root", "lolita1873", "fce");  
      $query = "SELECT * FROM comentarios where comentario LIKE '%".$tag."%'";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                echo '<p>'.$row["blog_title"].'</p><hr>';
                			
           }  
      }  
      else  
      {  
           echo '<p>No Data Found</p>';  
      }  
 }  
 ?> 
<div class="widgets__widgetContainer">
	<blockquote class="twitter-tweet">
 <?php 
  // Se conecta al SGBD 
  $user=$_SESSION["username"]; 
  if(!($conexion = mysql_connect("localhost", "root", "lolita1873"))) 
    die("Error: No se pudo conectar");
 $user=$_SESSION['username'] ;
  // Selecciona la base de datos 
  if(!mysql_select_db("fce", $conexion)) 
    die("Error: No existe la base de datos");
 
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM comentarios where comentario LIKE '%".$tag."%'"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 echo "";
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
   echo "<div >";
 echo"</div>";   
   
   echo"<h2>"; 

     echo $fila['usuario'] . '</h2><br/>';
    echo  $fila['fecha'] .'<br>';	 
   echo "<div class='comment'><p>";
     
    echo $fila['comentario'] . '</p><br/>';
	
   echo "</div><hr>";
  } 
 echo "</div></div>";
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($conexion); 
?> 

</div>

<div id="div2">

  


				
<br>
 <a href="index.php">Return to main page</a>
 
 </div>
 
 </div><!--End Blog Post-->
    
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
