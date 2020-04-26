<?php
include "db_conn.php";
session_start();
$conn=OpenCon();

$numero="";
$result = mysqli_query($conn,"SELECT lecnum FROM lecteurs WHERE lecnom='" . $_POST["lecteur"] . "' and lecmotdepasse = '". $_POST["password"]."'");
while ($row = $result->fetch_assoc()) {
    $numero=$row['lecnum']."<br>";
}
echo "
<h3>Gestion du lecteur</h3>
Le lecteur numero :  ",$numero,"  est reconnu<br>
<br> <h1> Voici la liste des ouvrages disponibles a la reservation</h1>";

mysqli_select_db($conn , "librairie");
$requet = mysqli_query($conn,"select * from livres" );
if(mysqli_num_rows($requet) > 0){
        echo "<table border= 1>";
            echo "<tr><font color='red'>";
                echo "<th>CodeLivre</th>";
                echo "<th>NomAuteur</th>";
                echo "<th>PrenomAuteur</th>";
                echo "<th>Titre</th>";
                echo "<th>Categorie</th>";
                echo "<th>ISBN</th>";
                echo "<th></th>";
            echo "</font></tr>";
        while($row = mysqli_fetch_array($requet)){
            echo "<tr>";
                echo "<td>" . $row['livcode'] . "</td>";
                echo "<td>" . $row['livnomaut'] . "</td>";
                echo "<td>" . $row['livprenomaut'] . "</td>";
                echo "<td>" . $row['livtitre'] . "</td>";
                echo "<td>" . $row['livcategorie'] . "</td>";
                echo "<td>" . $row['livISBN'] . "</td>";
                echo "<td><a href='reserve.php'> Reserver </a></td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($requet);
    } else{
        echo "No records matching your query were found.";
    }
    ?>
<h1>Voici la liste de vos reservation </h1>
<?php
$req = mysqli_query($conn,"select * from emprunts" );
if(mysqli_num_rows($req) > 0){
        echo "<table border= 1>";
            echo "<tr><font color='red'>";
                echo "<th>CodeLivre</th>";
                echo "<th>NomAuteur</th>";
                echo "<th>PrenomAuteur</th>";
                echo "<th>Titre</th>";
                echo "<th>Categorie</th>";
                echo "<th>ISBN</th>";
                echo "<th></th>";
            echo "</font></tr>";
        while($row1 = mysqli_fetch_array($req) && $row = mysqli_fetch_array($requet)){
            echo "<tr>";
                echo "<td>" . $row['empcodelivre'] . "</td>";
                echo "<td>" . $row['livnomaut'] . "</td>";
                echo "<td>" . $row['livprenomaut'] . "</td>";
                echo "<td>" . $row['livtitre'] . "</td>";
                echo "<td>" . $row['livcategorie'] . "</td>";
                echo "<td>" . $row['livISBN'] . "</td>";
                echo "<td><a href='reserve.php'> Reserver </a></td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($req);
    } else{
        echo "No records matching your query were found.";
    }
?>
