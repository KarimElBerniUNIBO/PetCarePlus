<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $box = $conn->query("SELECT IDBox FROM Box WHERE StatoOccupazione='Libero' AND IDSettore={$_POST['id_settore']} LIMIT 1")->fetch_assoc();
    if ($box) {
        $id_box = $box['IDBox'];
        $sql1 = "INSERT INTO Ricovero (IDCartella, IDBox, DataIngresso, DiagnosiIniziale)
                VALUES ({$_POST['id_cartella']}, $id_box, '{$_POST['data_ingresso']}', '{$_POST['diagnosi']}')";
        $sql2 = "UPDATE Box SET StatoOccupazione='Occupato' WHERE IDBox = $id_box";

        // transazione: o entrambe le query o nessuna
        $conn->begin_transaction();
        if ($conn->query($sql1) && $conn->query($sql2)) {
            $conn->commit();
            $alert = ['ok', "Ricovero registrato nel box #$id_box!"];
        } else {
            $conn->rollback();
            $alert = ['err', "Errore: " . $conn->error];
        }
    } else {
        $alert = ['err', "Nessun box disponibile nel settore selezionato!"];
    }
}

$page_title    = "Nuovo ricovero";
$page_heading  = "Registra ricovero";
$page_subtitle = "Apri un ricovero e assegna un box.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_cartella">Cartella clinica</label>
                <?= render_select($conn, 'id_cartella',
                    "SELECT C.IDCartella, A.Nome, A.Specie FROM CartellaClinica C JOIN Animale A ON C.IDAnimale = A.IDAnimale ORDER BY C.IDCartella",
                    'IDCartella', fn($r) => "Cartella #{$r['IDCartella']} — {$r['Nome']} ({$r['Specie']})") ?>
            </div>
            <div class="field">
                <label for="id_settore">Settore</label>
                <?= render_select($conn, 'id_settore',
                    "SELECT IDSettore, Nome, TipoSpecializzazione FROM Settore ORDER BY Nome",
                    'IDSettore', fn($r) => "{$r['Nome']} ({$r['TipoSpecializzazione']})") ?>
            </div>
        </div>
        <div class="field">
            <label for="data_ingresso">Data ingresso</label>
            <input id="data_ingresso" type="date" name="data_ingresso" required>
        </div>
        <div class="field">
            <label for="diagnosi">Diagnosi iniziale</label>
            <input id="diagnosi" type="text" name="diagnosi" placeholder="Es. Frattura zampa anteriore" required>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Registra ricovero</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
