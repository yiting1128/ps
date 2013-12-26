<?php session_start(); ?>
<?php   
if($_SESSION['username'] == null||$_SESSION['state']!=1)
 echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Main page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    
   
    
  </head>

  <body>
  <script>
jQuery(function($){
    $( "#datepicker" ).datepicker({dateFormat : 'yy-mm-dd'});
     $( "#Contactdatepicker" ).datepicker({dateFormat : 'yy-mm-dd'});
  });
</script>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PivotStudy</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="mainpage.php">個人學習檔案</a></li>
            <li><a href="schedule.php">進度表排定</a></li>
            <li><a href="askonline.php">線上助教</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">其他功能 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">線上測驗</a></li>
                <li><a href="#">教材下載</a></li>
                <!-- <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li> -->
              </ul>
            </li>
          </ul>
          <!-- <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul> -->
        </div><!--/.nav-collapse -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>歡迎來到逆轉學習線上學習平台</h1>
        <!-- <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p> -->
        <form action="updateGrade.php" method="post" name="form1">
        
        <?php
 
 echo("<script>console.log('PHP: ".$_SESSION['username']."');</script>");  
 $namearray = array();
 $aaa=array();
 $bbb=array();
 $usernamearray = array();     
        
$linkID = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
mysql_query("SET NAMES 'UTF8'");
@ mysql_select_db("xinshein_ps") or die("Could not select database");
$user=$_SESSION['username'];
$query = "SELECT * FROM `userdata`";
//echo("<script>console.log('PHP: ".$query."');</script>");  
$result = mysql_query($query);
echo "<select name='user'>";
while ($temp = mysql_fetch_array($result)) {
    echo "<option value='".$temp['username']."'>".$temp['name']."</option>";
	$namearray[]=$temp['name'];
	$usernamearray[]=$temp['username'];
	$aaa[]=$temp['username'];
	$bbb[]=$temp['name'];
	echo("<script>console.log('PHP: ".count($usernamearray)."');</script>");  
}
echo "</select>";
//$row = mysql_fetch_array($result);
?>
<p>考試日期: <input type="text" id="datepicker" name="datepicker"/></p>
<p>第幾次考試: <input type="number" name="num"></p>
<p>考試分數: <input type="number" name="grade"></p>
<p>範圍:<input type="text" id="range" name="range"/></p>
 
 <input name="submit" type="submit" value="送出">
 </form>   
 <p>上傳聯絡</p>
      <form action="updateContact.php" method="post" name="form2">
        
        <?php
 
 echo("<script>console.log('PHP: ".$_SESSION['username']."');</script>");  

$linkID = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
mysql_query("SET NAMES 'UTF8'");
@ mysql_select_db("xinshein_ps") or die("Could not select database");
$user=$_SESSION['username'];
$query = "SELECT * FROM `userdata`";
//echo("<script>console.log('PHP: ".$query."');</script>");  
$result = mysql_query($query);
echo "<select name='Contactuser'>";
while ($temp = mysql_fetch_array($result)) {
    echo "<option value='".$temp['username']."'>".$temp['name']."</option>";
}
echo "</select>";
//$row = mysql_fetch_array($result);
?>
<p>聯絡日期: <input type="text" id="Contactdatepicker" name="Contactdatepicker"/></p>
<p>聯絡主題: <input type="text" name="Contacttitle"></p>
<p>聯絡內容:<input type="text" id="Contactcontent" name="Contactcontent"/></p>
 
 <input name="Contactsubmit" type="submit" value="送出">
 </form>   
   
      
      </div>
      <div class="jumbotron">
      	<table class="table table-bordered">

<?php 
echo("<script>console.log('PHP2: ".count($aaa)."');</script>");  
$conn = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
mysql_query("SET NAMES 'UTF8'");
@ mysql_select_db("xinshein_ps") or die("Could not select database");
 for ($i=0; $i <count($aaa) ; $i++) {
 	$tempuname= $aaa[$i];
	$tempname=$bbb[$i];
    $query2 = "SELECT * FROM `grade` where `user` = '$tempuname'";
echo("<script>console.log('PHP: ".$query."');</script>");  
echo"<tr>";
 echo"<td>$tempname</td>";

$result2 = mysql_query($query2);
while ($temp2 = mysql_fetch_array($result2)) {
 $tempgrade=$temp2['grade'];
	$temprange=$temp2['range'];
 echo "<td>$temprange&nbsp;&nbsp;$tempgrade";
 echo"</td>";
 
}  
	echo"</tr>"  ;
	  
	  
  }




?>

 
 
 
	</table>
      
      
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
       <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
