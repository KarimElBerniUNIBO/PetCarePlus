<?php
include "db.php";
$page_title    = "Area amministratore";
$page_heading  = "Area amministratore";
$page_subtitle = "Visione completa sullo stato della struttura: personale, ricoveri, laboratori e box.";
$show_back = true;
$active = 'admin';
$wide = true;

// Icone (riusate dalla dashboard)
$ic = [
    'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
    'bed'   => '<path d="M3 7v12M3 14h18v5M21 19v-5a4 4 0 0 0-4-4H9v4"/><circle cx="6" cy="11" r="1.6"/>',
    'lab'   => '<path d="M9 3h6M10 3v6l-5 9a2 2 0 0 0 1.8 3h10.4A2 2 0 0 0 19 18l-5-9V3"/><path d="M7.5 14h9"/>',
    'box'   => '<path d="M21 8l-9-5-9 5 9 5 9-5Z"/><path d="M3 8v8l9 5 9-5V8M12 13v8"/>',
    'users' => '<circle cx="9" cy="8" r="3.2"/><path d="M3.5 20a5.5 5.5 0 0 1 11 0"/><path d="M16 5.2a3.2 3.2 0 0 1 0 5.6M17 14.4a5.5 5.5 0 0 1 3.5 5.6"/>',
];
function ico($svg) {
    return '<span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' . $svg . '</svg></span>';
}
include "partials/header.php";
?>
<div class="admin-grid">

    <section class="section-card">
        <h3><?= ico($ic['clock']) ?> Turni del personale</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_turni.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><span>" . htmlspecialchars("{$row['Nome']} {$row['Cognome']}") . "</span>"
                   . "<span class='meta'>" . htmlspecialchars("{$row['Data']} · {$row['OrarioInizio']}–{$row['OrarioFine']}") . "</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessun turno registrato.</li>";
        }
        ?>
        </ul>
    </section>

    <section class="section-card">
        <h3><?= ico($ic['bed']) ?> Animali ricoverati</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_animali_ricoverati.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><span>" . htmlspecialchars("{$row['Nome']} ({$row['Specie']})") . "</span>"
                   . "<span class='meta'>" . htmlspecialchars("Box {$row['IDBox']} · {$row['Tipo']}") . "</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessun animale ricoverato.</li>";
        }
        ?>
        </ul>
    </section>

    <section class="section-card">
        <h3><?= ico($ic['lab']) ?> Attività dei laboratori</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_lab.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><span>" . htmlspecialchars($row['TipoAnalisi']) . "</span>"
                   . "<span class='meta'>" . htmlspecialchars($row['NumeroEsami']) . " esami</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessun dato disponibile.</li>";
        }
        ?>
        </ul>
    </section>

    <section class="section-card">
        <h3><?= ico($ic['box']) ?> Stato dei box</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_box.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $libero = strtolower($row['StatoOccupazione']) === 'libero';
                $badge = $libero ? 'badge-free' : 'badge-busy';
                echo "<li><span>" . htmlspecialchars("Box {$row['IDBox']} · {$row['Tipo']}")
                   . " <span class='meta'>" . htmlspecialchars($row['Settore']) . "</span></span>"
                   . "<span class='badge $badge'>" . htmlspecialchars($row['StatoOccupazione']) . "</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessun box registrato.</li>";
        }
        ?>
        </ul>
    </section>

    <section class="section-card">
        <h3><?= ico($ic['users']) ?> Personale per settore</h3>
        <ul class="data-list">
        <?php
        // Vista completa (tutti i settori). Il file query_personale.sql resta filtrato per
        // un singolo settore, com'è documentato nella relazione (Op. 11).
        $result = $conn->query(
            "SELECT P.Nome, P.Cognome, P.Specializzazione, S.Nome AS Settore
             FROM AssegnatoA A
             JOIN Personale P ON A.IDPersona = P.IDPersona
             JOIN Settore S ON A.IDSettore = S.IDSettore"
        );
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><span>" . htmlspecialchars("{$row['Nome']} {$row['Cognome']}")
                   . " <span class='meta'>" . htmlspecialchars($row['Specializzazione']) . "</span></span>"
                   . "<span class='meta'>" . htmlspecialchars($row['Settore']) . "</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessuna assegnazione registrata.</li>";
        }
        ?>
        </ul>
    </section>

</div>
<?php include "partials/footer.php"; ?>
