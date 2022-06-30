<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link href="css/face1.css" type="text/css" rel="stylesheet"/>
<link href="css/w3css.css" type="text/css" rel="stylesheet"/>
<link href="css/falert.css" rel="stylesheet" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="js/myjava.js" type="text/javascript"></script><!--We will be creating this file in the next part of the tutorial, I have included it in this version to make the page tabs work-->


</head>

</head>
<body>
  

<div id="header_wrapper">
 <div id="header">
 <li id="sitename"><a href="">Social Basic</a></li>
 
 </div>
</div>

<div class="wrapper">

	<div class="maincontent">
    
    	<div class="logo"><img src="img/basic.png" width="379" height="120" alt="webdesigntuts+ logo"></div>
        
       
<div class="tab_container">
    <div id="tab1" class="tab_content">
    
          <div class="post">
                <h3><a href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></h3>
                <span class="postInfo"><a href="#"></a> <?php date_default_timezone_set('America/Bogota');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    setlocale(LC_ALL,"es_ES");
     echo date('d F Y ' );?> <?php echo date('H:i: A')?></span>
<span class="line"></span>
        </div><!--End Blog Post-->
        
        <div class="post">
		
		<?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </div><!--End Blog Post-->
        
    </div>
   
    
     <h3>Muro</h3>
    <form action="enviar.php" method="post">
            <center><table border="0">
            <tr><div id="contactArea">
                <td><strong></strong></td><td> <textarea  name="comentario" value=""  rows="10" cols="40" id="text"></textarea></td>
            </tr>
			<td><input name="usuario" type="hidden" size="42" maxlength="15" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>"/></td>
            <tr>
            <td><strong></strong></td>  <td></td>
            
			</tr>
            <tr>
            <td colspan="2" align="center" >
			<div id="Sharer_btns">

			
			<button type="submit" type="button" name="enviar" class="s_btn">Post</button></td>
            </div>
			</tr>
            </center></table>
        </form>    
        </div>
		 
		
        

<!-- Page Container -->
 <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>

<?php 
  // Se conecta al SGBD 
  if(!($conexion = mysql_connect("localhost", "root", "lolita1873"))) 
    die("Error: No se pudo conectar");
 
  // Selecciona la base de datos 
  if(!mysql_select_db("fce", $conexion)) 
    die("Error: No existe la base de datos");
 
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM comentarios  ORDER BY fecha DESC"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
  
 
echo"<div class='tabHeader'>";	  
   echo "<a href='user.php?tag=" . $fila['usuario'] . "'>" . $fila['usuario'] . "</a><br/> <div class='tiempo'>" . $fila['fecha'] . "</div>";
  
       
   echo "<p>";
    echo $fila['comentario'] . '</p><br/></div>';
   echo "<hr>";
  
        
  } 
 echo "</div>";
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($conexion); 
?> 



   

                
 

 
			

			
    
    
    </div><!--End Tab 3 -->
    
     <div id="tab4" class="tab_content">

     <h3>Friends</h3>
     
     <p><strong>Webdesigntuts+ is part of the Tuts+ Network. Here's some of our other blogs</strong></p>
     
     <a href="http://psd.tutsplus.com/" target="_blank">psdtuts+</a>
     <p>Adobe Photoshop is a fantastically powerful program and there are a million ways to do anything, we hope that reading Psdtuts+ will help our readers learn a few tricks, techniques and tips that they might not have seen before and help them maximize their creative potential!</p>
     <a href="http://net.tutsplus.com/" target="_blank">nettuts+</a>
     <p>Nettuts+ is a site aimed at web developers and designers offering tutorials and articles on technologies, skills and techniques to improve how you design and build websites. We cover HTML, CSS, Javascript, CMS’s, PHP and Ruby on Rails.</p>
     <a href="http://vector.tutsplus.com/" target="_blank">vectortuts+</a>
     <p>Vectortuts+ is a blog of tutorials, articles, freebies and more on all things vector! We publish tutorials on techniques and effects to make awesome vector graphics in programs like Adobe Illustrator and Inkscape.</p>
     <a href="http://audio.tutsplus.com/" target="_blank">audiotuts+</a>
     <p>Audiotuts+ is a blog for musicians, producers and audio junkies! We feature tutorials on the tools and techniques to record, produce, mix and master tracks. We also feature weekly articles for the music obsessive. </p>
     <a href="http://ae.tutsplus.com/" target="_blank">aetuts+</a>
     <p>Aetuts+ is a site made to house and showcase some of the best After Effects tutorials around. We publish tutorials that not only produce great effects, but explain them in a friendly, approachable manner. We also stock up links to tutorials, articles, presets and plugins from around the web to help you get the most out of After Effects.</p>
     <a href="http://active.tutsplus.com/" target="_blank">activetuts+</a>
     <p>Activetuts+ — named for the awsomely interactive stuff it will teach you to create — is a site aimed at designers and developers, offering tutorials, tips and articles to improve your skills at creating browser-based games and apps. We publish tutorials that not only produce great graphics and effects, but explain in a friendly, approachable manner, covering Flash, Unity, Silverlight and HTML5.</p>
     <a href="http://cg.tutsplus.com/" target="_blank">cgtuts+</a>
     <p>Cgtuts+ is a source of learning on all aspects of computer graphics. We pump out regular tutorials on Maya, 3Ds Max, Cinema 4D, ZBrush, Blender, Mudbox and more. We cater to beginner, intermediate and advanced CG artists.</p>
     <a href="http://photo.tutsplus.com/" target="_blank">phototuts+</a>
     <p>Phototuts+ is a source of learning on all aspects of photography. We pump out regular tutorials on composition, equipment settings, post-processing, film photography, retouching and much more. If you love photography, you will find a treasure trove of useful advice at Phototuts+.</p>
     <a href="http://mobile.tutsplus.com/" target="_blank">mobiletuts+</a>
     <p>Mobiletuts+ is all about quality tutorials for mobile developers – all mobile developers. Topics will include native development with the iPhone, Android, Windows and Blackberry platforms, cross-platform development with tools like Appcelerator and Phone Gap, and techniques for building mobile accessible web sites with HTML 5.</p>
     <a href="http://wp.tutsplus.com/" target="_blank">wptuts+</a>
     <p>Wptuts+ is a site dedicated to teaching people how to use WordPress, develop widgets, plugins and themes, successfully scale sites, find interesting WordPress resources, and build a freelance business around the platform. Over 25 million people have chosen WordPress to power the place on the web they call “home”, and it’s by far and away the most successful blogging platform online.</p>
     
     
     </ul>
    </div><!--End Tab 4 -->

</div><!--End Tab Container -->
    
       
    
    
    </div><!--End Main Content-->
    
    <div class="sidebar">
    
<form action="search.php" method="get">
		<input type="text" name="tag" placeholder="Search" />
		<input type="submit" value="Buscar">
		</form>
            
           
            
            <div class="tabHeader">webdesigntuts+</div>
             <a class="button left" href="admin.php"><span class="buttonimage left"></span>admin</a>
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=253432341349745&amp;xfbml=1"></script><fb:like href="http://apps.facebook.com/fbtuttts"layout="button_count" width="75" show_faces="true" action="like" font="lucida grande"></fb:like>
            <a class="button right" href="logout.php"><span class="buttonimage left"></span>Logout</a>
           
            
            <div class="tabHeader">Navegacion</div>
            
                <ul>
                <li><a href="index.php">muro</a></li>
					
                    
                </ul>
            
            <div class="tabHeader">Anonimus</div>
            <img class="profileimage" name="" src="img/anonymus.jpg"  width="50" height="50"  alt="">
            
            <?php
$archivo="manifiesto.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p>".$frases[0]."</p>");
?>

            <div class="tabHeader">Post</div>
            			
				
				
				<br><br>
				<div class="tabHeader">manifiesto</div>
				            <img class="profileimage" name="" src="img/anonymus.jpg"  width="50" height="50"  alt="">
                           <?php
$archivo="manifiesto.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p>".$frases[0]."</p>");
?>

            <p>Part of the <a href="#">Design & Code an Integrated Facebook App</a> series by <a href="http://www.aaronlumsden.com" target="_blank">Aaron Lumsden</a> for  <a href="http://webdesign.tutsplus.com/" target="_blank" >webdesigntuts+</a></p>
            
           
    </div><!--End Sidebar-->


</div><!--End Wrapper -->


</body>
</html>
