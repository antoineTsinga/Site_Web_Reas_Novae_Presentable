<?php 
    session_start();
    if(!isset($_SESSION['Id'])){
        header('Location:Connexion.php');
        die();
    }    
?>

<?php
include 'database.php';
global $db;
?>

<?php 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=A1CE");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
//echo "Raw Data:<br />";
//echo("$data");

$data_tab = str_split($data,33);
//echo "Tabular Data:?><!--<br />--> " ;<?php
for($i=0, $size=count($data_tab); $i<$size; $i++){
//echo "Trame $i: $data_tab[$i] <br />";
}
$size=count($data_tab);
$trame = $data_tab[$size-2];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

$date = $year.'-'.$month.'-'.$day;
$heure = $hour.':'.$min.':'.$sec;

$test= $db->prepare('INSERT INTO test (`Date`, `Heure`, `id_categories_test`) VALUES (?,?,?)');

$test->execute(array($date,$heure,$c));


$resultat_test = $db->prepare('SELECT idtest FROM `test` 
            WHERE Date = ? AND Heure = ?');

$resultat_test->execute(array($date,$heure));
$idtest = $resultat_test->fetch();

$re = $db->prepare('INSERT INTO `resultat` (`Score`, `test_idtest`, `Appareil_de_test_idReference`, `Utilisateur_idUtilisateur`) VALUES (?,?,?,?)');

$re->execute(array(hexdec($v),$idtest['idtest'],1,$_SESSION['Id']));

header("Location: Mesresultats.php");
