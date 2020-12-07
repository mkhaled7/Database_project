<?
include "utility_functions.php";
$sessionid = $_GET["sessionid"];
verify_session($sessionid);

$sql = "select max(clientid) from myclient";
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
	$clientid++;
//	echo "ID is: ".$clientid."</br>";
	$id = $_POST["id"];
//	echo "ID 1 is: ".$id."</br>";
	$name = $_POST["name"];
//	echo "Name is: ".$name."</br>";
	$age = $_POST["age"];
//	echo "age is: ".$age."</br>";
	$address = $_POST["address"];
//	echo "Address is: ".$address."</br>";
	$pass = $_POST["password"];
	$std_type = $_POST["std_type"];
//	echo "Password is: ".$pass."</br>";

	$sql = "insert into myclient values ('$clientid', '$pass','0','1')";
//	echo  "query is ".$sql;
	$result_array = execute_sql_in_oracle($sql);
	$sql = "insert into student values ('$id', '$name', '$age', '$address', '$std_type', '$clientid')";
//	echo  "query is ".$sql;
	$result_array = execute_sql_in_oracle($sql);
	$result1 = $result_array["flag"];
	$cursor1 = $result_array["cursor"];
	if($result1 == false){
		display_oracle_error_message($cursor1);
		die("Hello Error Here.");
	}
	if ($result1 == true){
		echo "User Added Successfully";
	}
	
}
else{
	 echo("Error While adding new user");
 }
?>
