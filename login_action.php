<?
include "utility_functions.php";

// Get the client id and password and verify them
$clientid = $_POST["clientid"];
$password = $_POST["password"];

$sql = "select * " .
       "from myclient " .
       "where clientid='$clientid'
         and password ='$password'";

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

if($values = oci_fetch_array ($cursor)){
  oci_free_statement($cursor);

  // found the client
  $clientid = $values[0];
  if($values[2]==1){
    $usertype = "Admin";
    if($values[3]==1){
      $usertype = "StudentAdmin";
    }
  } 
  else if($values[3]==1){
    $usertype = "Student";
  }

  // create a new session for this client
  $sessionid = md5(uniqid(rand()));

  // store the link between the sessionid and the clientid
  // and when the session started in the session table

  $sql = "insert into myclientsession " .
    "(sessionid, clientid, sessiondate) " .
    "values ('$sessionid', '$clientid', sysdate)";

  $result_array = execute_sql_in_oracle ($sql);
  $result = $result_array["flag"];
  $cursor = $result_array["cursor"];
  setcookie('gq047id' ,  $clientid	, time() + (86400 * 1), "/");	
  setcookie('gq047type' ,  $usertype	, time() + (86400 * 1), "/");	
  setcookie('gq047session' ,  $sessionid	, time() + (86400 * 1), "/");	
  setcookie('gq047loggedin' ,  true	, time() + (86400 * 1), "/");	
  // setcookie('name of cookie' ,  $value, time() + (86400 * 1[number of days you want to store cookie]), "/"[domain coverage]);	
  if ($result == false){
    display_oracle_error_message($cursor);
    die("Failed to create a new session");
  }
  else if ($usertype == 'Admin'){
    header("Location:admin_welcome.php?sessionid=$sessionid");
  }
  else if ($usertype == 'Student'){
    header("Location:student_welcome.php?sessionid=$sessionid");
  }
  else if ($usertype == 'StudentAdmin'){
    header("Location:sadmin_welcome.php?sessionid=$sessionid");
  }
  else {
    // insert OK - we have created a new session
    header("Location:welcomepage.php?sessionid=$sessionid");
  }
}
else { 
  // client username not found
  print_r($values);
  die ('Login failed.  Click <A href="login.html">here</A> to go back to the login page.');
} 
?>