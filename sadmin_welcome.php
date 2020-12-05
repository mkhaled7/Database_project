<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);


// Here we can generate the content of the welcome page
echo("Welcome Student-Administrator: <br />");
echo("<UL>
  <LI><A HREF=\"student_welcome.php?sessionid=$sessionid\">Student Page</A></LI>
  <LI><A HREF=\"admin_welcome.php?sessionid=$sessionid\">Admin Page</A></LI>
  </UL>");

echo("<br />");
echo("<br />");
echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
?>