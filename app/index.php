<?php
// index.php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>PetCare+ - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            font-size: 18px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Benvenuto in PetCare+</h1>
    <p>Gestione Clinica per Ospedali Veterinari</p>

    <ul>
        <li><a href="inserisci_animale.php">Aggiungi nuovo animale</a></li>
        <li><a href="lista_animali.php">Mostra tutti gli animali</a></li>
        <li><a href="prenotazione.php">Prenota visita veterinaria</a></li>
        <li><a href="ricovero.php">Aggiungi ricovero (con gestione box)</a></li>
        <li><a href="prescrizione.php">Inserisci farmaco in prescrizione</a></li>
        <li><a href="esame.php">Inserisci esame diagnostico e referto</a></li>
        <li><a href="turno.php">Inserisci turno del personale</a></li>
        <li><a href="assegnazione.php">Assegna personale ai settori</a></li>
        <li><a href="settore.php">Aggiungi nuovo settore o specializzazione</a></li>
        <li><a href="box_update.php">Aggiorna disponibilità dei box</a></li>
        <li><a href="admin.php">Area Amministratore (visione completa)</a></li>
    </ul>
</body>
</html>
