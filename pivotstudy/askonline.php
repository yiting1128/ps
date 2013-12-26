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

    <title>AskOnline</title>

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
           <li><a href="contact.php">電子聯絡簿</a></li>
            <li class="active"><a href="askonline.php">線上助教</a></li>
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
       <form role="form" action="ask.php" method="post">
  <div class="form-group">
    <label for="subject">問題主題</label>
    <input type="text" class="form-control" id="subject" name="subject" placeholder="主題">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">問題描述</label>
    <textarea class="form-control" rows="5" id="content" name="content"></textarea>
  </div>
  <div class="form-group">
    <label for="image">照片上傳</label>
    <input type="file" id="image" name="image">
  </div>
 
  <button type="submit" class="btn btn-default">送出</button>
</form>
        
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
       <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
