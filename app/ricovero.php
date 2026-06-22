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

        // Operazione atomica: o vanno a buon fine entrambe le query, o si annulla tutto (Op. 18)
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
$page_subtitle = "Il sistema assegna automaticamente il primo box libero del settore e lo segna come occupato.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_cartella">ID Cartella</label>
                <input id="id_cartella" type="number" name="id_cartella" required>
            </div>
            <div class="field">
                <label for="id_settore">Settore</label>
                <input id="id_settore" type="number" name="id_settore" required>
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
