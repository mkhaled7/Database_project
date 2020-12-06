<?
include "utility_functions.php";
$sessionid = $_GET["sessionid"];
verify_session($sessionid);

$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];

$sql = "select myclient.clientid from myclient JOIN myclientsession on myclient.clientid = myclientsession.clientid where myclientsession.sessionid='$sessionid' and myclient.password = '$oldpassword'";

$result_array = execute_sql_in_oracle($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if($result == false){
	display_oracle_error_message($cursor);
    die("Client Query Failed.");
}

if($values = oci_fetch_array ($cursor)){
//	echo "Im here";
	oci_free_statement($cursor);
	$clientid = $values[0];

	if($result == false){
		
//	echo "Im here 11";
		display_oracle_error_message($cursor);
  		die("New session not created");
	}

	else{
		
//	echo "Im here 4444";
		//new session created
		$sql = "UPDATE myclient SET password='$newpassword' WHERE clientid='$clientid'";
		execute_sql_in_oracle($sql);

		echo("Password update for $clientid successful");
	}
 } else{
	 echo("password not updated");
 }

//

?>
