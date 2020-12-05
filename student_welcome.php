<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
verify_session($sessionid);

echo("Welcome Student! <br />");


//change password page link
echo("<UL>
  <LI><A HREF=\"changepassword.php?sessionid=$sessionid\">Change my Password</A></LI>
  </UL>");

echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
?>