<?php

/* Because the authentication prompt needs to be invoked twice,
embed it within a function.
*/
function authenticate_user() {
	header('WWW-Authenticate: Basic realm="Tickets"');
	header("HTTP/1.0 401 Unauthorized");
	exit;
}
/* If $_SERVER['PHP_AUTH_USER'] is blank, the user has not yet been
prompted for the authentication information.
*/
if (!isset ($_SERVER['PHP_AUTH_USER'])) {
	authenticate_user();
} else {
	// Connect to the MySQL database
	mysql_pconnect("localhost", "xinshein", "jackson0") or die("Can't connect to database server!");
	mysql_select_db("xinshein_ps") or die("Can't select database!");
	// Create and execute the selection query.
	$query = "SELECT username, pswd FROM userauth
	WHERE username='$_SERVER[PHP_AUTH_USER]' AND
	pswd='$_SERVER[PHP_AUTH_PW]'";
	$result = mysql_query($query);
	// If nothing was found, reprompt the user for the login information.
	if (mysql_num_rows($result) == 0) {
		authenticate_user();
	} else {
		echo "<center><h3>You are logged in as " . $_SERVER['PHP_AUTH_USER'] . "</h3></center>";
	}
}
?>