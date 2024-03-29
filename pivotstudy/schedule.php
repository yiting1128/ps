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
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Schedule</title>

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
            <li><a href="mainpage.php">個人學習檔案</a></li>
            <li class="active"><a href="schedule.php">進度表排定</a></li>
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
       <h1>維修中</h1>
        <p>將儘快恢復服務...</p>
        
      </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
       <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
