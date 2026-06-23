<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Visita (Data, TipoVisita, IDPersona, IDSettore, IDCartella)
            VALUES ('{$_POST['data']}', '{$_POST['tipo_visita']}', {$_POST['id_persona']}, {$_POST['id_settore']}, {$_POST['id_cartella']})";
    $alert = $conn->query($sql) ? ['ok', "Visita registrata!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Registra visita";
$page_heading  = "Registrazione visita";
$page_subtitle = "Registra una nuova visita.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
            <div class="field">
                <label for="tipo_visita">Tipo visita</label>
                <input id="tipo_visita" type="text" name="tipo_visita" placeholder="Es. Controllo generale" required>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="id_persona">Veterinario</label>
                <?= render_select($conn, 'id_persona',
                    "SELECT IDPersona, Nome, Cognome, Specializzazione FROM Personale ORDER BY Cognome",
                    'IDPersona', fn($r) => "{$r['Nome']} {$r['Cognome']} ({$r['Specializzazione']})") ?>
            </div>
            <div class="field">
                <label for="id_settore">Settore</label>
                <?= render_select($conn, 'id_settore',
                    "SELECT IDSettore, Nome, TipoSpecializzazione FROM Settore ORDER BY Nome",
                    'IDSettore', fn($r) => "{$r['Nome']} ({$r['TipoSpecializzazione']})") ?>
            </div>
        </div>
        <div class="field">
            <label for="id_cartella">Cartella clinica</label>
            <?= render_select($conn, 'id_cartella',
                "SELECT C.IDCartella, A.Nome, A.Specie FROM CartellaClinica C JOIN Animale A ON C.IDAnimale = A.IDAnimale ORDER BY C.IDCartella",
                'IDCartella', fn($r) => "Cartella #{$r['IDCartella']} — {$r['Nome']} ({$r['Specie']})") ?>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Registra visita</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
