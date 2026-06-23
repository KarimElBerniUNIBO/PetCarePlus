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
$page_subtitle = "Registra un trattamento di una visita.";
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
                <label for="id_cartella">Cartella clinica</label>
                <?= render_select($conn, 'id_cartella',
                    "SELECT C.IDCartella, A.Nome, A.Specie FROM CartellaClinica C JOIN Animale A ON C.IDAnimale = A.IDAnimale ORDER BY C.IDCartella",
                    'IDCartella', fn($r) => "Cartella #{$r['IDCartella']} — {$r['Nome']} ({$r['Specie']})") ?>
            </div>
            <div class="field">
                <label for="id_visita">Visita</label>
                <?= render_select($conn, 'id_visita',
                    "SELECT IDVisita, Data, TipoVisita FROM Visita ORDER BY IDVisita",
                    'IDVisita', fn($r) => "Visita #{$r['IDVisita']} — {$r['Data']} ({$r['TipoVisita']})") ?>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Inserisci trattamento</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
