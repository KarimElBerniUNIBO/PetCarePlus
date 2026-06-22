<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Prenotazione (IDAnimale, IDPersona, Data)
            VALUES ({$_POST['id_animale']}, {$_POST['id_persona']}, '{$_POST['data']}')";
    $alert = $conn->query($sql) ? ['ok', "Visita prenotata!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Prenota visita";
$page_heading  = "Prenotazione visita";
$page_subtitle = "Pianifica una visita futura per un animale paziente indicando il veterinario richiesto.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_animale">ID Animale</label>
                <input id="id_animale" type="number" name="id_animale" required>
            </div>
            <div class="field">
                <label for="id_persona">ID Persona</label>
                <input id="id_persona" type="number" name="id_persona" required>
            </div>
        </div>
        <div class="field">
            <label for="data">Data</label>
            <input id="data" type="date" name="data" required>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Prenota</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
