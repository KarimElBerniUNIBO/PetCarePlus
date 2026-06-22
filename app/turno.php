<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Turno (IDPersona, Data, OrarioInizio, OrarioFine)
            VALUES ({$_POST['id_persona']}, '{$_POST['data']}', '{$_POST['inizio']}', '{$_POST['fine']}')";
    $alert = $conn->query($sql) ? ['ok', "Turno aggiunto!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Turno personale";
$page_heading  = "Inserisci turno";
$page_subtitle = "Assegna un turno orario a un membro del personale con data e orari di inizio e fine.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_persona">ID Persona</label>
                <input id="id_persona" type="number" name="id_persona" required>
            </div>
            <div class="field">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="inizio">Orario inizio</label>
                <input id="inizio" type="time" name="inizio" required>
            </div>
            <div class="field">
                <label for="fine">Orario fine</label>
                <input id="fine" type="time" name="fine" required>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Inserisci turno</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
