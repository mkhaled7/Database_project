<?
include "utility_functions.php";
$sessionid = $_GET["sessionid"];
verify_session($sessionid);

echo("Add New Student <br />");

echo("
	<FORM name='newstudent' method='POST' action=\"newstudent_action.php?sessionid=$sessionid\">
	ID: <input type='text' name='id'></br>
	Name: <input type='text' name='name'></br>
	Age: <input type='text' name='age'></br>
	Address: <input type='text' name='address'></br>
	Student Type: (e.g Gradute/UnderGraduate)<input type='text' name='std_type'></br>
	Password: <input type='text' name='password'></br>
	<input type='submit' name='submit' value='Add New Student'></br>
	</FORM>
");


?>