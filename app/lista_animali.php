<?php
include "db.php";
$page_title    = "Elenco animali";
$page_heading  = "Elenco animali";
$page_subtitle = "Tutti i pazienti registrati nel sistema.";
$show_back = true;
$active = 'animali';
$wide = true;
include "partials/header.php";

$result = $conn->query("SELECT * FROM Animale");
?>
<section class="card">
<?php if (!$result): ?>
    <div class="alert alert-err"><?= htmlspecialchars("Errore nella query: " . $conn->error) ?></div>
<?php elseif ($result->num_rows === 0): ?>
    <div class="empty-state">Nessun animale presente. <a href="inserisci_animale.php">Aggiungine uno</a>.</div>
<?php else: ?>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr><th>ID</th><th>Nome</th><th>Specie</th><th>Razza</th><th>Età</th></tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['IDAnimale']) ?></td>
                    <td><?= htmlspecialchars($row['Nome']) ?></td>
                    <td><?= htmlspecialchars($row['Specie']) ?></td>
                    <td><?= htmlspecialchars($row['Razza']) ?></td>
                    <td><?= htmlspecialchars($row['Eta']) ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
</section>
<?php include "partials/footer.php"; ?>
