

<?
include "utility_functions.php";
$sessionid = $_GET["sessionid"];
verify_session($sessionid);

$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];

$sql = "select * from myclient JOIN myclientsession on myclient.clientid = myclientsession.clientid where myclientsession.sessionid='$sessionid' and myclient.password = '$oldpassword'";
$result_array = execute_sql_in_oracle($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if($result == false){
	display_oracle_error_message($cursor);
    die("Client Query Failed.");
}

if($values = oci_fetch_array ($cursor)){

	oci_free_statement($cursor);
	$clientid = $values[0];
	$name='';
	if ($values[2]==1){
	$name='admin';
	if ($values[3]==1){
		$name='Student Admin';
		}
	}
	if ($values[3]==1){

	$sql = "select * from student where clientid='$clientid'";
	$result_array = execute_sql_in_oracle($sql);
	$result1 = $result_array["flag"];
	$cursor1 = $result_array["cursor"];
	if($result1 == false){
		display_oracle_error_message($cursor1);
		die("Hello Error Here.");
	}
	$values1 = oci_fetch_array ($cursor1);
	$name	= $values1[1];
	}

	 if($result == false){
		
		display_oracle_error_message($cursor);
  		die("New session not created");
	}

	else{

		$sql = "UPDATE myclient SET password='$newpassword' WHERE clientid='$clientid'";
		execute_sql_in_oracle($sql);
		echo("Password update for $name successful");
			
		
 }
 } else{
	 echo("password not updated");
 }


?>
