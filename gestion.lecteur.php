<?php
include "db_conn.php";
session_start();
$con=OpenCon(); 

if( $_POST )
{
 mysqli_select_db($con ,"librairie");
if (isset($POST['lec_nom']) &&
        isset($POST['lec_prenom']) &&
        isset($POST['lec_password'])&&
        isset($POST['lec_adresse'])&&
        isset($POST['lec_ville'])&&
       isset($POST['lec_CP']) ){
        

  
  $query = "
  INSERT INTO `librairie`.`lecteurs` (`lecnum`, `lecnom`, `lecprenom`, `lecadresse`, `lecville`, `leccodepostal`, `lecmotdepasse`) VALUES('".$_POST['lec_nom']."','".$_POST['lec_prenom']."','".$_POST['lec_adresse']."','".$_POST['lec_ville']."','".$_POST['lec_CP']."','".$_POST['lec_password']."')";

  mysqli_query($con ,$query);
}
  CloseCon($con);
}
?>
<h3>Gestion du lecteur</h3>
Le lecteur n'est pas reconnu<br>
Cliquer <a href="authentification.php" >ici</a> pour tenter une nouvelle identification<br>
<h4>Enregistrement d'un lecteur</h4>
Si vous etre un nouveau lecteur, veuillez vous enregistrer en remplissant le formulaire ci-dessous:<br>
<FORM method="post" action="valide.lecteur.php">

<TABLE BORDER=0>
<TR>
<TD>Nom </TD>
<TD>:
<INPUT type=text name="lec_nom">
</TD>
</TR>

<TR>
<TD>Prenom </TD>
<TD>:
<INPUT type=text name="lec_prenom">
</TD>
</TR>
<TR>
<TD>Mot de passe</TD>
<TD>:
<INPUT type=password name="lec_password">
</TD>
</TR>
<TR>
<TD>Adresse</TD>
<TD>:
<INPUT type=text name="lec_adresse">
</TD>
</TR>

<TR>
<TD>Ville </TD>
<TD>:
<INPUT type=text name="lec_ville">
</TD>
</TR>
<TR>
<TD>Code Postal </TD>
<TD>:
<INPUT type=number name="lec_CP">
</TD>
</TR>

<TR>
<TD COLSPAN=2>
<INPUT type="submit" value="valider">
</TD>
</TR>
</TABLE>
</FORM>
