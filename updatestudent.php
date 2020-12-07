<?
include "utility_functions.php";
$sessionid = $_GET["sessionid"];
verify_session($sessionid);

echo("Update Existing Student <br />");

echo("
	<FORM name='updatestudent' method='POST' action=\"updatestudent_action.php?sessionid=$sessionid\">
	ID: <input type='text' name='id'></br>
	Name: <input type='text' name='name'></br>
	Age: <input type='text' name='age'></br>
	Address: <input type='text' name='address'></br>
	Student Type: (e.g Gradute/UnderGraduate)<input type='text' name='std_type'></br>
	Password: <input type='text' name='password'></br>
	<input type='submit' name='submit' value='Update Student'></br>
	</FORM>
");

?>