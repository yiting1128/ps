<?php
session_start();
session_unset();
session_destroy();
echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
exit;

?>