<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $id_farmaco = (int)$_POST['id_farmaco'];
    $quantita   = (int)$_POST['quantita'];

    // calcolo il prezzo finale
    $res = $conn->query("SELECT PrezzoUnitario FROM Farmaco WHERE IDFarmaco = $id_farmaco");
    if ($res && $row = $res->fetch_assoc()) {
        $prezzo_finale = $row['PrezzoUnitario'] * $quantita;
        $sql = "INSERT INTO Prescrizione (IDFarmaco, IDCartella, Quantita, PrezzoFinale, Data)
                VALUES ($id_farmaco, {$_POST['id_cartella']}, $quantita, $prezzo_finale, '{$_POST['data']}')";
        $alert = $conn->query($sql)
            ? ['ok', "Prescrizione salvata! Prezzo finale: € " . number_format($prezzo_finale, 2)]
            : ['err', "Errore: " . $conn->error];
    } else {
        $alert = ['err', "Farmaco non trovato."];
    }
}

$page_title    = "Prescrizione";
$page_heading  = "Inserisci prescrizione";
$page_subtitle = "Prescrivi un farmaco a un animale.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_farmaco">Farmaco</label>
                <?= render_select($conn, 'id_farmaco',
                    "SELECT IDFarmaco, Nome, PrezzoUnitario FROM Farmaco ORDER BY Nome",
                    'IDFarmaco', fn($r) => "{$r['Nome']} (€ {$r['PrezzoUnitario']})") ?>
            </div>
            <div class="field">
                <label for="id_cartella">Cartella clinica</label>
                <?= render_select($conn, 'id_cartella',
                    "SELECT C.IDCartella, A.Nome, A.Specie FROM CartellaClinica C JOIN Animale A ON C.IDAnimale = A.IDAnimale ORDER BY C.IDCartella",
                    'IDCartella', fn($r) => "Cartella #{$r['IDCartella']} — {$r['Nome']} ({$r['Specie']})") ?>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="quantita">Quantità</label>
                <input id="quantita" type="number" name="quantita" min="1" required>
            </div>
            <div class="field">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Inserisci prescrizione</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
