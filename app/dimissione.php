<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $id_ricovero = (int)$_POST['id_ricovero'];

    $res = $conn->query("SELECT IDBox FROM Ricovero WHERE IDRicovero=$id_ricovero");
    if ($res && $row = $res->fetch_assoc()) {
        $id_box = $row['IDBox'];

        $sql_ricovero = "UPDATE Ricovero SET DataUscita='{$_POST['data_uscita']}', DiagnosiDimissione='{$_POST['diagnosi_dimissione']}' WHERE IDRicovero=$id_ricovero";
        $sql_box      = "UPDATE Box SET StatoOccupazione='Libero' WHERE IDBox=$id_box";

        if ($conn->query($sql_ricovero) && $conn->query($sql_box)) {
            $alert = ['ok', "Dimissione effettuata e box liberato!"];
        } else {
            $alert = ['err', "Errore: " . $conn->error];
        }
    } else {
        $alert = ['err', "Ricovero non trovato."];
    }
}

$page_title    = "Dimissione ricovero";
$page_heading  = "Dimissione da ricovero";
$page_subtitle = "Registra data di uscita e diagnosi di dimissione: il box associato torna automaticamente libero.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_ricovero">ID Ricovero</label>
                <input id="id_ricovero" type="number" name="id_ricovero" required>
            </div>
            <div class="field">
                <label for="data_uscita">Data uscita</label>
                <input id="data_uscita" type="date" name="data_uscita" required>
            </div>
        </div>
        <div class="field">
            <label for="diagnosi_dimissione">Diagnosi dimissione</label>
            <input id="diagnosi_dimissione" type="text" name="diagnosi_dimissione" placeholder="Es. Guarito" required>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Dimetti</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
