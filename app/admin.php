<?php
include "db.php";
$page_title    = "Area amministratore";
$page_heading  = "Area amministratore";
$page_subtitle = "Riepilogo dello stato della struttura.";
$show_back = true;
$active = 'admin';
$wide = true;
include "partials/header.php";
?>
<div class="admin-grid">

    <section class="section-card">
        <h3>Turni del personale</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_turni.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><span>" . htmlspecialchars("{$row['Nome']} {$row['Cognome']}") . "</span>"
                   . "<span class='meta'>" . htmlspecialchars("{$row['Data']} - {$row['OrarioInizio']}/{$row['OrarioFine']}") . "</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessun turno registrato.</li>";
        }
        ?>
        </ul>
    </section>

    <section class="section-card">
        <h3>Animali ricoverati</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_animali_ricoverati.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><span>" . htmlspecialchars("{$row['Nome']} ({$row['Specie']})") . "</span>"
                   . "<span class='meta'>" . htmlspecialchars("Box {$row['IDBox']} - {$row['Tipo']}") . "</span></li>";
            }
        } else {
            echo "<li class='empty-state'>Nessun animale ricoverato.</li>";
        }
        ?>
        </ul>
    </section>

    <section class="section-card">
        <h3>Attività dei laboratori</h3>
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
        <h3>Stato dei box</h3>
        <ul class="data-list">
        <?php
        $result = $conn->query(file_get_contents("../sql/query_box.sql"));
        if ($result && $result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $libero = strtolower($row['StatoOccupazione']) === 'libero';
                $badge = $libero ? 'badge-free' : 'badge-busy';
                echo "<li><span>" . htmlspecialchars("Box {$row['IDBox']} - {$row['Tipo']}")
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
        <h3>Personale per settore</h3>
        <ul class="data-list">
        <?php
        // tutti i settori (il file query_personale.sql resta filtrato per un solo settore)
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
