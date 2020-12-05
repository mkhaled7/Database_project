<?
include "utility_functions.php";
$sessionid = $_GET["sessionid"];
verify_session($sessionid);

$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];

$sql = "select myclient.clientid ".
	   "from myclient JOIN myclientsession".
	   "on sessionid = '$sessionid'".
	   "and password = '$oldpassword'";

$result_array = execute_sql_in_oracle($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if($result == false){
	display_oracle_error_message($cursor);
    die("Client Query Failed.");
}

if($values = oci_fetch_array ($cursor)){
	oci_free_statement($cursor);
	$userid = $values[0];

	if($result == false){
		display_oracle_error_message($cursor);
  		die("New session not created");
	}

	else{
		//new session created
		$sql = "UPDATE myclient SET password='$newpassword' WHERE clientid='$clientid'";
		execute_sql_in_oracle($sql);

		echo("Password update for $clientid successful");
	}
 } else{
	 echo("password not updated");
 }



?>
