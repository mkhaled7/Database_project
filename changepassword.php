<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
verify_session($sessionid);

echo("<br />");

echo("
	<FORM name='changepassword' method='POST' action=\"changepassword_action.php?sessionid=$sessionid\">
	Old Password: <input type='password' name='oldpassword'>
	New Password: <input type='password' name='newpassword'>
	<input type='submit' name='submit' value='change password'>
	</FORM>
");

?>