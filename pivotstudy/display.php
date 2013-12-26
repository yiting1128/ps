<?php
    
    //從資料庫取得圖片
    $linkID = @ mysql_connect("localhost", "xinshein", "jackson0") or die("Could not connect to MySQL server");
mysql_query("SET NAMES 'UTF8'");
@ mysql_select_db("xinshein_ps") or die("Could not select database");
    
                    
    $sql="select * from `askonline`";
            
    $result=mysql_query($sql);        
    
    //顯示圖片
    if($row=mysql_fetch_assoc($result)){    
        header("Content-type: image/jpeg");     
        print $row['pic'];
    }
    
    mysql_close($conn);
?>