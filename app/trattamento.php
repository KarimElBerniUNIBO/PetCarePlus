<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Trattamento (Tipo, Descrizione, Data, IDCartella, IDVisita)
            VALUES ('{$_POST['tipo']}', '{$_POST['descrizione']}', '{$_POST['data']}', {$_POST['id_cartella']}, {$_POST['id_visita']})";
    $alert = $conn->query($sql) ? ['ok', "Trattamento inserito!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Inserisci trattamento";
$page_heading  = "Inserimento trattamento";
$page_subtitle = "Registra un trattamento eseguito durante una visita, collegandolo alla cartella clinica.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="tipo">Tipo</label>
                <input id="tipo" type="text" name="tipo" placeholder="Es. Intervento" required>
            </div>
            <div class="field">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
        </div>
        <div class="field">
            <label for="descrizione">Descrizione</label>
            <textarea id="descrizione" name="descrizione" placeholder="Dettagli del trattamento" required></textarea>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="id_cartella">ID Cartella</label>
                <input id="id_cartella" type="number" name="id_cartella" required>
            </div>
            <div class="field">
                <label for="id_visita">ID Visita</label>
                <input id="id_visita" type="number" name="id_visita" required>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Inserisci trattamento</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
