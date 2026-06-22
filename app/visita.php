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
$page_subtitle = "Registra una visita collegandola alla cartella clinica, al veterinario e al settore.";
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
                <label for="id_persona">ID Persona</label>
                <input id="id_persona" type="number" name="id_persona" required>
            </div>
            <div class="field">
                <label for="id_settore">ID Settore</label>
                <input id="id_settore" type="number" name="id_settore" required>
            </div>
        </div>
        <div class="field">
            <label for="id_cartella">ID Cartella</label>
            <input id="id_cartella" type="number" name="id_cartella" required>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Registra visita</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
