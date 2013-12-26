<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
//include("mysqlConnect.php");
$username=$_POST['Contactuser'];
$title = $_POST['Contacttitle'];
$date=$_POST['Contactdatepicker'];
$content=$_POST['Contactcontent'];


//搜尋資料庫資料
$linkID = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
@ mysql_select_db("xinshein_ps") or die("Could not select database");
mysql_query("SET NAMES 'UTF8'");

$query = "INSERT INTO `contact` (`content`,`username`,`date`,`title`)VALUES ('$content', '$username','$date','$title')";
$result = mysql_query($query);
//$row = mysql_fetch_array($result);

if($result){
	
        echo '登錄成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=manager.php>';
}else{
	
	 echo '修改失敗!請聯絡我們';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=manager.php>';
	
}

	


//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
// if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
// {
        // //將帳號寫入session，方便驗證使用者身份
        // $_SESSION['username'] = $id;
        // echo '登入成功!';
        // echo '<meta http-equiv=REFRESH CONTENT=1;url=mainpage.php>';
// }
// else
// {
        // echo "a".$row['username'];
		// echo "b".$row['password'];
        // echo '登入失敗!';
       // // echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
// }
?>