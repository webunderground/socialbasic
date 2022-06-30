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
 <li id="sitename"><a href="index.php">Social Basic</a></li>
 <li></li>
 </form>
 </div>
</div>

<div class="wrapper">

	<div class="maincontent">
    
    	<div class="logo"><img src="img/basic.png" width="379" height="120" alt="webdesigntuts+ logo"></div>
        

<div class="tab_container">
    <div id="tab1" class="tab_content">
    
          <div class="post">
                <h3><a href="#">Social Basic</a></h3>
							<small>
<?php date_default_timezone_set('America/Bogota');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    setlocale(LC_ALL,"es_ES");
     echo date('d F Y ' );?></p>
	          <p>      <?php echo date('H:i: A')?> </p>
				
<h1><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>


	 <?php
                    // Include config file
                    require_once "config.php";
                   $user=htmlspecialchars($_SESSION["username"]);
                    // Attempt select query execution
                    $sql = "SELECT * FROM  comentarios WHERE `usuario`='$user' ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>&nbsp; usuario&nbsp; </th>";
                                        echo "<th>&nbsp; comentario&nbsp; </th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>&nbsp; " . $row['usuario'] . "&nbsp;</td>";
                                        echo "<td>&nbsp; " . $row['comentario'] . "&nbsp;</td>";
                                      
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='Ver' data-toggle='tooltip'>read&nbsp;</a>";
                                           
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Borrar' data-toggle='tooltip'>delete</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
  
</table>

 <a href="index.php">Return to main page</a>
 
 
 
 </div><!--End Blog Post-->
        
    </div>
   
    <div id="tab2" class="tab_content">
    
    
    
    </div><!--End Tab 2 -->
    

</div><!--End Tab Container -->
    
       
    
    
    </div><!--End Main Content-->
    
 
 
 
 <div class="sidebar">
    
            
             
            
            
            <div class="tabHeader">webdesigntuts+</div>
             <a class="button left" href="index.php"><span class="buttonimage left"></span>home</a>
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=253432341349745&amp;xfbml=1"></script><fb:like href="http://apps.facebook.com/fbtuttts"layout="button_count" width="75" show_faces="true" action="like" font="lucida grande"></fb:like>
            <a class="button right" href="logout.php"><span class="buttonimage left"></span>Logout</a>
           
            
            <div class="tabHeader">Navegacion</div>
            
                <ul>
                                   <li><a href="index.php">muro</a></li>
					<li><a href="user.php"><?php echo $_SESSION['userName']; ?></a></li>
                   
                  
                
                    
                </ul>
            
            <div class="tabHeader">anonymus</div>
            <img class="profileimage" name="" src="img/anonymus.jpg"  width="50" height="50"  alt="">
            
            <?php
$archivo="manifiesto.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p>".$frases[0]."</p>");
?>
            
            			
				
				
				<br><br>
				<div class="tabHeader">mejores post</div>
				            <img class="profileimage" name="" src="img/images.png"  width="50" height="50"  alt="">
                           <?php
$archivo="consejos.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p>".$frases[0]."</p>");
?>

            <p>Part of the <a href="#">Design & Code an Integrated Facebook App</a> series by <a href="http://www.aaronlumsden.com" target="_blank">Aaron Lumsden</a> for  <a href="http://webdesign.tutsplus.com/" target="_blank" >webdesigntuts+</a></p>
            
        
    
    
    </div><!--End Sidebar-->


</div><!--End Wrapper -->


</body>
</html>
