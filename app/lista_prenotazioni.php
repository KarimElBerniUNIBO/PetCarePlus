<?php
include "db.php";
$page_title    = "Elenco prenotazioni";
$page_heading  = "Elenco prenotazioni";
$page_subtitle = "Le visite prenotate, in ordine di data.";
$show_back = true;
$wide = true;
include "partials/header.php";

$sql = "SELECT P.IDPrenotazione, P.Data, A.Nome AS Animale, A.Specie, Pe.Nome, Pe.Cognome
        FROM Prenotazione P
        JOIN Animale A ON P.IDAnimale = A.IDAnimale
        JOIN Personale Pe ON P.IDPersona = Pe.IDPersona
        ORDER BY P.Data";
$result = $conn->query($sql);
?>
<section class="card">
<?php if (!$result): ?>
    <div class="alert alert-err"><?= htmlspecialchars("Errore nella query: " . $conn->error) ?></div>
<?php elseif ($result->num_rows === 0): ?>
    <div class="empty-state">Nessuna prenotazione registrata. <a href="prenotazione.php">Aggiungine una</a>.</div>
<?php else: ?>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr><th>ID</th><th>Data</th><th>Animale</th><th>Veterinario</th></tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['IDPrenotazione']) ?></td>
                    <td><?= htmlspecialchars($row['Data']) ?></td>
                    <td><?= htmlspecialchars($row['Animale'] . " (" . $row['Specie'] . ")") ?></td>
                    <td><?= htmlspecialchars($row['Nome'] . " " . $row['Cognome']) ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
</section>
<?php include "partials/footer.php"; ?>
