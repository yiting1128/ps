<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
//include("mysqlConnect.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$linkID = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
@ mysql_select_db("xinshein_ps") or die("Could not select database");

$query = "SELECT * FROM `users` WHERE `username`='$id'";
$result = mysql_query($query);
//$row = mysql_fetch_array($result);

while($row = mysql_fetch_array($result)){
	if($id != null && $pw != null && $row['username'] == $id && $row['password'] == $pw)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $id;
		$_SESSION['state']= $row['state'];
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=mainpage.php>';
}
else
{
        echo "a".$row['username'];
		echo "b".$row['password'];
        echo '登入失敗!';
       // echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
	
	
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