<?php
include "db_conn.php";
session_start();
if( $_POST )
{
 
  mysql_select_db("librairie", $con);


  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $titre = $_POST['titre'];
  $categorie = $_POST['categorie'];
  $numero = $_POST['numero'];

  $query = "
  INSERT INTO `librairie`.`livres`(`livcode`, `livnomaut`, `livprenomaut`, `livtitre`, `livcategorie`, `livISBN`) VALUES (NULL, '$nom',
        '$prenom', '$title', '$categorie','$numero');";

  mysql_query($query);
  CloseCon($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enregistrement d'un livre </title>
</head>
<body>
<h3>Enregistrement d'un livre </h3>

<FORM method="post" action="valide.livre.php">

<TABLE BORDER=0>
<TR>
<TD>Nom de l'auteur  </TD>
<TD>:
<INPUT type=text name="nom">
</TD>
</TR>

<TR>
<TD>Prenom de l'auteur </TD>
<TD>:
<INPUT type=text name="prenom">
</TD>
</TR>

<TR>
<TD>Titre du livre </TD>
<TD>:
<INPUT type=text name="Titre">
</TD>
</TR>

<TR>
<TD>Categorie </TD>
<TD>:
<SELECT name="categorie">
<OPTION VALUE="roman">Roman</OPTION>
<OPTION VALUE="sci">Science-fiction</OPTION>
<OPTION VALUE="policier">Policier</OPTION>
<OPTION VALUE="autre">Autre</OPTION>
</SELECT>
</TD>
</TR>
<TR>
<TD>Numero ISBN 
</TD>
<TD>:
<INPUT type=text name="numero">
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



