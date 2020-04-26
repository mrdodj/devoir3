<?php
include "db_conn.php";
session_start();
if( $_POST )
{
 
  mysql_select_db("librairie", $con);


  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $adresse = $_POST['adresse'];
  $ville = $_POST['ville'];
  $CP = $_POST['CP'];

  $query = "
  INSERT INTO `librairie`.`lecteurs` (`lecnum`, `lecnom`, `lecprenom`, `lecadresse`, `lecville`, `leccodepostal`) VALUES (NULL, '$nom',
        '$prenom', '$adresse', '$ville','$CP');";

  mysql_query($query);
  CloseCon($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enregistrement d'un lecteur </title>
</head>
<body>
<h3>Enregistrement d'un lecteur </h3>

<FORM method="post" action="valide.lecteur.php">

<TABLE BORDER=0>
<TR>
<TD>Nom </TD>
<TD>:
<INPUT type=text name="nom">
</TD>
</TR>

<TR>
<TD>Prenom </TD>
<TD>:
<INPUT type=text name="prenom">
</TD>
</TR>

<TR>
<TD>Adresse</TD>
<TD>:
<INPUT type=text name="adresse">
</TD>
</TR>

<TR>
<TD>Ville </TD>
<TD>:
<INPUT type=text name="ville">
</TD>
</TR>
<TR>
<TD>Code Postal </TD>
<TD>:
<INPUT type=number name="CP">
</TD>
</TR>

<TR>
<TD COLSPAN=2>
<INPUT type="submit" value="Enregistrer">
</TD>
</TR>
</TABLE>
</FORM>
</body>
</html>










