<?php
include_once "db_conn.php";
session_start();
try{
$con=OpenCon();
$destination="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$result = mysqli_query($con,"SELECT * FROM lecteurs WHERE lecnom='" . $_POST["lecnom"] . "' and lecmotdepasse = '". $_POST["lecmotdepasse"]."'");
	
	if(mysqli_num_rows($result) > 0) {
		$destination="gestion.lecteur.php";
	} else {	
		$destination = "homepage.php";
	}
}
CloseCon($con);
}catch(Exception $e){
	echo $e->getMessage();
}
?>
<h3>Authentification du lecteur</h3>
<form  method='post' action="<? php $destination ?>">
	
		<table>
			<tr>
			<td >Nom du lecteur</td>
			<td>:
			<input type='text' name="lecnom" ></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
			<td>:
			<input type='password' name='lecmotdepasse'></td>
			</tr>
			<tr>
			<td  colspan='2'><input type='submit' name='login' value='Login'></td>
			</tr>
		</table>
</form>


