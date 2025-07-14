<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Area Amministratore - PetCare+</title>
</head>
<body>
    <h1>👨‍⚕️ Area Amministratore</h1>

    <h3>📆 Turni del personale</h3>
    <?php
    $sql = file_get_contents("../sql/query_turni.sql");
    $result = $conn->query($sql);
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['Data']} - {$row['OrarioInizio']}–{$row['OrarioFine']} – {$row['Nome']} {$row['Cognome']} ({$row['Specializzazione']})</li>";
    }
    echo "</ul>";
    ?>

    <h3>🛏️ Animali attualmente ricoverati</h3>
    <?php
    $sql = file_get_contents("../sql/query_animali_ricoverati.sql");
    $result = $conn->query($sql);
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['Nome']} ({$row['Specie']}) – Box {$row['IDBox']} [{$row['Tipo']}]</li>";
    }
    echo "</ul>";
    ?>

    <h3>🔬 Attività dei laboratori</h3>
    <?php
    $sql = file_get_contents("../sql/query_lab.sql");
    $result = $conn->query($sql);
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['TipoAnalisi']}: {$row['NumeroEsami']} esami registrati</li>";
    }
    echo "</ul>";
    ?>

    <h3>🏥 Stato attuale dei box</h3>
    <?php
    $sql = file_get_contents("../sql/query_box.sql");
    $result = $conn->query($sql);
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Box {$row['IDBox']} ({$row['Tipo']}) – {$row['StatoOccupazione']} – Settore: {$row['Settore']}</li>";
    }
    echo "</ul>";
    ?>

    <h3>👨‍⚕️ Assegnazione del personale ai settori</h3>
    <?php
    $sql = file_get_contents("../sql/query_personale.sql");
    $result = $conn->query($sql);
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['Nome']} {$row['Cognome']} ({$row['Specializzazione']}) → {$row['Settore']}</li>";
    }
    echo "</ul>";
    ?>

</body>
</html>
