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
$page_subtitle = "Prenota una visita per un animale.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_animale">Animale</label>
                <?= render_select($conn, 'id_animale',
                    "SELECT IDAnimale, Nome, Specie FROM Animale ORDER BY Nome",
                    'IDAnimale', fn($r) => "{$r['Nome']} ({$r['Specie']})") ?>
            </div>
            <div class="field">
                <label for="id_persona">Veterinario</label>
                <?= render_select($conn, 'id_persona',
                    "SELECT IDPersona, Nome, Cognome, Specializzazione FROM Personale ORDER BY Cognome",
                    'IDPersona', fn($r) => "{$r['Nome']} {$r['Cognome']} ({$r['Specializzazione']})") ?>
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
