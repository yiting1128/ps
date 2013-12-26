<?php session_start(); ?>
<?php   
if($_SESSION['username'] == null)
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
            <li><a href="contact.php">電子聯絡簿</a></li>
            <li><a href="askonline.php">線上助教</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">其他功能 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">線上測驗</a></li>
                <li><a href="manager.php">後台管理</a></li>
                
                <!-- <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li> -->
              </ul>
            </li>
            <li><a href="logout.php">登出</a></li> 
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
        <?php
 
 echo("<script>console.log('PHP: ".$_SESSION['username']."');</script>");  
 $datearray = array();
 $gradearray = array();
 $S = array();
 $W = array();
 $O = array();
 $T = array();
 $near;
 $mid;
 $longgoal;
        
$linkID = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
mysql_query("SET NAMES 'UTF8'");
@ mysql_select_db("xinshein_ps") or die("Could not select database");
$user=$_SESSION['username'];
$query = "SELECT * FROM `grade` Where `user`='$user'";
$query2 = "SELECT * FROM `userdata` Where `username`='$user'";
$query3 = "SELECT * FROM `users` Where `username`='$user'";
echo("<script>console.log('PHP: ".$query."');</script>");  
$result = mysql_query($query);
$result2 = mysql_query($query2);
$result3= mysql_query($query3);
//$row = mysql_fetch_array($result);

while($row2 = mysql_fetch_array($result2)){
echo"<div class='row'><div class='col-md-3'>姓名</div><div class='col-md-7'>";
echo($row2['name']);
echo"</div></div>";
echo"<div class='row'><div class='col-md-3'>就讀國中</div><div class='col-md-7'>";
echo($row2['school']);
echo"</div></div>";
echo"<div class='row'><div class='col-md-3'>就讀課程</div><div class='col-md-7'>";
echo($row2['class']);
echo"</div></div>";

$S=explode("、", $row2['Strength']);
$W=explode("、", $row2['Weakness']);
$O=explode("、", $row2['Opportunities']);
$T=explode("、", $row2['Threats']);
$near=$row2['Near'];
$mid=$row2['Mid'];
$longgoal=$row2['Longgoal'];

 echo("<script>console.log('PHP: ".$S[1]."');</script>");



 


        
       
} ?>
<div class="row"><div class='col-md-3'>密碼</div>
<form role="form" class="form-inline" action="changepw.php" method="post">
  <div class="form-group">
    <!-- <label for="exampleInputEmail1">密碼</label> -->
    <div class='col-md-7'>
 <?php
while($row3 = mysql_fetch_array($result3)){
	$pw=$row3['password'];
echo"<input type='text' class='form-control' id='exampleInputPassword1' placeholder='Password' name='pw' value='$pw'></div>";
             
}  
?>

<button type="submit" class="btn btn-default">更改密碼</button>
</div>
</div>
</form>



<?php
while($row = mysql_fetch_array($result)){
	echo ("<div class='panel panel-default'>");
echo("<div class='panel-heading'>")	;
// echo "<div class='list-group'><a class='list-group-item active'><h4 class='list-group-item-heading'>";
echo $row['date'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo $row['range'];
echo("</div><div class='panel-body'>");
// echo "<p class='list-group-item-text'>";
echo $row['grade'];
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo("<a class='btn btn-lg btn-primary' href='#'>訂正考卷</a>");
echo "</div></div>";

	array_push($datearray,$row['date'] );
	array_push($gradearray,$row['grade'] );
        
       
}
 echo("<script>console.log('PHP: ".$datearray[0]."');</script>");
  echo("<script>console.log('PHP: ".$datearray[1]."');</script>");  

?>

 <script>
  var dateArray = new Array();
  var gradeArray = new Array();
  <?php for($i=0;$i<count($datearray);$i++) { ?>
     dateArray[<?php echo $i ?>] = "<?php echo $datearray[$i] ?>";
     gradeArray[<?php echo $i ?>] = <?php echo $gradearray[$i] ?>;
  <?php } ?>
 
 </script>
 
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
      	var data = new google.visualization.DataTable();
// Declare columns

data.addColumn('string', '日期');
data.addColumn('number', '小考分數');
for(var i=0;i<dateArray.length;i++){
data.addRows([
  [dateArray[i],gradeArray[i]] // Example of specifying actual and formatted values.
]);

}

     

        var options = {
          title: '小考成績',
          pointSize: 5
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
  </script>
 
 
    
        
       
        
        <p>
        	 <div id="chart_div" style="width: 900px; height: 500px;"></div>
        	
        	
        
        </p>
      </div>
<div class="jumbotron">
	<p>個人學習檔案</p>
	<br>
<canvas id="myCanvas" width="1000" height="300" style="border:0px solid #d3d3d3;">
Your browser does not support the HTML5 canvas tag.</canvas>	

<?php 
echo"<script>";

echo"var c=document.getElementById('myCanvas');";
echo"var ctx=c.getContext('2d');";
echo"ctx.moveTo(0,100);";
echo"ctx.lineTo(400,100);";
echo"ctx.stroke();";

echo"var ctx2=c.getContext('2d');";
echo"ctx2.moveTo(200,0);";
echo"ctx2.lineTo(200,200);";
echo"ctx2.stroke();";

echo"var ctxs=c.getContext('2d');";
echo"ctxs.fillText('S',185,95);";
echo"ctxs.stroke();";

echo"var ctxw=c.getContext('2d');";
echo"ctxw.fillText('W',205,95);";
echo"ctxw.stroke();";

echo"var ctxo=c.getContext('2d');";
echo"ctxo.fillText('O',185,115);";
echo"ctxo.stroke();";

echo"var ctxt=c.getContext('2d');";
echo"ctxt.fillText('T',205,115);";
echo"ctxt.stroke();";


  

echo"ctx3=c.getContext('2d');";
echo"ctx3.font='20px Arial';";
for ($j=0; $j <count($j)+1 ; $j++) {
echo("console.log('PHP: ".$j."');"); 
echo"ctx3.fillText('$S[$j]',30,40+20*$j);";

echo"ctx3.stroke();";	
}
// 
for ($k=0; $k <count($W)+1 ; $k++) { 
echo"var ctx4=c.getContext('2d');";
echo "ctx4.font='20px Arial';";
echo"ctx4.fillText('$W[$k]',230,40+20*$k);";
echo"ctx4.stroke();";	
}  

for ($l=0; $l <count($O)+1 ; $l++) { 
echo"var ctx5=c.getContext('2d');";
echo "ctx5.font='20px Arial';";
echo"ctx5.fillText('$O[$l]',30,140+20*$l);";
echo"ctx5.stroke();";	
}

for ($m=0; $m <count($T)+1 ; $m++) { 
echo"var ctx6=c.getContext('2d');";
echo "ctx6.font='20px Arial';";
echo"ctx6.fillText('$T[$m]',230,140+20*$m);";
echo"ctx6.stroke();";	
}         


echo"var ctxnear=c.getContext('2d');";
echo "ctxnear.font='20px Arial';";
echo"ctxnear.fillStyle = 'blue';";
echo"ctxnear.fillText('近程目標',515,200);";

echo"ctxnear.stroke();";

echo"var ctxneartext=c.getContext('2d');";
echo "ctxneartext.font='20px Arial';";
echo"ctxneartext.fillStyle = 'black';";
echo"ctxneartext.fillText('$near',515,240);";
echo"ctxneartext.stroke();";

echo"var ctxmid=c.getContext('2d');";
echo "ctxmid.font='20px Arial';";
echo"ctxmid.fillStyle = 'blue';";
echo"ctxmid.fillText('中程目標',665,120);";
echo"ctxmid.stroke();";

echo"var ctxmidtext=c.getContext('2d');";
echo "ctxmidtext.font='20px Arial';";
echo"ctxmidtext.fillStyle = 'black';";
echo"ctxmidtext.fillText('$mid',665,160);";
echo"ctxmidtext.stroke();";

echo"var ctxfar=c.getContext('2d');";
echo "ctxfar.font='20px Arial';";
echo"ctxfar.fillStyle = 'blue';";
echo"ctxfar.fillText('遠程目標',815,40);";
echo"ctxfar.stroke();";

echo"var ctxfartext=c.getContext('2d');";
echo "ctxfartext.font='20px Arial';";
echo"ctxfartext.fillStyle = 'black';";
echo"ctxfartext.fillText('$longgoal',815,80);";
echo"ctxfartext.stroke();";

           



echo"</script>";
?>

	
	
	</div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
       <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
