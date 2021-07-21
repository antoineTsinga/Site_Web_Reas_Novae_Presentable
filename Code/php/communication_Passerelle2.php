<?php
$ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=A1CE&TRAME=1A1CE21010000000200");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($ch);
        curl_close($ch);

//ACTIVE LE CODE CAPTEUR CARDIAQUE
header("Location: attente.php");

    ?><script type="text/javascript">
                var reponse = alert("Le test est en cours ! Appuyez pour sortir du test");
                document.location.href="Mesresultats.php";
            </script>
        

